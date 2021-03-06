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

  // Check username exists
  public function check_username_exists($username){
    $query = $this->db->get_where('users', array('username' => $username));

    if (empty($query->row_array())) {
      return true;
    } else {
      return false;
    }

  }

  // Check whether email exists
  public function check_email_exists($email){
    $query = $this->db->get_where('users', array('email' => $email));

    if (empty($query->row_array())) {
      return true;
    } else {
      return false;
    }

  }

  // Log user in
  public function login($username, $password){
    // Validate user Input
    $this->db->where('username', $username);
    $this->db->where('password', $password);

    $result = $this->db->get('users');
    if ($result->num_rows() == 1) {
      return $result->row(0)->id;
    } else {
      return false;
    }

  }
}

 ?>
