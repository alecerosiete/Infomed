
<h1>Nuevo cliente</h1>


<div class="container-fluid ">
      <p>Complete el formulario con los datos del cliente.</p>   
      <?php 
      $atributos = array('id' => 'form_new_client', 'name' => 'form_new_client', 'class' => 'form-horizontal ', 'role' => 'form');
      echo form_open(null,$atributos);  
      ?>     
<div class="col-xs-6">
  <div class="form-group">
    <label for="clientName" class="col-md-2 control-label">Nombre</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="clientName" placeholder="Nombre" >
    </div>
  </div>
  <div class="form-group">
    <label for="clientSurname" class="col-md-2 control-label">Apellido</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="clientSurname" placeholder="Apellido" >
    </div>
  </div>
  <div class="form-group">
    <label for="clientEmail" class="col-md-2 control-label">E-mail</label>
    <div class="col-md-9">
      <input type="email" class="form-control" id="clientEmail" placeholder="E-mail" >
    </div>
  </div>
  <div class="form-group">
    <label for="clientPhoneNumber" class="col-md-2 control-label">Telefono</label>
    <div class="col-md-9">
      <input type="number" class="form-control" id="clientPhoneNumber" placeholder="595..." >
    </div>
  </div>
  <div class="form-group">
    <label for="clientRuc" class="col-md-2 control-label">Ruc</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="clientRuc" placeholder="Ruc" >
    </div>
  </div>
  <div class="form-group">
    <label for="clientAddress" class="col-md-2 control-label">Direccion</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="clientAddress" placeholder="Direccion" >
    </div>
  </div>
  
  <div class="form-group">
    <label for="clientPassword" class="col-md-2 control-label">Password</label>
    <div class="col-md-9">
      <input type="password" class="form-control" id="clientPassword" placeholder="Password">
    </div>
  </div>  
  <div class="form-group">
    <label for="clientBirthdayDay" class="col-md-2 control-label">Cumpleaños </label>
    <div class="col-md-3">
      <input type="number" class="form-control" min="1" max="99" requerid id="clientBirthdayDay" placeholder="Dia">
    </div>
    <div class="col-md-6">
      <select class="form-control" id="clientBirthdayMonth">
        <option value="enero">Enero</option>
        <option value="febrero">Febrero</option>
        <option value="marzo">Marzo</option>
        <option value="abril">Abril</option>
        <option value="mayo">Mayo</option>
        <option value="junio">Junio</option>
        <option value="julio">Julio</option>
        <option value="agosto">Agosto</option>
        <option value="septiembre">Septiembre</option>
        <option value="octubre">Octubre</option>
        <option value="noviembre">Noviembre</option>
        <option value="diciembre">Diciembre</option>
      </select>
    </div>
  </div>   
      
  <div class="form-group">
    <label for="clientComments" class="col-md-2 control-label">Obs.</label>
    <div class="col-md-9">
      <textarea class="form-control" id="clientComments" placeholder="Observaciones"  rows="3"></textarea>
    </div>
  </div> 
</div>
<div class="col-xs-6">
      
  <div class="form-group">
    <label for="clientWorkPlace" class="col-md-3 control-label">Lugar de Trabajo</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="clientWorkPlace" placeholder="Lugar de Trabajo" >
    </div>
  </div>
  <div class="form-group">
    <label for="clientWorkSector" class="col-md-3 control-label">Sector</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="clientWorkSector" placeholder="Sector" >
    </div>
  </div>
  <div class="form-group">
    <label for="clientWorkSection" class="col-md-3 control-label">Seccion</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="clientWorkSection" placeholder="E-mail" >
    </div>
  </div>
    <div class="form-group">
    <label for="clientWorkDepartment" class="col-md-3 control-label">Departamento</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="clientWorkDepartment" placeholder="Departamento" >
    </div>
    </div>
    <div class="form-group">
    <label for="clientWorkAppointment" class="col-md-3 control-label">Cargo</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="clientWorkAppointment" placeholder="Cargo" >
    </div>
    </div>
    <div class="form-group">
    <label for="clientCity" class="col-md-3 control-label">Ciudad</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="clientCity" placeholder="Ciudad" >
    </div>
    </div>
    <div class="form-group">
    <label for="clientContact" class="col-md-3 control-label">Contacto</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="clientContact" placeholder="Contacto" >
    </div>
    </div>
  </div>
  </div>
  
  
<div class="row" align="center">
    <button  type="button" id="saveNewClient"  class="btn btn-primary">Guardar</button>
    <a href="page_clients" class="btn btn-default" role="button" id="cancelsaveNewClient" >Cancelar</a>

    <div id='sms_notification'>
    </div>
</div>

<?php
form_close();
?>

<?php 
  if($this->session->flashdata('ControllerMessage') != ''){
?>

  <div class="alert alert-danger">
    <?=$this->session->flashdata('ControllerMessage')?></div>
<?php
  }
?>
        

  </div>
</div>