<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notices extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->trackPage('Notices');

        $data['today_views'] = 0;
        $data['unique_visitors'] = 0;

        $this->load->view('notices', $data);
    }
}