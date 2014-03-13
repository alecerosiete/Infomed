<?php

class user_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function update($data) {

    $user_data = array(
        'id' => $data['id'],
        'name' => $data['name'],
        'username' => $data['username'],
        'email' => $data['email'],        
        'password' => sha1($data['password']),               
        'active' =>  $data['active'],       
        'groupname' => $data['groupname'],
        'last_user' => $data['last_user']
    );
    $this->db->where('id', $user_data['id']);
    return ($this->db->update('sys_users', $user_data));
  }

  
  public function insert($data) {
    $user_data = array(
        'name' => $data['name'],
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => sha1($data['password']),
        'active' =>  $data['active'],
        'groupname' => $data['groupname'],
        'last_user' => $data['last_user'],
        'registration_date' => $data['registration_date']
    );
    return $this->db->insert('sys_users', $user_data);
  }

  public function delete($id) {
    $this->db->where('id', $id);
    return ($this->db->delete('sys_users'));
  }
  
  public function getUserUsername($username){
    $query = $this->db->get_where('sys_users', array('username' => $username));

      if ($query->num_rows() > 0) {
        return $query->row();        
      } else {
        return false;
      }
    
  }
  
  
  public function getUser(){
    // Obteniendo el total de argumentos pasados a esta funcion
      $totalArgumentos = func_num_args();
      
      // Determinando a qué metodo llamar dependiendo del número de argumentos
      switch($totalArgumentos) {
        case 0:
          return $this->getAllUsers();
          break;
        case 1:
          if(is_int(func_get_arg(0))) {            
            return $this->getUserById(func_get_arg(0));
          }else if (is_string(func_get_arg(0))) {
            return $this->getUserByUsername(func_get_arg(0));
          }
          break;       
 
        default:
          return false;
      } // Fin del switch.    
  }
  
  public function getUserByUsername($username){
    $query = $this->db->get_where('sys_users', array('username' => $username));

      if ($query->num_rows() > 0) {
        return $query->row();        
      } else {
        return false;
      }
    
  }
  
  
  public function getAllUsers() {
      $query = $this->db->get('sys_users');
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

    public function getUserById($id) {

      $query = $this->db->get_where('sys_users', array('id' => $id));
      
      if ($query->num_rows() > 0) {
        
        return $query->row();        
      } else {
        return false;
      }
    }
  
  public function signIn($username, $password) {
    $this->db->select('*');
    $this->db->from('sys_users');
    $this->db->join('sys_group', 'sys_group.groupname = sys_users.groupname');
    $this->db->where(array('sys_users.username'=> $username,'password' => $password,'active'=>1));
    $query = $this->db->get();
    if ($query->num_rows() > 0){      
      return $query->row();
    }else{
      return false;
    }

  }
  
  
  public function adminAccountExists(){
    $query = $this->db->get_where('sys_users', array('groupname' => GROUP_ADMIN));
      
      if ($query->num_rows() > 1) {
        
        return true;        
      } else {
        return false;
      }
  }
  
  
  public function isUserActive($id){
    $query = $this->db->get_where('sys_users', array('id' => $id, 'active'=>1));
      
      if ($query->num_rows() > 0) {        
        return true;        
      } else {
        return false;
      }
  }
  
  public function activeUser($id,$text){    
    if($text == ENABLE_USER){
      $active = 1;
    }else{
      $active = 0;
    }    
    $this->db->where('id', $id);
    return ($this->db->update('sys_users', array('active'=>$active)));
  }
  
  public function updateMyAccount($data){
    $user_data = array(
        'id' => $data['id'],
        'name' => $data['name'],
        'username' => $data['username'],
        'email' => $data['email'],        
        'password' => sha1($data['password']),
    );
    $this->db->where('id', $data['id']);
    return ($this->db->update('sys_users', $user_data));
    
    
  }
}