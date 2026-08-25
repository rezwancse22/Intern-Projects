<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Database load
        $this->load->database();

        // Session load
        $this->load->library('session');

        // Dashboard Model load
        $this->load->model('Dashboard_model', 'dashboard');
    }


    public function index()
    {
        /*
        |----------------------------------------------------------------------
        | Login Check
        |----------------------------------------------------------------------
        */

        if (!$this->session->userdata('logged_in')) {

            redirect('Login');
            return;
        }


        /*
        |----------------------------------------------------------------------
        | Dashboard Summary Data
        |----------------------------------------------------------------------
        */

        $data['total_users'] =
            $this->dashboard->get_total_users();

        $data['total_visits'] =
            $this->dashboard->get_total_visits();

        $data['unique_visitors'] =
            $this->dashboard->get_unique_visitors();

        $data['today_visits'] =
            $this->dashboard->get_today_visits();

        $data['most_visited_page'] =
            $this->dashboard->get_most_visited_page();


        /*
        |----------------------------------------------------------------------
        | Database Table Data
        |----------------------------------------------------------------------
        */

        // users table
        $data['users'] =
            $this->dashboard->get_users();

        // visitor_tracking table
        $data['visitor_tracking'] =
            $this->dashboard->get_visitor_tracking();

        // visitor_history table
        $data['visitor_history'] =
            $this->dashboard->get_visitor_history();

        // page_statistics table
        $data['page_statistics'] =
            $this->dashboard->get_page_statistics();

        // login_history table
        $data['login_history'] =
            $this->dashboard->get_login_history();


        /*
        |----------------------------------------------------------------------
        | Load Dashboard View
        |----------------------------------------------------------------------
        */

        $this->load->view(
            'dashboard',
            $data
        );
    }
}