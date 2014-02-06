<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Admin_users extends CI_Controller {

  private $session_id;

  public function __construct() {
    parent::__construct();
    $this->layout->setLayout('template_base');
    $this->load->helper('menu_active');
    $this->session_id = $this->session->userdata('username');
    if (empty($this->session_id)) {
      redirect_top(base_url() . "login/signin.php");
    }
  }

  public function index() {
    $this->layout->css(array(base_url() . "public/css/custom.css"));
    $this->layout->setTitle("Pagina Administracion de Usuarios - Infomed");
    $this->layout->setKeywords("Infomed, Administracion, Usuarios");
    $this->layout->setDescripcion("Pagina Administracion de Usuarios de Infomed");

    if (!empty($this->session_id)) {

      $data = array(
          'data' => $this->session->userdata('data'),
          'getUsers' => $this->user_model->getUser()
      );

      $this->layout->view('admin_users', $data);
    } else {
      redirect(base_url() . "login/signin.php", 301);
    }
  }

  public function new_user_ajax_response() {
    $this->layout->setLayout('template_ajax');
    $this->layout->view('new_user_ajax_response');
  }

  public function saveNewUserData() {

    if ($this->input->post()) {
      $data = array
          (
          'name' => $this->input->post("name", true),
          'username' => $this->input->post("username", true),
          'email' => $this->input->post("email", true),
          'password' => $this->input->post("password", true),
          'active' => 1,
          'groupname' => $this->input->post("group_name", true),
          'last_user' => $this->session_id,
          'registration_date' => date("Y-m-d H:i:s")
      );

      if ($this->form_validation->run("user/add") == false) {
        $html = "<div class='alert alert-warning'>" . validation_errors() . "</div>";
        echo json_encode(array(
            'data' => $html,
            'status' => false
        ));
      } else {
        $ifUserExist = $this->user_model->getUserUsername($this->input->post("username", true));
        if ($ifUserExist) {
          $html = "<div class='alert alert-warning'>Este<strong> username</strong> ya existe, ingrese un <strong> username</strong> unico</div>";
          echo json_encode(array('data' => $html,
              'status' => false));
        } else {
          $this->user_model->insert($data);
          $html = "Editar <i class='fa fa-check-circle-o fa-lg'></i>";
          echo json_encode(array('data' => $html,
              'status' => true));
        }
      }
    }
  }

  public function edit_user_ajax_response() {
    $this->layout->setLayout('template_ajax');
    $id = (int) $this->input->post("id", true);
    $data = array('data' => $this->user_model->getUser($id));
    $this->layout->view('edit_user_ajax_response', $data);
  }

  public function saveEditUserData() {
    if ($this->input->post()) {    
      $user_data = $this->user_model->getUser((int)$this->input->post("id", true));
      
      if ($user_data->groupname == GROUP_ADMIN) {
        error_log("GROUP_NAME".$user_data->groupname);      
         if($this->input->post("group_name", true) != GROUP_ADMIN){
           error_log("NUEVO GROUP NAME".$this->input->post("group_name", true));      
            if (!$this->user_model->adminAccountExists()) {   
              error_log("ULTIMO ADMIN?".$this->user_model->adminAccountExists());
              $data = array(
                  'data' => "<div class='alert alert-warning'>No puede cambiar de grupo este usuario, debe existir por lo menos un usuario administrador</div>",
                  'status' => false
              );
               echo json_encode($data);
               exit;
            }
          }
      }
      if ($this->form_validation->run("user/add") == false) {
        $html = "<div class='alert alert-warning'>" . validation_errors() . "</div>";
        echo json_encode(array(
            'data' => $html,
            'status' => false));
      } else {
        $data = array
            (
            'id' => $this->input->post("id", true),
            'name' => $this->input->post("name", true),
            'username' => $this->input->post("username", true),
            'email' => $this->input->post("email", true),
            'password' => $this->input->post("password", true),
            'active' => 1,
            'groupname' => $this->input->post("group_name", true),
            'last_user' => $this->session_id
        );
        if ($this->user_model->update($data)) {

          echo json_encode(array(
              'name' => $this->input->post("name", true),
              'email' => $this->input->post("email", true),
              'status' => true
          ));
        } else {
          echo json_encode(array('status' => true));
        }
      }
      
    }
  }

  public function delete_user_ajax_response() {
    $this->layout->setLayout('template_ajax');
    $id = $this->input->post("id", true);

    $userName = $this->user_model->getUser((int) $id);

    $data = array('content' => 'Esta seguro que desea eliminar el usuario ' . $userName->name . '?');
    $this->layout->view('delete_user_ajax_response', array("data" => $data));
  }

  public function delete_user_data() {
    if ($this->input->post()) {
      $id = $this->input->post("id", true);
      $user_data = $this->user_model->getUser((int) $id);
      if ($user_data->groupname == GROUP_ADMIN) {
        if (!$this->user_model->adminAccountExists()) {
          $data = array(
              'data' => "<div class='alert alert-warning'>No puede eliminar este usuario, debe existir por lo menos un usuario administrador</div>",
              'status' => false
          );
          echo json_encode($data);
          exit;
        }
          
      }
      
      $result = $this->user_model->delete($this->input->post("id", true));
      if ($result) {
        $data = array(
            'data' => "Eliminar <i class='fa fa-check-circle-o fa-lg'></i>",
            'status' => true
        );
      } else {
        $data = array(
            'data' => "Error al eliminar usuario",
            'status' => false
        );
      }

      echo json_encode($data);
        
     }
  }
  

  public function active_user_ajax_response() {
    $this->layout->setLayout('template_ajax');
    $id = $this->input->post("id", true);
    if ($this->user_model->isUserActive($id)) {
      $state = DISABLE_USER;
    } else {
      $state = ENABLE_USER;
    }

    $userName = $this->user_model->getUser((int) $id);

    $data = array('data' => $state . ' el usuario ' . $userName->name . '.?',
        'state' => $state);

    $this->layout->view('active_user_ajax_response', array('data' => $data));
  }

  public function active_user_data() {
    if ($this->input->post()) {
      $id = $this->input->post("id", true);
      $text = $this->input->post("text", true);
      $user_data = $this->user_model->getUser((int) $id);
      if ($user_data->groupname == GROUP_ADMIN) {
        if (!$this->user_model->adminAccountExists()) {

          $data = array(
              'data' => "<div class='alert alert-warning'>No puede desactivar este usuario, debe existir por lo menos un usuario administrador activo</div>",
              'status' => false
          );
           echo json_encode($data);
           exit;
        }
      } else {
        $result = $this->user_model->activeUser($this->input->post("id", true), $text);
        if ($result) {
          $data = array(
              'data' => "Activar/Desactivar <i class='fa fa-check-circle-o fa-lg'></i>",
              'status' => true
          );
        } else {
          $data = array(
              'data' => "Error al activar usuario",
              'status' => false
          );
        }
         echo json_encode($data);
      }
     
    }
  }

}