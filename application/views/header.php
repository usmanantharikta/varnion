<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Varnion Passport </title>
    <!-- Material Design fonts -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    <!-- MATERIAL INPORT-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap-material-design.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/ripples.min.css')?>" rel="stylesheet">
    <!-- Dropdown.js -->
    <link href="<?php echo base_url('assets/bootstrap/css/jquery.dropdown.css')?>" rel="stylesheet">

    <!--<script src="<?php echo base_url('//code.jquery.com/jquery-1.10.2.min.js')?>"></script>-->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
<body>
  <!-- Navigation -->
  <nav class="navbar  navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Admin View</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2" menu>
    <ul id="menu" class="nav navbar-nav">
      <li><a href="<?php echo site_url('control_crud/add') ?>">Employ Data</a></li>
      <li><a href="<?php echo site_url('control_crud/addpoint_view') ?>">Poin Data</a></li>
      <li><a href="<?php echo site_url('control_crud/addredeem_view') ?>">Redeem Data</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
          <li class="divider"></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
    </ul>
  </div>
</div>
  </nav>
