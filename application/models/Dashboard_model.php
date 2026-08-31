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
    | Login History
    |--------------------------------------------------------------------------
    */

    public function get_login_history()
    {
        return $this->db
            ->select('
                login_history.id,
                login_history.user_id,
                login_history.ip_address,
                login_history.login_date,
                login_history.login_time,
                users.full_name,
                users.email
            ')
            ->from('login_history')
            ->join(
                'users',
                'users.id = login_history.user_id',
                'left'
            )
            ->order_by('login_history.id', 'DESC')
            ->limit(100)
            ->get()
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


    /*
    |--------------------------------------------------------------------------
    | Notices
    |--------------------------------------------------------------------------
    */

    public function get_notices()
    {
        return $this->db
            ->order_by('notice_date', 'DESC')
            ->order_by('id', 'DESC')
            ->get('notices')
            ->result();
    }


    /*
    |--------------------------------------------------------------------------
    | Insert Notice
    |--------------------------------------------------------------------------
    */

    public function insert_notice($data)
    {
        return $this->db
            ->insert('notices', $data);
    }
}