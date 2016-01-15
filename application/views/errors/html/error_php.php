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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/plugins/magnific/magnific-popup.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin-tools/admin-plugins/admin-modal/adminmodal.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin-tools/admin-plugins/admin-panels/adminpanels.css');?>">

    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico');?>">
	
</head>
<body class="error-page alt sb-l-c sb-r-c admin-modals-page">
    <div id="main">
        <section id="content_wrapper">
            <section id="content" class="pn animated fadeIn">
                <div class="center-block mt50 mw800">
						<a href="dashboard.html" title="Return to Dashboard">
							<img src="<?php echo base_url('assets/img/logo.png');?>" title="CleanProCSS Logo" class="center-block img-responsive" style="max-width: 280px;">
						</a>
                    <h1 class="error-title"> 5004! </h1>
                    <h2 class="error-subtitle"> A PHP Error was encountered </h2>
                </div>
            </section>
			<div class="row table-layout" id="modal-content">
				<input class="holder-style p15 holder-active mb20" type="hidden" href="#modal-text">
			</div>
			<div id="animation-switcher" class="ph20">
				<button type="button" class="btn btn-rounded btn-alert btn-block mw800 center-block" data-effect="mfp-with-fade">Show Error Output Details</button>
			</div>
			<div class="panel panel-alert mfp-with-anim mfp-hide mw800 center-block" id="modal-text">
				<div class="panel-heading">
					<span class="panel-icon"><i class="fa fa-exclamation-circle"></i></span>
					<span class="panel-title"> Error Details</span>
				</div>
				<div class="panel-body">
					<p>Severity: <?php echo $severity; ?></p>
					<p>Message:  <?php echo $message; ?></p>
					<p>Filename: <?php echo $filepath; ?></p>
					<p>Line Number: <?php echo $line; ?></p>
					<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
						<p>Backtrace:</p>
						<?php foreach (debug_backtrace() as $error): ?>
							<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
								<p style="margin-left:10px">
								File: <?php echo $error['file'] ?><br />
								Line: <?php echo $error['line'] ?><br />
								Function: <?php echo $error['function'] ?>
								</p>
							<?php endif ?>
						<?php endforeach ?>
					<?php endif ?>
				</div>
			</div>
        </section>
    </div>
	<style>
		html,
		body.admin-modals-page {
			margin-right: 0 !important;
			overflow: hidden !important;
		}
    }
	</style>
    <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-1.11.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery_ui/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('vendor/plugins/magnific/jquery.magnific-popup.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            var modalContent = $('#modal-content');

            modalContent.on('click', '.holder-style', function(e) {
                e.preventDefault();

                modalContent.find('.holder-style').removeClass('holder-active');
                $(this).addClass('holder-active');
            });

            function findActive() {
                var activeModal = modalContent.find('.holder-active').attr('href');
                return activeModal;
            };

            // Form Skin Switcher
            $('#animation-switcher button').on('click', function() {
                $('#animation-switcher').find('button').removeClass('active-animation');
                $(this).addClass('active-animation item-checked');

                // Inline Admin-Form example 
                $.magnificPopup.open({
                    removalDelay: 500, //delay removal by X to allow out-animation,
                    items: {
                        src: findActive()
                    },
                    // overflowY: 'hidden', // 
                    callbacks: {
                        beforeOpen: function(e) {
                            var Animation = $("#animation-switcher").find('.active-animation').attr('data-effect');
                            this.st.mainClass = Animation;
                        }
                    },
                    midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
                });

            });


        });
    </script>
    <!-- END: PAGE SCRIPTS -->
</body>
</html>