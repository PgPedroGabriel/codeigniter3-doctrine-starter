<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><?php if (!$this->user): ?>

  <?php $this->load->view('admin/main/login'); ?>

<?php else: ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  	<meta name="description" content="Administrador de conteúdo">
  	<meta name="author" content="Pedro Gabriel">
  	<link rel="icon" href="images/favicon.ico">
    <title>PG™ | Administrador</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=$baseUrl?>frontend/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?=$baseUrl?>frontend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">    
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=$baseUrl?>frontend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=$baseUrl?>frontend/dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php $this->load->view('admin/header'); ?>
    <?php $this->load->view('admin/controllers_sidebar'); ?>

    <div class="content-wrapper">
        
        <?php $this->load->view('admin/content_header'); ?>
        
        <?php if(!empty($requestMessage['message'])): ?>
          <div class="row">
            <div class="alert alert-<?=$requestMessage['class']?>"><?=$requestMessage['message']?></div>
          </div>
        <?php endif; ?>

        <section class="content">
          <?php $this->load->view($view); ?>
        </section>

  	</div> <!-- /container -->

    <?php $this->load->view('admin/footer'); ?>

    <?php $this->load->view('admin/configuration_sidebar'); ?>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="<?=$baseUrl?>frontend/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?=$baseUrl?>frontend/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=$baseUrl?>frontend/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$baseUrl?>frontend/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?=$baseUrl?>frontend/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=$baseUrl?>frontend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=$baseUrl?>frontend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?=$baseUrl?>frontend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?=$baseUrl?>frontend/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=$baseUrl?>frontend/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=$baseUrl?>frontend/dist/js/demo.js"></script>
</body>
</html>
<?php endif ?>