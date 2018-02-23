<?php

class Users extends CI_Controller
{

  // Register a new user
    public function register()
    {
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));
            $this->user_model->register($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
            redirect('posts');
        }
    }

    // Log in an existing user
    public function login()
    {
        $data['title'] = 'Sign In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {
            // Get the username
            $username = $this->input->post('username');
            // Get and encrypt the password
            $password = md5($this->input->post('password'));

            // Login user
            $user_id = $this->user_model->login($username, $password);

            if ($user_id) {
              // Create session

              // Set message
              $this->session->set_flashdata('user_loggedin', 'You are now logged in');
              redirect('posts');
            } else {
              // Set message
              $this->session->set_flashdata('login_failed', 'Invalid username/password!');
              redirect('users/login');
            }


        }
    }

    // Check if username exists
    public function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists', 'Sorry, That username is taken! Please choose a different one.');

        if ($this->user_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

    // Check if email exists
    public function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'Sorry, That email is taken! Please choose a different one.');

        if ($this->user_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }
}
