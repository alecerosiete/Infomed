<?php

class get_user_data_model extends CI_Model {

  private $id;
  private $name;
  private $username;
  private $email;
  private $password;
  private $login;
  private $registered;

  function __construct() {
    parent::__construct();

  }

  public function get_data($id) {
    $this->db->select('id,name,username,email')
            ->from('sys_users')
            ->where(array('id' => $id));
    $query = $this->db->get();
    
    $data = null;
    foreach ($query->result() as $row) {
      $this->setId($row->id);
      $this->setName($row->name);
      $this->setUsername($row->username);
      $this->setEmail($row->email);

            
    }

  }
  
  public function setId($id){
    $this->id = $id;
  }
  
  public function setName($name){
    $this->name = $name;
  }
  
  public function setUsername($username){
    $this->username = $username;
  }
  
  public function setPassword($password){
    $this->password = $password;
  }
  
  public function setEmail($email){
    $this->email = $email;
  }
  
  public function setLogin($login){
    $this->login = $login;
  }
  
  public function setRegistered($registered){
    $this->registered = $registered;
  }
  
  public function getId(){
    return $this->id;
  }

  public function getName(){
    return $this->name;
  }
  
  public function getUsername(){
    return $this->username;
  }
  
  public function getPassword(){
    return $this->password;
  }
  
  public function getEmail(){
    return $this->email;
  }
  
  public function getLogin(){
    return $this->login;
  }
  
  public function getRegistered(){
    return $this->registered;
  }

}