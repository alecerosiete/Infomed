
<h1>Editar mi cuenta</h1>
<br>
<?php
 
  $atributos = array('id' => 'form_edit_account', 'name' => 'form_edit_account', 'class' => 'form-horizontal edit', 'role' => 'form');
  echo form_open(null,$atributos);  

  ?>
    

  <input type="hidden" class="form-control" id="id" placeholder="id" value="<?php echo $data->id ?>">

  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="name" placeholder="Nombre" value="<?php echo $data->name ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="username" placeholder="Username" disable value="<?php echo $data->username  ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">E-mail</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="email" placeholder="E-mail" disable value="<?php echo $data->email  ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
  </div>  
  <div class="form-group">   
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-6">
      <button  type="button" id="editMyAccount"  class="btn btn-primary">Actualizar mis datos</button>
      <button  type="button" id="cancelEditMyAccount"  class="btn btn-default">Cancelar</button>
    </div>  

  </div>
 <div class="form-group"> 
   <label class="col-sm-2 control-label"></label>
   <div class="col-sm-6">
    <div id='sms_notification'>
    </div>
   </div>
 </div>
  
  <?php form_close();?>

    <?php 
  
  if($this->session->flashdata('ControllerMessage') != ''){?>
    <div class="alert alert-danger"><?=$this->session->flashdata('ControllerMessage')?></div>
  <?php
  }
   
  ?>