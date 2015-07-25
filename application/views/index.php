<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  	<meta name="description" content="">
  	<meta name="author" content="Pedro Gabriel">
  	<link rel="icon" href="images/favicon.ico">

  	<title>Theme Template for Bootstrap</title>

  	<!-- Bootstrap core CSS -->
  	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  	<!-- Bootstrap theme -->
  	<link href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

  	<!-- Custom styles for this template -->
  	<link href="css/main.css" rel="stylesheet">
  </head>

  <body role="document">

    <?php $this->load->view('header'); ?>

  	<div class="container theme-showcase" role="main">

        <?php if(!empty($message['message'])): ?>

            <div class="alert alert-<?=$message['class']?>"><?=$message['message']?></div>

        <?php endif; ?>

        <?php $this->load->view($view); ?>

  	</div> <!-- /container -->

    <?php $this->load->view('footer'); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="javascript/script.js"></script>
</body>
</html>