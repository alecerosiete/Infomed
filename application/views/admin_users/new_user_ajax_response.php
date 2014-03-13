
 <?php
 
  $atributos = array('id' => 'form_new_user', 'name' => 'form_new_user', 'class' => 'form-horizontal', 'role' => 'form');
  echo form_open("admin_users", $atributos);  

  ?>
    
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Nombre" value="<?php echo set_value("name") ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo set_value("username") ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">E-mail</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="E-mail" value="<?php echo set_value("email") ?>">
    </div>
  </div>

  <div class="form-group">
     <label for="group-name" class="col-sm-2 control-label">Grupo</label>
     <div class="col-sm-10">
        <select id="group-name" name="group-name" class="form-control ">
          <option value="admin">Administrador</option>
          <option value="customer">Cliente</option>
          <option value="report">Reporte</option>    
        </select>
      </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
  </div>  
  
  <button type="button" id="saveNewUserData"  class="btn btn-block btn-success">Crear usuario</button>
  <?php form_close();?>
  

  <?php 
  
  if($this->session->flashdata('ControllerMessage') != ''){?>
    <div class="alert alert-danger"><?=$this->session->flashdata('ControllerMessage')?></div>
  <?php
  }
   
  ?>
