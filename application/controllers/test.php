<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {


	public function index()
	{
              
                $this->layout->view('test',array("hola"=>"hola"));
   
	}
        public function hola(){
            
           $this->layout->view('test',array("holaq"=>"hola que tal"));
        }

}
