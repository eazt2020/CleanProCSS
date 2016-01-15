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
						<label for="topbar-multiple" class="control-label pr10 fs11 text-muted">ScreenID : <?php echo $faqscrid ?></label>
					</div>
				</div>
			</header>
			<!-- End: Topbar -->
			
			<!-- Begin: Content -->
			<section id="content" class="animated fadeIn">
				<div class="col-md-6">
					<span class="panel-icon"><i class="glyphicons glyphicons-keys"></i></span><span class="panel-title"><b><?php echo strtoupper($usrole01); ?></b></span>
				</div>
				<div class="col-md-6">
						<a href="<?php echo base_url('faq/view?id='.$faqscrid);?>" target="_blank"><span class="glyphicons glyphicons-circle_question_mark pull-right"></span></a>
				</div>
				<br>
				<?php echo $flashmsg ?>
				<br>
				<div class="col-md-12">
				<table class="table table-bordered">
					<tr>
						<td align="center">Screen Name</td>
						<td width="100" align="center">View</td>
						<td width="100" align="center">Create/Update</td>
						<td width="100" align="center">Delete</td>
					</tr>
					<?php $calt = 0; foreach($rolpvl00 as $rolpvl01) {
						echo '<tr>';
						echo '<td align="center">'.Screen Name.'</td>';
						echo '<td width="50" align="center">'.View.'</td>';
						echo '<td width="50" align="center">'.Create/Update.'</td>';
						echo '<td width="50" align="center">'.Delete.'</td>';
						echo '</tr>';
					}?>
				</table>
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
	
			// Init Theme Core    
			Demo.init();
	
			// Init tray navigation smooth scroll
			$('.tray-nav a').smoothScroll({
				offset: -145
			});
	
			// Custom tray navigation animation
			setTimeout(function() {
				$('.custom-nav-animation li').each(function(i, e) {
					var This = $(this);
					var timer = setTimeout(function() {
						This.addClass('animated zoomIn');
					}, 100 * i);
				});
			}, 600);
	
		});
	</script>
	<!-- END: PAGE SCRIPTS -->
</body>
</html>