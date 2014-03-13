<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_edit_account extends CI_Controller {

  private $session_id;
	public function __construct()
	{
	    parent::__construct();
	    $this->layout->setLayout('template_base');       
      $this->load->helper('menu_active');
      $this->session_id = $this->session->userdata('username');
	}
	
	public function index()
	{
		$this->layout->setTitle("Pagina Administracion de Cuenta - Infomed");
		$this->layout->setKeywords("Infomed, Administracion, cuenta");
		$this->layout->setDescripcion("Pagina Administracion de Cuenta de Infomed");
    $this->layout->css(array(base_url()."public/css/custom.css"));
    
    if(!empty($this->session_id)){      
      $data = $this->session->userdata('data');
      
      $this->layout->view('admin_edit_account',array('data'=>$data));
    }else{
      redirect(base_url()."login/signin.php",301);
    }   
   
	}
  
  public function editMyAccount(){
    if ($this->input->post()) {
      $data = array
          (
          'id' => $this->input->post("id", true),
          'name' => $this->input->post("name", true),
          'username' => $this->input->post("username", true),
          'email' => $this->input->post("email", true),
          'password' => $this->input->post("password", true),
          'last_user' => $this->session_id,
      );
      if ($this->form_validation->run("user/add") == false) {
        $html = "<div class='alert alert-warning'>" . validation_errors() . "</div>";
        echo json_encode(array(
            'data' => $html,
            'status' => false
        ));
      } else {
          $this->user_model->updateMyAccount($data);
          $data = $this->user_model->signIn($this->input->post('username',true), 
                               sha1($this->input->post('password',true)));
          
          $this->session->set_userdata('data',$data);
          
          $html = "<i class='fa fa-check-circle-o fa-lg'></i> Actualizado con exito";
          echo json_encode(array('data' => $html,
              'status' => true));
      }
    }
  }
          
  

}