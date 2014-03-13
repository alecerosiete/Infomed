
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Import Headers -->

    <?php echo $headers_for_layout; ?>
  </head>

  <body>
    <div id="wrap">
      <!-- Import navbar -->
      <?php echo $menu_for_layout; ?>     
      <!-- /navbar -->
      
      <!-- container -->
      <div class="container"> 
        <div class="jumbotron">
            <?php echo $content_for_layout; ?>                
        </div>
      </div>
      <!-- /container --> 
    </div>
      
    <!-- Footer -->
    <?php echo $footer_for_layout; ?>
    <!-- /Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>public/js/jquery-1.11.0.js"></script>
<!--
    <script src="<?php echo base_url() ?>public/js/bootstrap.js"></script>-->
    <script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url() ?>public/js/ajax/modal.js"></script>
    <script src="<?php echo base_url() ?>public/js/ajax/actions.js"></script>
  </body>
</html>




  