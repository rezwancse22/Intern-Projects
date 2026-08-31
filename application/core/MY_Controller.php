<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $visitor_id;

    // Automatically track all controllers that extend MY_Controller
    protected $track_page = true;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->helper('url');

        $this->initializeVisitor();

        $this->load->database();
        $this->load->model('Analytics_model', 'analytics');

        if ($this->track_page)
        {
            $this->trackPage();
        }
    }

    private function initializeVisitor()
    {
        $visitor = get_cookie('analytics_visitor_id');

        if (!$visitor)
        {
            $visitor = uniqid('visitor_', true);

            set_cookie([
                'name'     => 'analytics_visitor_id',
                'value'    => $visitor,
                'expire'   => 31536000, // 1 Year
                'httponly' => TRUE
            ]);
        }

        $this->visitor_id = $visitor;
    }

    /**
     * Track Current Page
     *
     * Examples:
     * Home            -> /home
     * About           -> /about
     * Contact         -> /contact
     * Services        -> /services
     * Login           -> /login
     * Register        -> /register
     * Forgot Password -> /forgot_password
     * Reset Password  -> /reset_password
     * Dashboard       -> /dashboard
     * Notices         -> /notices
     */
    protected function trackPage($page_name = null)
    {
        if ($page_name === null)
        {
            // Get current controller name
            $page_name = '/' . strtolower($this->router->fetch_class());
        }

        $ip = $this->input->ip_address();

        $this->analytics->track_page(
            $this->visitor_id,
            $page_name,
            $ip
        );
    }
}