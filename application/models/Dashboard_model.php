<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    /*
    |--------------------------------------------------------------------------
    | Total Registered Users
    |--------------------------------------------------------------------------
    */

    public function get_total_users()
    {
        return $this->db
            ->count_all('users');
    }


    /*
    |--------------------------------------------------------------------------
    | Total Page Visits
    |--------------------------------------------------------------------------
    */

    public function get_total_visits()
    {
        return $this->db
            ->count_all('visitor_tracking');
    }


    /*
    |--------------------------------------------------------------------------
    | Total Unique Visitors
    |--------------------------------------------------------------------------
    */

        public function get_unique_visitors()
        {
            return $this->db
                ->distinct()
                ->select('ip_address')
                ->from('visitor_tracking')
                ->count_all_results();
        }


    /*
    |--------------------------------------------------------------------------
    | Today's Total Visits
    |--------------------------------------------------------------------------
    */

    public function get_today_visits()
    {
        return $this->db
            ->where('visit_date', date('Y-m-d'))
            ->count_all_results('visitor_tracking');
    }


    /*
    |--------------------------------------------------------------------------
    | Most Visited Page
    |--------------------------------------------------------------------------
    */

    public function get_most_visited_page()
    {
        return $this->db
            ->select('page_name, COUNT(*) as total')
            ->from('visitor_tracking')
            ->group_by('page_name')
            ->order_by('total', 'DESC')
            ->limit(1)
            ->get()
            ->row();
    }


    /*
    |--------------------------------------------------------------------------
    | Page Statistics
    |--------------------------------------------------------------------------
    */

    public function get_page_statistics()
    {
        return $this->db
            ->order_by('stats_date', 'DESC')
            ->get('page_statistics')
            ->result();
    }


    /*
    |--------------------------------------------------------------------------
    | Visitor Tracking
    |--------------------------------------------------------------------------
    */

    public function get_visitor_tracking()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->limit(50)
            ->get('visitor_tracking')
            ->result();
    }


    /*
    |--------------------------------------------------------------------------
    | Visitor History
    |--------------------------------------------------------------------------
    */

    public function get_visitor_history()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->limit(50)
            ->get('visitor_history')
            ->result();
    }


    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */

    public function get_users()
    {
        return $this->db
            ->select('id, full_name, date_of_birth, phone, email, created_at')
            ->order_by('id', 'DESC')
            ->get('users')
            ->result();
    }
}