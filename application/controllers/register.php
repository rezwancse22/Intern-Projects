<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }


    public function index()
    {
        // যদি শুধু Register page open করা হয়
        if ($this->input->method() === 'get') {

            $this->load->view('register');
            return;
        }


        // Form থেকে data নেওয়া
        $full_name = $this->input->post('full_name');
        $date_of_birth = $this->input->post('date_of_birth');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');


        // Password দুইটা same কিনা check
        if ($password !== $confirm_password) {

            echo "Password does not match!";
            return;
        }


        // একই Email already আছে কিনা check
        $existing_email = $this->db
            ->where('email', $email)
            ->get('users')
            ->row();


        if ($existing_email) {

            echo "This email is already registered!";
            return;
        }


        // একই Phone already আছে কিনা check
        $existing_phone = $this->db
            ->where('phone', $phone)
            ->get('users')
            ->row();


        if ($existing_phone) {

            echo "This phone number is already registered!";
            return;
        }


        // Password secure hash করা
        $hashed_password = password_hash(
            $password,
            PASSWORD_DEFAULT
        );


        // Database এ save করার data
        $data = array(

            'full_name'     => $full_name,
            'date_of_birth' => $date_of_birth,
            'phone'         => $phone,
            'email'         => $email,
            'password'      => $hashed_password

        );


        // Database এ insert
        $this->db->insert('users', $data);


        // সফল হলে Login page এ পাঠাবে
        redirect('login');
    }
}