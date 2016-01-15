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
					<span class="panel-icon"><i class="glyphicons glyphicons-circle_question_mark"></i></span><span class="panel-title"><b>FAQ Screen Settings</b></span>
				</div>
				<div class="col-md-6">
						<a href="<?php echo base_url('faq/view?id='.$faqscrid);?>" target="_blank"><span class="glyphicons glyphicons-circle_question_mark pull-right"></span></a>
				</div>
				<br>
				<?php echo $flashmsg ?>
				<br>
				<div class="col-md-12">
					<form name="editfaq" id="editfaq" action="<?php echo base_url('faq/validate?id='.$_GET['id']); ?>" method="POST">
						<?php $calt = 0; foreach($faqscr00 as $faqscr01) {
						echo '<input type="hidden" id="id" name="id" value="'.$faqscr01['id'].'">';
						echo '<input type="hidden" id="name" name="name" value="'.$faqscr01['name'].'">';
						echo '<textarea name="ckeditor1" id="ckeditor1" name="ckeditor1" rows="12">'.base64_decode($faqscr01['content']).'</textarea>';
						}?>
					</form>
					<button type="submit" class="btn btn-alert br2 btn-sm btn-block" form="editfaq" value="Submit">
						<i class="glyphicons glyphicons-circle_minus hidden-lg"></i>
						<span class="hidden-xs">Apply Changes</span>
					</button>
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
	
	<!-- Ckeditor JS -->
	<script type="text/javascript" src="<?php echo base_url('vendor/editors/ckeditor/ckeditor.js'); ?>"></script>

	
	<!-- Theme Javascript -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/utility/utility.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			"use strict";
	
			// Init Theme Core    
			Core.init();
	
			// Init tray navigation smooth scroll
			$('.tray-nav a').smoothScroll({
				offset: -145
			});
			
            // Turn off automatic editor initilization.
            // Used to prevent conflictions with multiple text 
            // editors being displayed on the same page.
            CKEDITOR.disableAutoInline = true;

            // Init Ckeditor
            CKEDITOR.replace('ckeditor1', {
                height: 210,
                on: {
                    instanceReady: function(evt) {
                        $('.cke').addClass('admin-skin cke-hide-bottom');
                    }
                },
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