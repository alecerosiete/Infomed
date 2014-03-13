 <?php
 
  $atributos = array('id' => 'form', 'name' => 'form', 'class' => 'form-signin', 'role' => 'form');
  echo form_open(null, $atributos);  
  echo validation_errors();
  ?>
  <h2 class="form-signin-heading">Ingresar</h2> 
  <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
  <input type="password" class="form-control" name="password" placeholder="Password" required>
  <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
  <?php form_close();?>
  
  <h1></h1>

  <?php 
  if($this->session->flashdata('ControllerMessage') != ''){?>
    <div class="alert alert-danger"><?=$this->session->flashdata('ControllerMessage')?></div>
  <?php
  }
  ?>


