<?php

class Users extends CI_Controller{

  public function register(){
    $data['title'] = 'Sign Up';

    $this->form_validation->set_rules('name', 'Name', 'requird');
    $this->form_validation->set_rules('username', 'Username', 'requird');
    $this->form_validation->set_rules('email', 'Email', 'requird');
    $this->form_validation->set_rules('password', 'Password', 'requird');
    // $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header');
      $this->load->view('users/register', $data);
      $this->load->view('templates/footer');
    } else {
      die('Continue');
    }

  }


}


 ?>
