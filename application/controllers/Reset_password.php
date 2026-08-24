<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
    }


    public function index()
    {
        // শুধু Reset Password page open করলে
        if ($this->input->method() === 'get') {

            // Forgot Password থেকে email না এলে
            if (!$this->session->userdata('reset_email')) {

                redirect('Forgot_password');
                return;
            }

            // Reset Password page analytics track
            $this->trackPage('Reset Password');

            $this->load->view('reset_password');
            return;
        }


        // Session থেকে email নেওয়া
        $email = $this->session->userdata('reset_email');


        // কোনো কারণে email না থাকলে
        if (!$email) {

            redirect('Forgot_password');
            return;
        }


        // Form থেকে নতুন password নেওয়া
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');


        // দুইটা password same কিনা check
        if ($new_password !== $confirm_password) {

            $this->session->set_flashdata(
                'error',
                'Passwords do not match!'
            );

            redirect('Reset_password');
            return;
        }


        // Password validation
        $password_pattern =
            '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&*]).{8,}$/';


        if (!preg_match($password_pattern, $new_password)) {

            $this->session->set_flashdata(
                'error',
                'Password must contain at least 8 characters, including uppercase, lowercase, number and symbol!'
            );

            redirect('Reset_password');
            return;
        }


        // নতুন password hash করা
        $hashed_password = password_hash(
            $new_password,
            PASSWORD_DEFAULT
        );


        // Database এ password update করা
        $this->db
            ->where('email', $email)
            ->update(
                'users',
                array(
                    'password' => $hashed_password
                )
            );


        // Reset email session remove করা
        $this->session->unset_userdata('reset_email');


        // Password update হওয়ার পর direct Login page এ পাঠানো
        redirect('Login');
    }
}