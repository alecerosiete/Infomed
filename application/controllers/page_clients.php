<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_clients extends CI_Controller {

    private $session_id;

    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('template_base');
        $this->load->helper('menu_active');
        $this->session_id = $this->session->userdata('username');
    }

    public function index() {
        $this->layout->setTitle("Clientes - Infomed");
        $this->layout->setKeywords("Infomed, Clientes");
        $this->layout->setDescripcion("Pagina Clientes de Infomed");
        $this->layout->css(array(base_url() . "public/css/custom.css"));


        if (!empty($this->session_id)) {
            $data = array('data' => $this->session->userdata('data'));
            $this->layout->view('clients', $data);
            //$client = array('client'=>$this->input->post("clientData",true));
            //$this->layout->view('clientActions',$client);
        } else {
            redirect(base_url() . "login/signin.php", 301);
        }
    }

    public function searchClient() {
        if ($this->input->post()) {
            if ($this->input->post("name", true) == "") {
                $html = "<tr><td><div class='alert alert-warning'> Ningun cliente encontrado</div></td></tr>";
                echo json_encode(array('data' => $html,
                    'status' => true));
                exit;
            }
            $html = "<tr><td width='70%'>";
            $html .= "Cliente";
            $html .= "</td>";
            $html .= "<td colspan='3' align='center'>Acciones</td></tr>";
            $html .= "<tr><td>";
            $html .= $this->input->post("name", true);
            $html .= "</td> 
                <td align='center'><div class='btn btn-primary btn-sm'>Editar</div></td>
                <td align='center'><div id='editClient' onclick='editClient(" . ' " ' . $this->input->post("name", true) . ' " ' . ")' class='btn btn-primary btn-sm'>Activar</div></td> 
                <td align='center'><div class='btn btn-primary btn-sm'>Borrar</div></td> 
               </tr>";

            echo json_encode(array('data' => $html,
                'status' => true));
        }
    }

    public function getClient() {

        $query = $this->input->post("query", true);
        error_log("VALOR DEL POST " . $query);
        echo json_encode($this->client_model->getClientData($query));
    }

    public function newClient() {
        $this->layout->setTitle("Nuevo Cliente - Infomed");
        $this->layout->setKeywords("Infomed, Clientes");
        $this->layout->setDescripcion("Pagina nuevo cliente de Infomed");
        $this->layout->css(array(base_url() . "public/css/custom.css"));

        if (!empty($this->session_id)) {
            $data = array('data' => $this->session->userdata('data'));
            $this->layout->view('newClient', $data);
        } else {
            redirect(base_url() . "login/signin.php", 301);
        }
    }

    public function editClient() {
        $this->layout->setTitle("Editar Cliente - Infomed");
        $this->layout->setKeywords("Infomed, Clientes");
        $this->layout->setDescripcion("Pagina Editar cliente de Infomed");
        $this->layout->css(array(base_url() . "public/css/custom.css"));

        if (!empty($this->session_id)) {
            $nombre = $this->input->post("nombre", true);
            $data = array('data' => $this->session->userdata('data'), 'edit' => array('name' => $nombre));
            error_log("nombre: " . $nombre);
            $this->layout->view('editClient', $data);
        } else {
            redirect(base_url() . "login/signin.php", 301);
        }
    }
    
    public function addClientWorkPlace() {
      $this->layout->setLayout('template_ajax');
      $id = (int) $this->input->post("id", true);
      $data = array('data' => $this->user_model->getUser($id));
      $this->layout->view('edit_user_ajax_response', $data);
    }

}