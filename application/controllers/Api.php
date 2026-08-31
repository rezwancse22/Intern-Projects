<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Database
        $this->load->database();

        // Analytics Model
        $this->load->model('Analytics_model');
    }


    /*
    |--------------------------------------------------------------------------
    | PAGE STATISTICS API
    |--------------------------------------------------------------------------
    |
    | Example:
    |
    | /index.php/api/page_stats?page=/about
    |
    | With date range:
    |
    | /index.php/api/page_stats?page=/about
    | &start_date=2026-08-01
    | &end_date=2026-08-30
    |
    */


    public function page_stats()
    {
        // JSON Response
        header('Content-Type: application/json');


        /*
        |--------------------------------------------------------------------------
        | GET PARAMETERS
        |--------------------------------------------------------------------------
        */

        $page = $this->input->get('page');

        $url = $this->input->get('url');

        $date = $this->input->get('date');

        $startDate = $this->input->get('start_date');

        $endDate = $this->input->get('end_date');


        /*
        |--------------------------------------------------------------------------
        | CLEAN INPUT
        |--------------------------------------------------------------------------
        */

        $page = ($page !== NULL)
            ? trim($page)
            : '';

        $url = ($url !== NULL)
            ? trim($url)
            : '';

        $date = ($date !== NULL)
            ? trim($date)
            : '';

        $startDate = ($startDate !== NULL)
            ? trim($startDate)
            : '';

        $endDate = ($endDate !== NULL)
            ? trim($endDate)
            : '';


        /*
        |--------------------------------------------------------------------------
        | PAGE / URL VALIDATION
        |--------------------------------------------------------------------------
        |
        | page parameter has priority.
        |
        */

        if (!empty($page))
        {
            $requestedPage = $page;
        }
        else if (!empty($url))
        {
            $requestedPage = $url;
        }
        else
        {
            http_response_code(400);

            echo json_encode(
                array(
                    "error" => array(
                        "code" =>
                            "MISSING_PAGE",

                        "message" =>
                            "The page parameter is required."
                    )
                ),
                JSON_PRETTY_PRINT
            );

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | NORMALIZE PAGE URL
        |--------------------------------------------------------------------------
        |
        | about -> /about
        | /about -> /about
        |
        */

        $requestedPage =
            trim($requestedPage);


        if (
            substr(
                $requestedPage,
                0,
                1
            ) !== '/'
        )
        {
            $requestedPage =
                '/' .
                strtolower(
                    $requestedPage
                );
        }
        else
        {
            $requestedPage =
                strtolower(
                    $requestedPage
                );
        }


        /*
        |--------------------------------------------------------------------------
        | SINGLE DATE VALIDATION
        |--------------------------------------------------------------------------
        */

        if (!empty($date))
        {
            if (
                !$this->isValidDate(
                    $date
                )
            )
            {
                http_response_code(400);

                echo json_encode(
                    array(
                        "error" => array(
                            "code" =>
                                "INVALID_DATE",

                            "message" =>
                                "The date must be in YYYY-MM-DD format."
                        )
                    ),
                    JSON_PRETTY_PRINT
                );

                return;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | DATE RANGE VALIDATION
        |--------------------------------------------------------------------------
        */

        if (empty($date))
        {

            /*
            |--------------------------------------------------------------------------
            | START DATE
            |--------------------------------------------------------------------------
            */

            if (!empty($startDate))
            {
                if (
                    !$this->isValidDate(
                        $startDate
                    )
                )
                {
                    http_response_code(400);

                    echo json_encode(
                        array(
                            "error" => array(
                                "code" =>
                                    "INVALID_DATE",

                                "message" =>
                                    "start_date must be in YYYY-MM-DD format."
                            )
                        ),
                        JSON_PRETTY_PRINT
                    );

                    return;
                }
            }


            /*
            |--------------------------------------------------------------------------
            | END DATE
            |--------------------------------------------------------------------------
            */

            if (!empty($endDate))
            {
                if (
                    !$this->isValidDate(
                        $endDate
                    )
                )
                {
                    http_response_code(400);

                    echo json_encode(
                        array(
                            "error" => array(
                                "code" =>
                                    "INVALID_DATE",

                                "message" =>
                                    "end_date must be in YYYY-MM-DD format."
                            )
                        ),
                        JSON_PRETTY_PRINT
                    );

                    return;
                }
            }


            /*
            |--------------------------------------------------------------------------
            | BOTH DATES REQUIRED
            |--------------------------------------------------------------------------
            */

            if (
                (
                    empty($startDate)
                    &&
                    !empty($endDate)
                )
                ||
                (
                    !empty($startDate)
                    &&
                    empty($endDate)
                )
            )
            {
                http_response_code(422);

                echo json_encode(
                    array(
                        "error" => array(
                            "code" =>
                                "INVALID_DATE_RANGE",

                            "message" =>
                                "Both start_date and end_date are required when specifying a date range."
                        )
                    ),
                    JSON_PRETTY_PRINT
                );

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | START DATE MUST NOT BE AFTER END DATE
            |--------------------------------------------------------------------------
            */

            if (
                !empty($startDate)
                &&
                !empty($endDate)
            )
            {
                if (
                    strtotime($startDate)
                    >
                    strtotime($endDate)
                )
                {
                    http_response_code(422);

                    echo json_encode(
                        array(
                            "error" => array(
                                "code" =>
                                    "INVALID_DATE_RANGE",

                                "message" =>
                                    "start_date must not be after end_date."
                            )
                        ),
                        JSON_PRETTY_PRINT
                    );

                    return;
                }
            }

        }
        else
        {

            /*
            |--------------------------------------------------------------------------
            | SINGLE DATE HAS PRIORITY
            |--------------------------------------------------------------------------
            |
            | If date is supplied, ignore
            | start_date and end_date.
            |
            */

            $startDate = '';

            $endDate = '';
        }


        /*
        |--------------------------------------------------------------------------
        | GET ANALYTICS DATA
        |--------------------------------------------------------------------------
        */

        try
        {

            $result =
                $this->Analytics_model
                    ->get_page_stats(
                        $requestedPage,
                        $date,
                        $startDate,
                        $endDate
                    );


            /*
            |--------------------------------------------------------------------------
            | SUCCESS RESPONSE
            |--------------------------------------------------------------------------
            */

            http_response_code(200);

            echo json_encode(
                $result,
                JSON_PRETTY_PRINT
            );

        }
        catch (Exception $e)
        {

            /*
            |--------------------------------------------------------------------------
            | INTERNAL SERVER ERROR
            |--------------------------------------------------------------------------
            */

            http_response_code(500);

            echo json_encode(
                array(
                    "error" => array(
                        "code" =>
                            "INTERNAL_SERVER_ERROR",

                        "message" =>
                            "An unexpected error occurred."
                    )
                ),
                JSON_PRETTY_PRINT
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDATE DATE
    |--------------------------------------------------------------------------
    |
    | Checks:
    | YYYY-MM-DD
    |
    | Also checks whether it is a real
    | calendar date.
    |
    */

    private function isValidDate($date)
    {
        $d =
            DateTime::createFromFormat(
                'Y-m-d',
                $date
            );


        return
            $d &&
            $d->format('Y-m-d') === $date;
    }
}