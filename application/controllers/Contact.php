<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller
{
    protected $track_page = true;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('contact');
    }
}
