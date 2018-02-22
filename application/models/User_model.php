<?php

class User_model extends CI_Model{

  public function  register($enc_password){
    //User data array
    $data = array(
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'username' => $this->input->post('username'),
      'password' => $enc_password,
      'postcode' => $this->input->post('postcode')

    );

    // Insert user
    return $this->db->insert('users', $data);
  }
}

 ?>
