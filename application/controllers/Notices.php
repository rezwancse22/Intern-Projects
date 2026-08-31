<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notices extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Database
        $this->load->database();

        // Upload library
        $this->load->library('upload');
    }


    /*
    |--------------------------------------------------------------------------
    | NOTICE PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $this->trackPage('Notices');

        // Get all notices
        $data['notices'] = $this->db
            ->order_by('notice_date', 'DESC')
            ->order_by('id', 'DESC')
            ->get('notices')
            ->result_array();


        // Today's analytics
        $data['today_views'] = 0;
        $data['unique_visitors'] = 0;


        $this->load->view('notices', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | UPLOAD NOTICE PDF
    |--------------------------------------------------------------------------
    */

    public function upload()
    {
        // Make sure a file was selected
        if (
            !isset($_FILES['pdf_file']) ||
            $_FILES['pdf_file']['error'] != 0
        ) {
            $this->session->set_flashdata(
                'error',
                'Please select a PDF file.'
            );

            redirect('dashboard');
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Upload Directory
        |--------------------------------------------------------------------------
        */

        $upload_path =
            FCPATH . 'assets/uploads/notices/';


        // Create directory if it doesn't exist
        if (!is_dir($upload_path)) {

            mkdir(
                $upload_path,
                0777,
                true
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Upload Configuration
        |--------------------------------------------------------------------------
        */

        $config['upload_path'] =
            $upload_path;

        $config['allowed_types'] =
            'pdf';

        $config['max_size'] =
            10240; // 10 MB

        $config['encrypt_name'] =
            true;


        $this->upload->initialize($config);


        /*
        |--------------------------------------------------------------------------
        | Upload File
        |--------------------------------------------------------------------------
        */

        if (!$this->upload->do_upload('pdf_file')) {

            $error =
                $this->upload->display_errors(
                    '',
                    ''
                );

            $this->session->set_flashdata(
                'error',
                $error
            );

            redirect('dashboard');
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | File Information
        |--------------------------------------------------------------------------
        */

        $file_data =
            $this->upload->data();


        $pdf_file =
            $file_data['file_name'];


        /*
        |--------------------------------------------------------------------------
        | Form Data
        |--------------------------------------------------------------------------
        */

        $title =
            $this->input
                ->post('title', true);


        $description =
            $this->input
                ->post('description', true);


        $notice_date =
            $this->input
                ->post('notice_date', true);


        // If date is empty, use today's date
        if (empty($notice_date)) {

            $notice_date =
                date('Y-m-d');
        }


        /*
        |--------------------------------------------------------------------------
        | Insert Into Database
        |--------------------------------------------------------------------------
        */

        $notice_data = [

            'title' =>
                $title,

            'description' =>
                $description,

            'pdf_file' =>
                $pdf_file,

            'notice_date' =>
                $notice_date,

            'created_at' =>
                date('Y-m-d H:i:s')

        ];


        $this->db
            ->insert(
                'notices',
                $notice_data
            );


        /*
        |--------------------------------------------------------------------------
        | Success Message
        |--------------------------------------------------------------------------
        */

        $this->session->set_flashdata(
            'success',
            'Notice uploaded successfully.'
        );


        redirect('dashboard');
    }
}