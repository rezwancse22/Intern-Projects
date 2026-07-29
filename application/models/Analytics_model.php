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

        // Visitor Tracking Table
        $this->db->insert('visitor_tracking', [
            'visitor_id' => $visitor_id,
            'page_name'  => $page_name,
            'ip_address' => $ip_address,
            'visit_date' => $today,
            'visit_time' => $time
        ]);

        // Visitor History
        $this->db->insert('visitor_history', [
            'visitor_id' => $visitor_id,
            'page_name'  => $page_name,
            'ip_address' => $ip_address
        ]);

        // Statistics Check
        $statistics = $this->db
            ->where('page_name', $page_name)
            ->where('stats_date', $today)
            ->get('page_statistics')
            ->row();

        if ($statistics)
        {
            // Total Views
            $this->db->set('total_views', 'total_views+1', FALSE);

            // Unique Visitor
            $exists = $this->db
                ->where('visitor_id', $visitor_id)
                ->where('page_name', $page_name)
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
                'page_name' => $page_name,
                'stats_date' => $today,
                'total_views' => 1,
                'unique_visitors' => 1
            ]);
        }
    }

    // API: Get Raw Visitor History
    public function get_page_stats($page)
    {
        return $this->db
            ->where('page_name', ucfirst($page))
            ->order_by('id', 'DESC')
            ->get('visitor_history')
            ->result_array();
    }
}