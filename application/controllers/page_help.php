<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_help extends CI_Controller {

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
		$this->layout->setTitle("About - Infomed");
		$this->layout->setKeywords("Infomed, asterisk");
		$this->layout->setDescripcion("Pagina acerca de Infomed");

    if(!empty($this->session_id)){
      $data = array('data' => $this->session->userdata('data'));
      $this->layout->view('help',$data);
    }else{
      redirect(base_url()."login/signin.php",301);
    }  
	}
  

}