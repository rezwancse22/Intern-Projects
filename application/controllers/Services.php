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
        // Bangladesh timezone
        date_default_timezone_set('Asia/Dhaka');

        // Track Services page visit
        $this->trackPage('Services');

        // Today's date
        $today = date('Y-m-d');

        // Default analytics data
        $analytics = [
            'date' => $today,
            'views' => 0,
            'unique_visitors' => 0
        ];

        // Get today's Services page statistics
        $statistics = $this->db
            ->where('page_url', '/services')
            ->where('stats_date', $today)
            ->get('page_statistics')
            ->row();

        // If statistics found
        if ($statistics)
        {
            $analytics['date'] = $statistics->stats_date;
            $analytics['views'] = (int) $statistics->total_views;
            $analytics['unique_visitors'] = (int) $statistics->unique_visitors;
        }

        // Send analytics data to Services view
        $data['analytics'] = $analytics;

        // Load Services page
        $this->load->view('services', $data);
    }
}