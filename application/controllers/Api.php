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

        // Get Parameters
        $page      = $this->input->get('page');
        $date      = $this->input->get('date');
        $startDate = $this->input->get('startDate');
        $endDate   = $this->input->get('endDate');

        // Page is required
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

        // Automatically add "/" if user writes Home instead of /home
        if (substr($page, 0, 1) !== '/')
        {
            $page = '/' . strtolower($page);
        }

        // Get Statistics
        $result = $this->Analytics_model->get_page_stats(
            $page,
            $date,
            $startDate,
            $endDate
        );

        echo json_encode($result, JSON_PRETTY_PRINT);
    }
}