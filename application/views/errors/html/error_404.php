<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); require_once BASEPATH . '/helpers/url_helper.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cleanpro - Beta Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/skin/default_skin/css/theme.css');?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico');?>">
</head>
<body class="error-page alt sb-l-c sb-r-c">
    <div id="main">
        <section id="content_wrapper">
            <section id="content" class="pn animated fadeIn">
                <div class="center-block mt50 mw800">
						<a href="dashboard.html" title="Return to Dashboard">
							<img src="<?php echo base_url('assets/img/logo.png');?>" title="CleanProCSS Logo" class="center-block img-responsive" style="max-width: 280px;">
						</a>
                    <h1 class="error-title"> 404! </h1>
                    <h2 class="error-subtitle">Page Not Found.</h2>
                </div>
            </section>
        </section>
    </div>
    <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-1.11.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery_ui/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/utility/utility.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
</body>
</html>