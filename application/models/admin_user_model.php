<?php

class admin_user_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function getUsers() {    
    $query = $this->db->get('users');    
    return $query->result();
  }

}