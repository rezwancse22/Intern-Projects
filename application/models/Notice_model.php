<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Get all notices
    public function get_all_notices()
    {
        $this->db->order_by('notice_date', 'DESC');
        $this->db->order_by('id', 'DESC');

        return $this->db
                    ->get('notices')
                    ->result_array();
    }

    // Get single notice
    public function get_notice($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->get('notices')
                    ->row_array();
    }

    // Insert notice
    public function insert_notice($data)
    {
        return $this->db
                    ->insert('notices', $data);
    }

    // Delete notice
    public function delete_notice($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->delete('notices');
    }
}