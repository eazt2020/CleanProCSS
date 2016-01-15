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
					<span class="panel-icon"><i class="glyphicons glyphicons-comments"></i></span><span class="panel-title"><b><?php echo strtoupper($notify01); ?></b></span>
				</div>
				<div class="col-md-6">
						<a href="<?php echo base_url('faq/view?id='.$faqscrid);?>" target="_blank"><span class="glyphicons glyphicons-circle_question_mark pull-right"></span></a>
				</div>
				<br>
				<?php echo $flashmsg ?>
				<br>
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
								<li>
									<a href="#tab2_3" data-toggle="tab">General</a>
								</li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="tab-content pn br-n">
								<div id="tab2_1" class="tab-pane active">
									<div class="row">
										<div class="col-md-12">
											<table class="table table-condensed">
												<tbody>
												<?php $calt = 0; foreach($notify00 as $row00) {
													$calt++;
													echo '<tr>';
													echo '<td>Notification ID</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.$row00['id'].'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Notification Title</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.strtoupper($row00['name']).'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Alert Type</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td><span class="tm-tag tm-tag-'.$row00['sevName'].'">'.strtoupper($row00['sevName']).'</span></td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Expiry Date</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.date('d/m/Y', $row00['valid']).'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Notification Content</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.base64_decode($row00['description']).'</td>';
													echo '</tr>';
												}?>
												</tbody>
											</table>
										</div>
									</div>
									<br>
									<div class="row">
										<div id="animation-switcher" class="col-md-2">
											<button type="button" class="btn btn-sm dark btn-alert btn-block" data-effect="mfp-zoomIn">Update Details</button>
										</div>
										<div class="col-md-2">
											<button type="submit" class="btn btn-sm dark btn-danger btn-block" form="rmnotify" value="Submit">Delete Notification</button>
											<form name="rmnotify" id="rmnotify" action="<?php echo base_url('notifications/remove'); ?>" method="POST">
												<input name="checkList[]" type="hidden" class="textbox" id="checkbox" value="<?php echo $row00['id']; ?>">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row table-layout" id="modal-content">
					<input class="holder-style p15 holder-active mb20" type="hidden" href="#modal-text">
				</div>
				<div class="panel panel-primary mfp-with-anim mfp-hide mw800 center-block" id="modal-text">
					<div class="panel-heading">
						<span class="panel-icon"><i class="glyphicons glyphicons-comments"></i></span>
						<span class="panel-title">Update Notification Details</span>
					</div>
					<div class="panel-body">
						<div class="admin-form">
							<?php $form_attributes = array('method' => 'POST','id' => 'notify-form'); echo form_open('notifications/validate?id='.$row00['id'],$form_attributes); ?>
								<div class="row">
									<div class="col-md-4">
										<div class="section">
											<label class="field prepend-icon">
												<input type="text" name="name" id="name" class="gui-input" placeholder="Notification Title" value="<?php echo $row00['name'];?>">
												<label for="name" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="sev" class="field select">
												<select id="sev" name="sev">
													<option value="">Alert Type*</option>
													<?php $calt00 = 0; foreach($severity as $severity) {
															$calt00++;
															if ($severity['id'] == $row00['sev']){
																echo '<option selected value="'.$severity['id'].'">'.ucwords($severity['name']).'</option>';
															}
															else{
																echo '<option value="'.$severity['id'].'">'.ucwords($severity['name']).'</option>';
															}
													}?>
												</select>
												<i class="arrow"></i>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
                                            <div id="datetimepicker3">
												<label class="field prepend-icon">
													<input type="text" name="valid" id="valid" class="form-control" style="max-width: 250px;" placeholder="Expiry Date">
													<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
												</label>
                                            </div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="section">
											<label class="field prepend-icon">
												<textarea class="form-control textarea-grow" name="description" id="description" rows="5" placeholder="Notification Content"><?php echo base64_decode($row00['description']);?></textarea>
												<label for="description" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<button type="submit" class="btn btn-sm dark btn-dark btn-block" form="notify-form" value="Submit">Submit</button>
									</div>
								</div>
							</form>
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
	
	
    <!-- Datatables -->
    <script type="text/javascript" src="<?php echo base_url('vendor/plugins/datatables/media/js/jquery.dataTables.js'); ?>"></script>

    <!-- Datatables Tabletools addon -->
    <script type="text/javascript" src="<?php echo base_url('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js'); ?>"></script>
	
    <!-- Datatables Bootstrap Modifications  -->
    <script type="text/javascript" src="<?php echo base_url('vendor/plugins/datatables/media/js/dataTables.bootstrap.js'); ?>"></script>
	
	<!-- Modal Popup -->
	<script type="text/javascript" src="<?php echo base_url('vendor/plugins/magnific/jquery.magnific-popup.js'); ?>"></script>

	<!-- Validation -->
	<script type="text/javascript" src="<?php echo base_url('assets/admin-tools/admin-forms/js/jquery.validate.min.js'); ?>"></script>
	
	<!-- Date Time Picker -->
	<script type="text/javascript" src="<?php echo base_url('vendor/plugins/moment/moment.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('vendor/plugins/globalize/src/core.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('vendor/plugins/daterange/daterangepicker.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js');?>"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/utility/utility.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();
			
            // daterange plugin options
            var rangeOptions = {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                startDate: moment().subtract('days', 29),
                endDate: moment()
            }


            // Init datetimepicker - inline + range detection
            $('#datetimepicker3').datetimepicker({
				defaultDate: '<?php echo date('d/m/Y', $row00['valid']); ?>',
				format:'DD/MM/YYYY',
                inline: true
            });

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


           // Init Datatables with Tabletools Addon    
            $('#datatable2').dataTable({
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [-1]
                }],
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "",
                        "sNext": ""
                    }
                },
                "iDisplayLength": 5,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
                "oTableTools": {
                    "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
                }
            });

            // MISC DATATABLE HELPER FUNCTIONS

            // Add Placeholder text to datatables filter bar
            $('.dataTables_filter input').attr("placeholder", "Search...");
			
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
			
			$.validator.addMethod("defaultvalue", function(value, element, arg){
				return arg != value;
			}, "Value must not equal arg.");
			
			$( "#notify-form" ).validate({
				/* @validation states + elements 
				------------------------------------------- */
				errorClass: "state-error",
				validClass: "state-success",
				errorElement: "em",
				
				/* @validation rules 
				------------------------------------------ */
				rules: {
					name:{
						required: true
					},
					sev:{
						defaultvalue: "default"
					},
					valid:{
						required: true,
					},
					description:{
						required: true
					}
				},
			
				/* @validation error messages 
				---------------------------------------------- */
				messages:{
					name:{
						required: 'This field is mandatory'
					},
					sev:{
						defaultvalue: 'Please choose an alert type'
					},
					valid:{
						required: 'This field is mandatory'
					},
					description:{
						required: 'This field is mandatory'
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
					}
					else{
						error.insertAfter(element.parent());
					}
				}
			});
        });
    </script>
    <!-- END: PAGE SCRIPTS -->
</body>
</html>