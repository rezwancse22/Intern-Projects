<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // URL Helper load
        $this->load->helper('url');
    }

    // Login Page
    public function index()
    {
        $this->load->view('login');
    }

    // Temporary Dashboard Page
    public function dashboard()
    {
        $this->load->view('dashboard');
    }
}