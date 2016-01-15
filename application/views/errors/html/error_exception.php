<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
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
					<h1 class="error-title"> 5002! </h1>
                    <h2 class="error-subtitle"> An uncaught Exception was encountered </h2>
                </div>
                <div class="mid-section">
                    <div class="mid-content clearfix">
						<p>Type: <?php echo get_class($exception); ?></p>
						<p>Message: <?php echo $message; ?></p>
						<p>Filename: <?php echo $exception->getFile(); ?></p>
						<p>Line Number: <?php echo $exception->getLine(); ?></p>
						<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
							<p>Backtrace:</p>
							<?php foreach ($exception->getTrace() as $error): ?>
								<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
									<p style="margin-left:10px">
									File: <?php echo $error['file']; ?><br />
									Line: <?php echo $error['line']; ?><br />
									Function: <?php echo $error['function']; ?>
									</p>
								<?php endif ?>
							<?php endforeach ?>
						<?php endif ?>
                    </div>
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