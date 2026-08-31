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

        // notices table
        $data['notices'] =
            $this->dashboard->get_notices();


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


    /*
    |--------------------------------------------------------------------------
    | Upload Notice PDF
    |--------------------------------------------------------------------------
    */

    public function upload_notice()
    {
        if (!$this->session->userdata('logged_in')) {

            redirect('Login');
            return;
        }


        /*
        |----------------------------------------------------------------------
        | Check PDF
        |----------------------------------------------------------------------
        */

        if (empty($_FILES['notice_pdf']['name'])) {

            $this->session->set_flashdata(
                'upload_error',
                'Please select a PDF file.'
            );

            redirect('dashboard');
            return;
        }


        /*
        |----------------------------------------------------------------------
        | Upload Folder
        |----------------------------------------------------------------------
        */

        $upload_path =
            FCPATH . 'assets/uploads/notices/';


        if (!is_dir($upload_path)) {

            mkdir(
                $upload_path,
                0777,
                true
            );
        }


        /*
        |----------------------------------------------------------------------
        | Upload Configuration
        |----------------------------------------------------------------------
        */

        $config['upload_path'] =
            $upload_path;

        $config['allowed_types'] =
            'pdf';

        $config['max_size'] =
            10240;

        $config['encrypt_name'] =
            TRUE;


        $this->load->library(
            'upload',
            $config
        );


        /*
        |----------------------------------------------------------------------
        | Upload File
        |----------------------------------------------------------------------
        */

        if (!$this->upload->do_upload('notice_pdf')) {

            $this->session->set_flashdata(
                'upload_error',
                $this->upload->display_errors()
            );

            redirect('dashboard');
            return;
        }


        /*
        |----------------------------------------------------------------------
        | Uploaded File Information
        |----------------------------------------------------------------------
        */

        $file_data =
            $this->upload->data();


        /*
        |----------------------------------------------------------------------
        | Notice Database Data
        |----------------------------------------------------------------------
        */

        $notice_data = array(

            'title' =>
                $this->input->post('title'),

            'description' =>
                $this->input->post('description'),

            'pdf_file' =>
                $file_data['file_name'],

            'notice_date' =>
                date('Y-m-d')

        );


        /*
        |----------------------------------------------------------------------
        | Insert Into Database
        |----------------------------------------------------------------------
        */

        $this->dashboard->insert_notice(
            $notice_data
        );


        /*
        |----------------------------------------------------------------------
        | Success Message
        |----------------------------------------------------------------------
        */

        $this->session->set_flashdata(
            'upload_success',
            'Notice uploaded successfully.'
        );


        redirect('dashboard');
    }
}