<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Saung Tenda</title>
  <link rel="icon" href="<?php echo base_url('./assets/gentelella/ayam.png')?>"/>

  <!-- Bootstrap core CSS -->

  <link href="<?php echo base_url();?>assets/gentelella/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url();?>assets/gentelella/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/gentelella/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url();?>assets/gentelella/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/gentelella/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="<?php echo base_url();?>assets/gentelella/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/gentelella/css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="<?php echo base_url();?>assets/gentelella/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/gentelella/js/nprogress.js"></script>
  
  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url();?>assets/gentelella/css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/gentelella/css/icheck/flat/green.css" rel="stylesheet">

  <link href="<?php echo base_url();?>assets/gentelella/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/gentelella/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/gentelella/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/gentelella/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/gentelella/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
 
  <!-- select2 -->
  <link href="<?php echo base_url();?>assets/gentelella/css/select/select2.min.css" rel="stylesheet">
  <!-- switchery -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/gentelella/css/switchery/switchery.min.css" />

  <script src="<?php echo base_url();?>assets/gentelella/js/jquery.min.js"></script>
  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		<link href="<?php echo base_url('assets/sweetalert/dist/sweetalert2.min.css')?>" rel="stylesheet">
	
	<script src="<?php echo base_url('assets/sweetalert/dist/sweetalert2.min.js');?>"></script>
		
	
		
		

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><img src="<?php echo base_url('./assets/gentelella/ayam.png')?>" alt="..." width="50px" height="50px"> <span>Saung Tenda</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
		  <?php foreach($queries as $look) { ?>
                        						
            <div class="profile_pic">
              <img src="<?php echo base_url('./assets/image/foto_user/cashier_icon.png')?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span><?php echo $look->level ?></span>
              <h2><?php echo $look->nama_user ?></h2>
			  
            </div>
			
			<?php } ?>
          </div>
          <!-- /menu prile quick info -->

          <br />