<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_report extends CI_Controller {

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
		$this->layout->setTitle("Reporte - Infomed");
		$this->layout->setKeywords("Infomed, Reporte");
		$this->layout->setDescripcion("Pagina Reporte de Infomed");

    if(!empty($this->session_id)){
      $data = array('data' => $this->session->userdata('data'));
      $this->layout->view('report',$data);
    }else{
      redirect(base_url()."login/signin.php",301);
    }  
	}
  

}