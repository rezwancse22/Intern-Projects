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
        // Bangladesh timezone
        date_default_timezone_set('Asia/Dhaka');

        // Today's date
        $today = date('Y-m-d');

        // Default analytics data
        $analytics = [
            'date' => $today,
            'views' => 0,
            'unique_visitors' => 0
        ];

        // Get today's Home page statistics
        $statistics = $this->db
            ->where('page_url', '/home')
            ->where('stats_date', $today)
            ->get('page_statistics')
            ->row();

        // If statistics exist
        if ($statistics)
        {
            $analytics['views'] = (int) $statistics->total_views;

            $analytics['unique_visitors'] =
                (int) $statistics->unique_visitors;
        }

        // Send analytics data to home view
        $data['analytics'] = $analytics;

        // Load Home page
        $this->load->view('home', $data);
    }
}