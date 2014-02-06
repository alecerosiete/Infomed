<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  private $session_id;
	public function __construct()
	{
	    parent::__construct();
	    $this->layout->setLayout('template_login');   
      $this->load->helper('menu_active');
      $this->session_id = $this->session->userdata('username');
	}
	
	public function index()
	{
    redirect(base_url()."login/signin.php",301);

	}
  
  public function signin(){
    $this->layout->css(array(base_url()."public/css/signin.css"));
    $this->layout->setTitle("Pagina Login - Infomed");
		$this->layout->setKeywords("Infomed, Login");
		$this->layout->setDescripcion("Pagina Login de Infomed");
    
    
    
    if($this->input->post()){
           
      if($data = $this->user_model->signIn($this->input->post('username',true), 
                               sha1($this->input->post('password',true)))){
        
       $user = $this->user_model->getUser($this->input->post('username',true));

        $this->session->set_userdata('pushcaller');
        $this->session->set_userdata('username',$user->username);
        $this->session->set_userdata('data',$data);

        redirect(base_url().'index.php',301);
                
      }else{
        $this->session->set_flashdata('ControllerMessage',SMS_ERROR_LOGIN);
        redirect(base_url().'login/signin.php',301);
      }
      
    }
    
    $this->layout->view("login");
    
    
  }
  
  
  public function logout(){
    $this->session->unset_userdata(array('username'=>''));
    $this->session->sess_destroy('pushcaller');
    redirect(base_url().'login/signin.php',301);
  }

}

