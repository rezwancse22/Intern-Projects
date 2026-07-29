<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('Analytics_model');
    }

    public function page_stats()
    {
        header('Content-Type: application/json');

        $page = $this->input->get('page');

        if (empty($page))
        {
            echo json_encode([
                "error" => [
                    "code" => "MISSING_PAGE",
                    "message" => "The page parameter is required."
                ]
            ], JSON_PRETTY_PRINT);

            return;
        }

        $result = $this->Analytics_model->get_page_stats($page);

        echo json_encode($result, JSON_PRETTY_PRINT);
    }
}