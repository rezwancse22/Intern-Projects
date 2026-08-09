<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
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

        // Get today's Home page statistics
        $this->db->select('stats_date, total_views, unique_visitors');
        $this->db->from('page_statistics');
        $this->db->where('page_url', '/home');
        $this->db->where('stats_date', $today);

        $query = $this->db->get();

        $analytics = [
            'date' => $today,
            'views' => 0,
            'unique_visitors' => 0
        ];

        if ($query->num_rows() > 0)
        {
            $row = $query->row();

            $analytics['date'] = $row->stats_date;
            $analytics['views'] = (int) $row->total_views;
            $analytics['unique_visitors'] = (int) $row->unique_visitors;
        }

        $data['analytics'] = $analytics;

        $this->load->view('home', $data);
    }
}