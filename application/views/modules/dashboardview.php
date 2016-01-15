<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- Start: Topbar -->
            <header id="topbar">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                       <?php echo $breadcrb ?>
                    </ol>
                </div>
                <div class="topbar-right">
                    <div class="ib topbar-dropdown">
                        <label for="topbar-multiple" class="control-label pr10 fs11 text-muted">ScreenID : <?php echo $screenid ?></label>
            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">
				<div class="col-md-6">
					<span class="panel-icon"><i class="glyphicons glyphicons-home"></i></span><span class="panel-title"><b>Dashboard</b></span>
				</div>
				<div class="col-md-6">
						<a href="<?php echo base_url('faq/view?id='.$faqscrid);?>" target="_blank"><span class="glyphicons glyphicons-circle_question_mark pull-right"></span></a>
				</div>
				<br>
				<?php echo $flashmsg ?>
				<br>
				
				<!-- Dashboard Tiles -->
				<div class="row">
					<div class="col-sm-3 col-md-2">
						<div class="panel panel-tile text-center  br-a br-light">
							<div class="panel-body bg-light">
								<i class="glyphicons glyphicons-building text-muted fs70 mt10"></i>
								<h1 class="fs35 mbn"><?php echo $compan00; ?></h1>
								<h6 class="text-system">REGISTERED COMPANIES IN SYSTEM</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-2">
						<div class="panel panel-tile text-center">
							<div class="panel-body bg-primary light">
								<i class="glyphicons glyphicons-bank text-muted fs70 mt10"></i>
								<h1 class="fs35 mbn"><?php echo $outlet00; ?></h1>
								<h6 class="text-white">REGISTERED OUTLETS IN SYSTEM</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-2">
						<div class="panel panel-tile text-center">
							<div class="panel-body bg-alert light">
								<i class="glyphicons glyphicons-imac text-muted fs70 mt10"></i>
								<h1 class="fs35 mbn"><?php echo $machin00; ?></h1>
								<h6 class="text-white">REGISTERED MACHINES IN SYSTEM</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-2">
						<div class="panel panel-tile text-center">
							<div class="panel-body bg-info light">
								<i class="glyphicons glyphicons-sampler text-muted fs70 mt10"></i>
								<h1 class="fs35 mbn"><?php echo $ticket00; ?></h1>
								<h6 class="text-white">ISSUED TICKETS IN THE SYSTEM</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-2">
						<div class="panel panel-tile text-center">
							<div class="panel-body bg-danger light">
								<i class="glyphicons glyphicons-circle_exclamation_mark text-muted fs70 mt10"></i>
								<h1 class="fs35 mbn"><?php echo $ticket01; ?></h1>
								<h6 class="text-white">ISSUED TICKETS ARE STILL OPEN</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-2">
						<div class="panel panel-tile text-center">
							<div class="panel-body bg-warning light">
								<i class="glyphicon glyphicon-usd text-muted fs70 mt10"></i>
								<h1 class="fs35 mbn"><?php echo $ticket02; ?></h1>
								<h6 class="text-white">SUM OF REFUND FOR REMAINING OPEN TICKETS</h6>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Notifications -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel-group accordion" id="accordion">
							<div class="panel">
								<div class="panel-heading">
									<a class="accordion-toggle accordion-icon link-unstyled" data-toggle="collapse" data-parent="#accordion" href="#accord1">Notifications</a>
								</div>
								<div id="accord1" class="panel-collapse collapse in" style="height: auto;">
									<div class="panel-body">
										<?php $calt = 0; foreach($notify00 as $notify01) {
											$calt++;
											echo '<div class="panel panel-'.$notify01['sevName'].'"><div class="panel-heading">';
											echo '<span class="panel-title">'.$notify01['name'].'</span><div class="widget-menu pull-right">';
											echo '</div></div>';
											echo '<div class="panel-body fill border"><p>'.base64_decode($notify01['description']).'</p>';
											echo '</div></div>';
										}?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

            </section>
            <!-- End: Content -->

        </section>
    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-1.11.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery_ui/jquery-ui.min.js'); ?>"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/utility/utility.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            "use strict";

            // Init Theme Core    
            Core.init();

        });
    </script>
    <!-- END: PAGE SCRIPTS -->

</body>

</html>