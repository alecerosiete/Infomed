 <?php
 
  $atributos = array('id' => 'form_edit_user', 'name' => 'form_edit_user', 'class' => 'form-horizontal', 'role' => 'form');
  echo form_open(null, $atributos);  
  echo validation_errors();
  ?>

  <input type="hidden" class="form-control" name="id" id="id" value="<?= $data->id ?>">
  
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Nombre" value="<?=$data->name?>">
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" disabled placeholder="Username" value="<?=$data->username?>">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">E-mail</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="E-mail" value="<?=$data->email?>">
    </div>
  </div>
  <div class="form-group">
     <label for="group-name" class="col-sm-2 control-label">Grupo</label>
     
     <div class="col-sm-10">
        <select id="group-name" name="group-name" class="form-control ">
          <option value="admin" <?php if ($data->groupname == "admin") echo'selected';?>>Administrador</option>
          <option value="customer" <?php if ($data->groupname == "customer") echo 'selected';?>>Cliente</option>
          <option value="report" <?php if ($data->groupname == "report") echo 'selected';?>>Reporte</option>    
        </select>
      </div>
  </div>
  
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" placeholder="Password" value="">
    </div>
  </div>
  <button type="button" id="saveEditUserData" class="btn btn-block btn-success">Guardar cambios</button>
  <?php form_close();?>


  <?php 
  if($this->session->flashdata('ControllerMessage') != ''){?>
    <div class="alert alert-danger"><?=$this->session->flashdata('ControllerMessage')?></div>
  <?php
  }
  ?>
