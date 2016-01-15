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
				<div class="col-md-12">
					<span class="panel-icon"><i class="glyphicons glyphicons-cogwheels"></i></span><span class="panel-title"><b>System Information</b></span>
				</div>
				<br>
				<?php echo $flashmsg ?>
				<br>
				<div class="panel" id="spy7">
					<div class="panel-body pn">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td width="200">Installed Build ID</td>
									<td><?php echo $builid ?></td>
								</tr>
								<tr>
									<td>Installed Core</td>
									<td><?php echo $core00 ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel" id="spy7">
					<div class="panel-body pn">
						<table class="table table-bordered">
							<tr>
								<th width="50">#</th>
								<th>Installed Features / Bug Fixes</th>
							</tr>
							<?php $calt = 0; foreach($addon0 as $addon1) {
								$calt++;
								echo '<tr>';
								echo '<td>'.$calt.'</td>';
								echo '<td>'.$addon1['description'].'</td>';
								echo '</tr>';
							}?>
						</table>
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