
<h1>Clientes</h1>


<div class="container-fluid ">
  <div class="row">
    <div class="col-md-4">
      <p>Cree un nuevo cliente.</p>
      <!-- Button to trigger modal -->
      <a href="page_clients/newClient.php" class="btn btn-primary" role="button">
        Nuevo Cliente
      </a>
      <!--<button type="button" id="newClient" class="btn btn-primary">Nuevo</button>-->
    </div>
    <div class="col-md-*">
      <p>O busque un cliente existente.</p>
    <?php 
      $atributos = array('id' => 'form_search_client', 'name' => 'form_search_client', 'class' => 'form-inline ', 'role' => 'form');
      echo form_open(null,$atributos);  
    ?>     
      <div class="form-group">
        <input type="text" class="form-control input-lg input-size" id="search" autocomplete="off">
      </div>
      <button type="button" id="getClient" class="btn btn-primary">Buscar cliente</button>
      <?php form_close();?>

    <p>
    </p>
     
    
    </div>
  </div>
</div>




<div class="table-responsive">
  <table class="table table-bordered table-hover  client-info" id="clientInfo">
    
  </table>
</div>



