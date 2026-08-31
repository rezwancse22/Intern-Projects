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
        date_default_timezone_set('Asia/Dhaka');

        $today = date('Y-m-d');
        $time  = date('H:i:s');

        // ===================================
        // NORMALIZE PAGE NAME
        // ===================================

        // Remove "/" from beginning/end first
        $page_name = trim($page_name, '/');

        // Convert to lowercase
        $page_name = strtolower($page_name);

        // Final page URL
        // Example: services -> /services
        $page_url = '/' . $page_name;

        // Page name for database
        // Example: services -> Services
        $display_name = ucfirst($page_name);

        // ===================================
        // VISITOR TRACKING
        // ===================================

        $this->db->insert('visitor_tracking', [
            'page_url'   => $page_url,
            'page_name'  => $display_name,
            'ip_address' => $ip_address,
            'visit_date' => $today,
            'visit_time' => $time
        ]);

        // ===================================
        // VISITOR HISTORY
        // ===================================

        $this->db->insert('visitor_history', [
            'page_url'   => $page_url,
            'page_name'  => $display_name,
            'ip_address' => $ip_address
        ]);

        // ===================================
        // CHECK TODAY'S STATISTICS
        // ===================================

        $statistics = $this->db
            ->where('page_url', $page_url)
            ->where('stats_date', $today)
            ->get('page_statistics')
            ->row();

        if ($statistics)
        {
            // Increase total views
            $this->db->set(
                'total_views',
                'total_views + 1',
                FALSE
            );

            // Check unique visitor
            $exists = $this->db
                ->where('ip_address', $ip_address)
                ->where('page_url', $page_url)
                ->where('visit_date', $today)
                ->count_all_results('visitor_tracking');

            if ($exists == 1)
            {
                $this->db->set(
                    'unique_visitors',
                    'unique_visitors + 1',
                    FALSE
                );
            }

            $this->db->where('id', $statistics->id);
            $this->db->update('page_statistics');
        }
        else
        {
            $this->db->insert('page_statistics', [
                'page_name'       => $display_name,
                'page_url'        => $page_url,
                'stats_date'      => $today,
                'total_views'     => 1,
                'unique_visitors' => 1
            ]);
        }
    }

    /**
     * Page Statistics API
     */
    public function get_page_stats(
        $page,
        $date = null,
        $startDate = null,
        $endDate = null
    )
    {
        $this->db->select(
            'page_url, stats_date, total_views, unique_visitors'
        );

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
            $this->db->where(
                'stats_date >=',
                $startDate
            );

            $this->db->where(
                'stats_date <=',
                $endDate
            );
        }

        $this->db->order_by(
            'stats_date',
            'ASC'
        );

        $query = $this->db->get();

        $response = [
            "meta" => [
                "pageUrl" => $page,
                "count"   => $query->num_rows()
            ],
            "data" => []
        ];

        foreach ($query->result() as $row)
        {
            $response["data"][] = [
                "date"           => $row->stats_date,
                "pageUrl"        => $row->page_url,
                "views"          => (int) $row->total_views,
                "uniqueVisitors" => (int) $row->unique_visitors
            ];
        }

        return $response;
    }
}