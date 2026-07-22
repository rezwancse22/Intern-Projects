<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $visitor_id;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->helper('url');

        $this->initializeVisitor();

        $this->load->database();
        $this->load->model('Analytics_model', 'analytics');
    }

    private function initializeVisitor()
    {
        $visitor = get_cookie('analytics_visitor_id');

        if (!$visitor) {
            $visitor = uniqid('visitor_', true);

            set_cookie([
                'name'     => 'analytics_visitor_id',
                'value'    => $visitor,
                'expire'   => 31536000,
                'httponly' => TRUE
            ]);
        }

        $this->visitor_id = $visitor;
    }

    protected function trackPage($page_name)
    {
        $ip = $this->input->ip_address();

        $this->analytics->track_page(
            $this->visitor_id,
            $page_name,
            $ip
        );
    }
}