<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title><?php echo $header; ?></title>
	
    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/skin/default_skin/css/theme.css'); ?>">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin-tools/admin-forms/css/admin-forms.css'); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

		<!-- Start: Content-Wrapper -->
		<section id="content_wrapper">
	
			<!-- begin canvas animation bg -->
			<div id="canvas-wrapper">
				<canvas id="demo-canvas"></canvas>
			</div>

			<!-- Begin: Content -->
			<section id="content">
				<div class="admin-form theme-info mw500" id="login">

					<!-- Login Logo -->
					<div class="row table-layout">
						<a href="dashboard.html" title="Return to Dashboard">
							<img src="<?php echo base_url('assets/img/logo.png'); ?>" title="CleanProCSS Logo" class="center-block img-responsive" style="max-width: 280px;">
						</a>
					</div>

					<!-- Login Panel/Form -->
					<?php echo $flash_message; ?>
					<div class="panel mt30 mb25">
						<?php $form_attributes = array('method' => 'POST','id' => 'login-form'); echo form_open('login/validate',$form_attributes); ?>
							<div class="panel-body bg-light p25 pb15">
	
								<!-- Username Input -->
								<div class="section">
									<label for="username" class="field-label text-muted fs18 mb10">Username</label>
									<label for="username" class="field prepend-icon">
										<input type="text" name="username" id="username" class="gui-input" placeholder="Enter username">
										<label for="username" class="field-icon">
											<i class="fa fa-user"></i>
										</label>
									</label>
								</div>
								
								<!-- Password Input -->
								<div class="section">
									<label for="username" class="field-label text-muted fs18 mb10">Password</label>
									<label for="password" class="field prepend-icon">
										<input type="password" name="password" id="password" class="gui-input" placeholder="Enter password">
										<label for="password" class="field-icon">
											<i class="fa fa-lock"></i>
										</label>
									</label>
								</div>
							</div>
							<div class="panel-footer clearfix">
								<button type="submit" class="button btn-primary mr10 pull-right">Sign In</button>
							</div>
						</form>
					</div>
					<h6 align="center">version <?php echo $version; ?></h6>
				</div>
			</section>
			<!-- End: Content -->

		</section>
		<!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-1.11.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery_ui/jquery-ui.min.js'); ?>"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/pages/login/EasePack.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/pages/login/rAF.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/pages/login/TweenLite.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/pages/login/login.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin-tools/admin-forms/js/jquery.validate.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin-tools/admin-forms/js/additional-methods.min.js'); ?>"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/utility/utility.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/demo.js'); ?>"></script>

    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {
            /* @custom validation method (smartCaptcha) 
            ------------------------------------------------------------------ */
            $.validator.methods.smartCaptcha = function(value, element, param) {
				return value == param;
            };

            $( "#login-form" ).validate({
				/* @validation states + elements 
				------------------------------------------- */
				errorClass: "state-error",
				validClass: "state-success",
				errorElement: "em",

				/* @validation rules 
				------------------------------------------ */
                    rules: {
						username: {
							required: true
						},
						password: {
							required: true
						}                                                                                                          
                    },
                    
                    /* @validation error messages 
                    ---------------------------------------------- */
                    messages:{
						username: {
							required: 'You must provide a valid username'
						},
						password: {
							required: 'You must provide a valid password'
						}                                                                                         
                    },

				/* @validation highlighting + error placement  
				---------------------------------------------------- */ 
				highlight: function(element, errorClass, validClass) {
					$(element).closest('.field').addClass(errorClass).removeClass(validClass);
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).closest('.field').removeClass(errorClass).addClass(validClass);
				},
				errorPlacement: function(error, element) {
					if (element.is(":radio") || element.is(":checkbox")) {
						element.closest('.option-group').after(error);
					} else {
						error.insertAfter(element.parent());
					}
				}
            });
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });
        });
    </script>
    <!-- END: PAGE SCRIPTS -->
</body>
</html>