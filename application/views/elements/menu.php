<?php 
//$user = $this->session->userdata('user_data');
?>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url()."index.php"?>">InfoMed</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php echo active_link('index'); ?>">
              <a href="<?=base_url()."index.php"?>">Inicio</a>
            </li>
            <li class="<?php echo active_link('page_clients'); ?>">
              <a href="<?=base_url()."page_clients.php"?>">Clientes</a>
            </li>
            <li class="<?php echo active_link('page_report'); ?>">
              <a href="<?=base_url()."page_report.php"?>">Reporte</a>
            </li>
            <li class="<?php echo active_link('page_about'); ?>">
              <a href="<?=base_url()."page_about.php"?>">Acerca de</a>
            </li>
            <li class="<?php echo active_link('page_help'); ?>">
              <a href="<?=base_url()."page_help.php"?>">Ayuda</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistema <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php if(assertRole(ROLE_ADMIN)): ?>
                <li class="dropdown-header">Administracion</li>
                <li><a href="admin_users.php">Usuarios</a></li>                
                <li><a href="admin_config.php">Configuracion</a></li>
                <li class="divider"></li>
                <?php endif;?>
                <li class="dropdown-header">Mi cuenta</li>
                <li><a href="admin_edit_account.php">Editar</a></li>
                <li><a href="<?=base_url()."login/logout.php"?>">Salir</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">            
            <li><a href="#status">Usuario conectado: <?=$data->username?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>