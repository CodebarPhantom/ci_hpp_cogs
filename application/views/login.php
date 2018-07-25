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
  <link href="<?php echo base_url();?>assets/gentelella/css/icheck/flat/green.css" rel="stylesheet">


  <script src="<?php echo base_url();?>assets/gentelella/js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
	
    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form action="<?php echo base_url('auth/login');?>" method="post">		  
            <h1>Login<h1>
            <div>
			 <?php echo form_input(array('name'=>'username','placeholder'=>'Username','class'=>'form-control','required'=>'required')); ?>
     
             
            </div>
            <div>
			 <?php echo form_password(array('name'=>'password','placeholder'=>'Password','class'=>'form-control','required'=>'required')); ?>
              
            </div>
            <div>
			<button class="btn btn-success submit">Login</button>
  
              
            </div>
            <div class="clearfix"></div>
            <div class="separator">


              <div class="clearfix"></div>
              <br />
              
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
      
    </div>
  </div>

</body>

</html>
