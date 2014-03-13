<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Import Headers -->
    <?php echo $headers_for_layout; ?>
  </head>

  <body>
    <div id="wrap">
   <!-- container -->
    <div class="container"> 
      <?php echo $content_for_layout; ?>       
      
    </div>
    <!-- /container --> 
    </div>
    <!-- Footer -->
    <?php echo $footer_for_layout; ?>
    <!-- /Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>public/js/jquery_1_10_2.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
  </body>
</html>