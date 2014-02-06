<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('assertUser'))
{
  function assertUser() {
    
    $CI =& get_instance();
    $user = $CI->session->userdata('data');
    return $user->username;
  }
    
}

if ( ! function_exists('assertRole'))
{
  function assertRole($role) {
    
    $CI =& get_instance();
    $user = $CI->session->userdata('data');
    return $user->$role;
  }
    
}