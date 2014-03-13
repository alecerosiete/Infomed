<?php
$user = $this->session->userdata('user_data');
echo validation_errors();
?>
<h1>Administracion de Usuarios</h1> 
<button type="button" onclick="newUserData()"  data-toggle="modal" href="#actions" class="btn btn-block btn-primary">Nuevo</button><br>
<table class="table table-hover table-bordered">
  
    
  
  <tr>
    <td  class="table-header-center">Id</td><td  class="table-header-center">Nombre</td><td  class="table-header-center">Username</td><td  class="table-header-center">E-mail</td><td  class="table-header-center">Registro</td><td  class="table-header-center">Acciones</td>
  </tr>
  <?php foreach ($getUsers as $user_data): ?>      
    <tr>
      <td class="text-align-vertical" id="id_<?= $user_data->id ?>"><?= $user_data->id ?></td>
      <td class="text-align-vertical" id="name_<?= $user_data->id ?>"><?= $user_data->name ?></td>
      <td class="text-align-vertical" id="username_<?= $user_data->id ?>"><?= $user_data->username ?></td>
      <td class="text-align-vertical" id="email_<?= $user_data->id ?>"><?= $user_data->email ?></td>
      <td class="text-align-vertical"><?= $user_data->registration_date ?></td>
      <td class="table-header-center">
       
        <button type="button" onclick="editUserData(<?=$user_data->id?>)"  data-toggle="modal" href="#actions" class="btn btn-sm btn-primary">Editar</button> 
        <button type="button" onclick="deleteUserData(<?=$user_data->id?>)" data-toggle="modal" href="#actions" class="btn btn-sm btn-primary">Borrar</button>
        <button type="button" onclick="activeUserData(<?=$user_data->id?>)" id="btnActive_<?= $user_data->id ?>" data-toggle="modal" href="#actions" class="btn btn-sm btn-primary"><?=$user_data->active == 0 ? ENABLE_USER:DISABLE_USER ?></button>
      </td>
    </tr>
  <?php endforeach; ?>
</table>


<!-- Modal -->
<div class="modal fade" id="actions" tabindex="-1" role="dialog" aria-labelledby="actions" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="actionTitle">
           
        </h4>
      </div>
      <div class="modal-body">      
        
      </div>      
      <div class="modal-footer">
          <div class="modal-notif">      
         
          </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

