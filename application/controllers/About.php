<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller
{
    protected $track_page = true;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Today's date
        $today = date('Y-m-d');

        // Get today's About page statistics
        $this->db->select('stats_date, total_views, unique_visitors');
        $this->db->from('page_statistics');
        $this->db->where('page_url', '/about');
        $this->db->where('stats_date', $today);

        $query = $this->db->get();

        // Default values
        $analytics = [
            'date' => $today,
            'views' => 0,
            'unique_visitors' => 0
        ];

        // If today's data exists
        if ($query->num_rows() > 0)
        {
            $row = $query->row();

            $analytics['date'] = $row->stats_date;
            $analytics['views'] = (int) $row->total_views;
            $analytics['unique_visitors'] = (int) $row->unique_visitors;
        }

        // Send analytics data to About view
        $data['analytics'] = $analytics;

        $this->load->view('about', $data);
    }
}