<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
    }


    public function index()
    {
        // শুধু page open করলে
        if ($this->input->method() === 'get') {

            // Forgot Password page analytics track
            $this->trackPage('Forgot Password');

            $this->load->view('forgot_password');
            return;
        }


        // Form থেকে email নেওয়া
        $email = $this->input->post('email');


        // Database এ email খোঁজা
        $user = $this->db
            ->where('email', $email)
            ->get('users')
            ->row();


        // Email না থাকলে
        if (!$user) {

            $this->session->set_flashdata(
                'error',
                'Email not found!'
            );

            redirect('Forgot_password');

            return;
        }


        // Email পাওয়া গেলে session এ temporarily save করা
        $this->session->set_userdata(
            'reset_email',
            $user->email
        );


        // Reset Password page এ পাঠানো
        redirect('Reset_password');
    }
}