<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        $this->trackPage('Home');
        $this->load->view('home');
    }

    public function about()
    {
        $this->trackPage('About');
        $this->load->view('about');
    }

    public function services()
    {
        $this->trackPage('Services');
        $this->load->view('services');
    }

    public function contact()
    {
        $this->trackPage('Contact');
        $this->load->view('contact');
    }
}