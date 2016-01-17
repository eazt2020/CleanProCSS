<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
	<title><?php echo $header00; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/skin/default_skin/css/theme.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/icomoon/icomoon.css');?>">

	
	<!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/plugins/datatables/media/css/dataTables.bootstrap.css'); ?>">
	
    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin-tools/admin-forms/css/admin-forms.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin-tools/admin-plugins/admin-modal/adminmodal.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/plugins/magnific/magnific-popup.css');?>">

	<!--Date Time Picker CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/plugins/datepicker/css/bootstrap-datetimepicker.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/plugins/daterange/daterangepicker.css');?>">

	<!--select2 CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/plugins/select2/css/core.css');?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
	<script language="JavaScript" src="<?php echo base_url("assets/js/chkall.js");?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body class="blank-page">

    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top bg-primary">
            <div class="navbar-branding bg-primary">
                <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>"><img src="<?php echo base_url('assets/img/logosmall.png'); ?>" title="CleanProCSS Logo" class="center-block img-responsive" style="max-width: 150px;"></a>
                <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
                <ul class="nav navbar-nav pull-right hidden">
                    <li>
                        <a href="#" class="sidebar-menu-toggle">
                            <span class="octicon octicon-ruby fs20 mr10 pull-right "></span>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <span id="toggle_sidemenu_l2" class="glyphicon glyphicon-log-in fa-flip-horizontal hidden"></span>
                </li>
                <li class="hidden-xs">
                    <img src="<?php echo base_url('assets/img/demoset.png'); ?>" title="CleanProCSS Logo" class="center-block img-responsive" style="max-width: 250px;">
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <span class="mw30 br64 mr15 glyphicon glyphicon-user"></span>
                        <span><?php echo ucwords($this->session->userdata('fullname')); ?></span>
                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                        <li class="br-t of-h">
                            <a href="<?php echo base_url('login/logout'); ?>" class="fw600 p12 animated animated-short fadeInDown">
                                <span class="fa fa-power-off pr5"></span> Logout </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- End: Header -->