<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
    }


    public function index()
    {
        // শুধু Login page open করলে
        if ($this->input->method() === 'get')
        {
            // Login page analytics track
            $this->trackPage('Login');

            $this->load->view('login');
            return;
        }


        // Form থেকে Email এবং Password নেওয়া
        $email = $this->input->post('email');
        $password = $this->input->post('password');


        // Email দিয়ে user খোঁজা
        $user = $this->db
            ->where('email', $email)
            ->get('users')
            ->row();


        // Email পাওয়া না গেলে
        if (!$user)
        {
            $this->session->set_flashdata(
                'error',
                'Email not found!'
            );

            redirect('Login');
            return;
        }


        // Password verify
        if (!password_verify($password, $user->password))
        {
            $this->session->set_flashdata(
                'error',
                'Incorrect password!'
            );

            redirect('Login');
            return;
        }


        // =========================
        // LOGIN HISTORY TRACKING
        // =========================

        $this->db->insert(
            'login_history',
            array(
                'user_id' => $user->id,
                'ip_address' => $this->input->ip_address(),
                'login_date' => date('Y-m-d'),
                'login_time' => date('H:i:s')
            )
        );


        // =========================
        // LOGIN SUCCESSFUL
        // =========================

        // Session তৈরি
        $this->session->set_userdata(
            array(

                'user_id'   => $user->id,
                'full_name' => $user->full_name,
                'email'     => $user->email,
                'logged_in' => TRUE

            )
        );


        // Dashboard এ পাঠানো
        redirect('dashboard');
    }
}