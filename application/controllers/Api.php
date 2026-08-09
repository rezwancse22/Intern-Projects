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
        $page      = trim($this->input->get('page'));
        $date      = trim($this->input->get('date'));
        $startDate = trim($this->input->get('start_date'));
        $endDate   = trim($this->input->get('end_date'));

        // ===============================
        // PAGE VALIDATION
        // ===============================
        if (empty($page))
        {
            http_response_code(400);

            echo json_encode([
                "error" => [
                    "code" => "MISSING_PAGE",
                    "message" => "The page parameter is required."
                ]
            ], JSON_PRETTY_PRINT);

            return;
        }

        // Automatically convert Home -> /home
        if (substr($page, 0, 1) !== '/')
        {
            $page = '/' . strtolower($page);
        }

        // ===============================
        // DATE FORMAT VALIDATION
        // ===============================

        if (!empty($date))
        {
            if (!$this->isValidDate($date))
            {
                http_response_code(400);

                echo json_encode([
                    "error" => [
                        "code" => "INVALID_DATE",
                        "message" => "The date must be in YYYY-MM-DD format."
                    ]
                ], JSON_PRETTY_PRINT);

                return;
            }
        }

        if (!empty($startDate))
        {
            if (!$this->isValidDate($startDate))
            {
                http_response_code(400);

                echo json_encode([
                    "error" => [
                        "code" => "INVALID_DATE",
                        "message" => "start_date must be in YYYY-MM-DD format."
                    ]
                ], JSON_PRETTY_PRINT);

                return;
            }
        }

        if (!empty($endDate))
        {
            if (!$this->isValidDate($endDate))
            {
                http_response_code(400);

                echo json_encode([
                    "error" => [
                        "code" => "INVALID_DATE",
                        "message" => "end_date must be in YYYY-MM-DD format."
                    ]
                ], JSON_PRETTY_PRINT);

                return;
            }
        }

        // ===============================
        // DATE RANGE VALIDATION
        // ===============================

        if ((empty($startDate) && !empty($endDate)) ||
            (!empty($startDate) && empty($endDate)))
        {
            http_response_code(422);

            echo json_encode([
                "error" => [
                    "code" => "INVALID_DATE_RANGE",
                    "message" => "Both start_date and end_date are required when specifying a date range."
                ]
            ], JSON_PRETTY_PRINT);

            return;
        }

        if (!empty($startDate) && !empty($endDate))
        {
            if (strtotime($startDate) > strtotime($endDate))
            {
                http_response_code(422);

                echo json_encode([
                    "error" => [
                        "code" => "INVALID_DATE_RANGE",
                        "message" => "start_date must not be after end_date."
                    ]
                ], JSON_PRETTY_PRINT);

                return;
            }
        }

        // ===============================
        // GET DATA
        // ===============================

        try
        {
            $result = $this->Analytics_model->get_page_stats(
                $page,
                $date,
                $startDate,
                $endDate
            );

            echo json_encode($result, JSON_PRETTY_PRINT);
        }
        catch (Exception $e)
        {
            http_response_code(500);

            echo json_encode([
                "error" => [
                    "code" => "INTERNAL_SERVER_ERROR",
                    "message" => "An unexpected error occurred."
                ]
            ], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Validate YYYY-MM-DD format and real calendar date
     */
    private function isValidDate($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);

        return $d &&
               $d->format('Y-m-d') === $date;
    }
}