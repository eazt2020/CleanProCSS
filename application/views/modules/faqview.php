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
					</div>
				</div>
			</header>
			<!-- End: Topbar -->
			
			<!-- Begin: Content -->
			<section id="content" class="animated fadeIn">
				<div class="col-md-6">
					<span class="panel-icon"><i class="glyphicons glyphicons-circle_question_mark"></i></span><span class="panel-title"><b>FAQ Screen Settings</b></span>
				</div>
				<div class="col-md-6">
						<a href="<?php echo base_url('faq/view?id='.$faqscrid);?>" target="_blank"><span class="glyphicons glyphicons-circle_question_mark pull-right"></span></a>
				</div>
				<br>
				<?php echo $flashmsg ?>
				<br>
				<div class="col-md-12">
					<div class="panel panel-visible" id="spy2">
						<div class="panel-body pn">
							<table class="table table-bordered" cellspacing="0" width="100%">
								<tbody>
									<tr>
										<td width="100px" align="center">ID</td>
										<td>FAQ Screen Name</td>
									</tr>
									<?php $calt = 0; foreach($faqscr00 as $faqscr01) {
										$calt++;
										echo '<tr>';
										echo '<td align="center">'.$faqscr01['id'].'</td>';
										echo '<td><a href="'.base_url('faq/details?id='.$faqscr01['id']).'">'.strtoupper($faqscr01['name']).'</a></td>';
										echo '</tr>';
									}?>
								</tbody>
							</table>
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