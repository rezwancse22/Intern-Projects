<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
public function track_page($visitor_id, $page_name, $ip_address)
{
    $today = date('Y-m-d');
    $time  = date('H:i:s');

    $page_url = '/' . strtolower($page_name);

    // Visitor Tracking
    $this->db->insert('visitor_tracking', [
        'page_url'   => $page_url,
        'page_name'  => ucfirst($page_name),
        'ip_address' => $ip_address,
        'visit_date' => $today,
        'visit_time' => $time
    ]);

    // Visitor History
    $this->db->insert('visitor_history', [
        'page_url'   => $page_url,
        'page_name'  => ucfirst($page_name),
        'ip_address' => $ip_address
    ]);

    // Check today's statistics
    $statistics = $this->db
        ->where('page_name', ucfirst($page_name))
        ->where('stats_date', $today)
        ->get('page_statistics')
        ->row();

    if ($statistics)
    {
        // Increase total views
        $this->db->set('total_views', 'total_views+1', FALSE);

        // Check unique visitor by IP
        $exists = $this->db
            ->where('ip_address', $ip_address)
            ->where('page_name', ucfirst($page_name))
            ->where('visit_date', $today)
            ->count_all_results('visitor_tracking');

        if ($exists == 1)
        {
            $this->db->set('unique_visitors', 'unique_visitors+1', FALSE);
        }

        $this->db->where('id', $statistics->id);
        $this->db->update('page_statistics');
    }
    else
    {
        $this->db->insert('page_statistics', [
            'page_name'        => ucfirst($page_name),
            'page_url'         => $page_url,
            'stats_date'       => $today,
            'total_views'      => 1,
            'unique_visitors'  => 1
        ]);
    }
}
    /**
     * Page Statistics API
     */
    public function get_page_stats($page, $date = null, $startDate = null, $endDate = null)
    {
       $this->db->select('page_url, stats_date, total_views, unique_visitors');
        $this->db->from('page_statistics');
        $this->db->where('page_url', $page);
        // Single Date
        if (!empty($date))
        {
            $this->db->where('stats_date', $date);
        }
        // Date Range
        elseif (!empty($startDate) && !empty($endDate))
        {
            $this->db->where('stats_date >=', $startDate);
            $this->db->where('stats_date <=', $endDate);
        }

        $this->db->order_by('stats_date', 'ASC');

       $query = $this->db->get();

$response = [
    "meta" => [
        "pageUrl" => $page,
        "count" => $query->num_rows()
    ],
    "data" => []
];

foreach ($query->result() as $row)
{
    $response["data"][] = [
        "date" => $row->stats_date,
        "pageUrl" => $row->page_url,
        "views" => (int)$row->total_views,
        "uniqueVisitors" => (int)$row->unique_visitors
    ];
}

return $response;
    }
}