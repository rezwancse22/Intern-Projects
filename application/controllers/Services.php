<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Track Services page
        $this->trackPage('Services');

        // Today's date
        $today = date('Y-m-d');

        // Get today's Services statistics
        $this->db->select('stats_date, total_views, unique_visitors');
        $this->db->from('page_statistics');
        $this->db->where('page_url', '/services');
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

        // Send data to Services view
        $data['analytics'] = $analytics;

        $this->load->view('services', $data);
    }
}