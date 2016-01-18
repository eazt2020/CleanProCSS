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
            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">
				<div class="col-md-6">
					<span class="panel-icon"><i class="glyphicons glyphicons-sampler"></i></span><span class="panel-title"><b>Ticket ID #<?php echo strtoupper($customn); ?></b></span>
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
												<?php $calt = 0; foreach($tickets as $tick00) {
													$calt++;
													echo '<tr>';
													echo '<td>Ticket ID</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.$tick00['id'].'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Creation Date</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.date('d/m/Y',$tick00['crDate']).'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Company Name</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td><a href="'.base_url('companies/details?id='.$tick00['compId']).'">'.strtoupper($tick00['compName']).'</a></td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Outlet Name</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td><a href="'.base_url('outlets/details?id='.$tick00['outletId']).'">'.strtoupper($tick00['outletName']).'</a></td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Machine Name</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td><a href="'.base_url('machines/details?id='.$tick00['machId']).'">'.strtoupper($tick00['machName']).'</a></td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Customer Name</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.strtoupper($tick00['name']).'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Contact Number</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.$tick00['contact'].'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Call Type</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.strtoupper($tick00['callTypeName']).'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Error Code</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.strtoupper($tick00['errorName']).'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Bank Account Number</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.$tick00['bankAc'].'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Refund Amount (RM)</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.$tick00['amount'].'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Refunded</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>';
													if ($tick00['refund'] == 1){
														echo 'YES <span class="imoon imoon-checkmark-circle"></span>';
													}
													else{
														echo 'NO <span class="imoon imoon-cancel-circle"></span>';
													}
													echo '</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Status</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.strtoupper($tick00['statusName']).'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Remarks</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.$tick00['remark'].'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>References</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.$tick00['ref'].'</td>';
													echo '</tr>';
												}?>
												</tbody>
											</table>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-2">
											<div id="animation-switcher">
												<button type="button" class="btn btn-alert br2 btn-sm btn-block" data-effect="mfp-zoomIn">
													<i class="glyphicons glyphicons-circle_plus hidden-lg"></i>
													<span class="hidden-xs">Update ticket details</span>
												</button>
											</div>
										</div>
										<div class="col-md-2">
											<button type="submit" class="btn btn-danger br2 btn-sm btn-block" form="rmticket" value="Submit">
												<i class="glyphicons glyphicons-circle_minus hidden-lg"></i>
												<span class="hidden-xs">Delete ticket</span>
											</button>
											<form name="rmticket" id="rmticket" action="<?php echo base_url('tickets/remove'); ?>" method="POST">
												<input name="checkList[]" type="hidden" class="textbox" id="checkbox" value="<?php echo $tick00['id']; ?>">
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
						<span class="panel-icon"><i class="glyphicons glyphicons-sampler"></i></span>
						<span class="panel-title">Update Ticket Form</span>
					</div>
					<div class="panel-body">
						<div class="admin-form">
							<?php $form_attributes = array('method' => 'POST','id' => 'ticket-form'); echo form_open('tickets/validate?id='.$_GET['id'],$form_attributes); ?>
								<input type="hidden" name="compId" id="compId" value="<?php echo $tick00['compId']; ?>">
								<input type="hidden" name="outletId" id="outletId" value="<?php echo $tick00['outletId']; ?>">
								<input type="hidden" name="machId" id="machId" value="<?php echo $tick00['machId']; ?>">
								<input type="hidden" name="crDate" id="crDate" value="<?php echo $tick00['crDate']; ?>">
								<div class="row">
									<div class="col-md-12">
										<div class="section">
											<label for="error" class="field select">
												<select id="error" name="error">
													<?php $calt00 = 0; foreach($errorcode as $errcod00) {
														$calt00++;
														echo '<option value="'.$errcod00['id'].'"';
														if ($tick00['error'] == $errcod00['id']){
															echo ' selected';
														}
														echo '>#'.$errcod00['id'].'| '.ucwords($errcod00['name']).'</option>';
													}?>
												</select>
												<i class="arrow"></i>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="section">
											<label for="name" class="field prepend-icon">
												<input type="text" name="name" id="name" class="gui-input" placeholder="Customer Name" value="<?php echo $tick00['name'];?>">
												<label for="name" class="field-icon"><i class="fa fa-user"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="contact" class="field prepend-icon">
												<input type="text" name="contact" id="contact" class="gui-input" placeholder="Customer Contact Number" value="<?php echo $tick00['contact'];?>">
												<label for="name" class="field-icon"><i class="fa fa-phone-square"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="callType" class="field select">
												<select id="callType" name="callType">
													<?php $calt00 = 0; foreach($calltype0 as $calltype1) {
														$calt00++;
														echo '<option value="'.$calltype1['id'].'"';
														if ($tick00['callType'] == $calltype1['id']){
															echo ' selected';
														}
														echo '>#'.$calltype1['id'].'| '.ucwords($calltype1['name']).'</option>';
													}?>
												</select>
												<i class="arrow"></i>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="section">
											<label for="bankAc" class="field prepend-icon">
												<input type="text" name="bankAc" id="bankAc" class="gui-input" placeholder="Bank Account Number" value="<?php echo $tick00['bankAc'];?>">
												<label for="name" class="field-icon"><i class="fa fa-credit-card"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="amount" class="field prepend-icon">
												<input type="text" name="amount" id="amount" class="gui-input" placeholder="Refund Amount (RM)" value="<?php echo $tick00['amount'];?>">
												<label for="name" class="field-icon"><i class="fa fa-dollar"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="status" class="field select">
												<select name="status" id="status">
													<?php $calt00 = 0; foreach($ticstatus as $ticstat00) {
														$calt00++;
														echo '<option value="'.$ticstat00['id'].'"';
														if ($tick00['status'] == $ticstat00['id']){
															echo ' selected';
														}
														echo '>#'.$ticstat00['id'].'| '.strtoupper($ticstat00['name']).'</option>';
													}?>
												</select>
												<i class="arrow"></i>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="section">
											<label for="pic" class="field prepend-icon">
												<input type="text" name="pic" id="pic" class="gui-input" placeholder="PIC" value="<?php echo $tick00['pic'];?>">
												<label for="pic" class="field-icon"><i class="fa fa-user"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<div class="checkbox-custom fill checkbox-alert mb5">
												<input type="checkbox" name="refund" id="refund" <?php if ($tick00['refund'] == 1){echo 'checked=""';}?> value="1">
												<label for="refund">Already refunded?</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="section">
											<textarea class="form-control textarea-grow"name="remark" id="remark" rows="5" placeholder="(Optional) Remark..."><?php echo $tick00['remark'];?></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="section">
										<div class="section">
											<textarea class="form-control textarea-grow" name="ref" id="ref" rows="5" placeholder="(Optional) Reference..."><?php echo $tick00['ref'];?></textarea>
										</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<button type="submit" class="btn btn-sm dark btn-alert btn-block active" form="ticket-form" value="Submit">Submit</button>
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
	
	<script type="text/javascript" src="<?php echo base_url('vendor/plugins/moment/moment.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('vendor/plugins/globalize/src/core.js');?>"></script>
	
	<!-- Theme Javascript -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/utility/utility.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			"use strict";
	
			// Init Theme Core    
			Core.init();
			
			$("#compId").change(function() {
				$("#outletId").load("<?php echo base_url('tickets/outletdropdown'); ?>?choice=" + jQuery("#compId").val());
				$("#machId").load("<?php echo base_url('tickets/outletdropdown'); ?>?choice=0");
			});
			
			$("#outletId").change(function() {
				$("#machId").load("<?php echo base_url('tickets/machinedropdown'); ?>?choice=" + jQuery("#outletId").val());
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
			
			$.validator.addMethod("defaultvalue", function(value, element, arg){
				return arg != value;
			}, "Value must not equal arg.");
	
			$( "#ticket-form" ).validate({
				/* @validation states + elements 
				------------------------------------------- */
				errorClass: "state-error",
				validClass: "state-success",
				errorElement: "em",
				ignore: [],
				
				/* @validation rules 
				------------------------------------------ */
				rules: {
					compId:{
						defaultvalue: "default"
					},
					outletId:{
						defaultvalue: "default"
					},
					machId:{
						defaultvalue: "default"
					},
					error:{
						defaultvalue: "default"
					},
					callType:{
						defaultvalue: "default"
					},
					status:{
						defaultvalue: "default"
					},
					name:{
						required: true
					},
					amount:{
						number: true
					}
				},
			
				/* @validation error messages 
				---------------------------------------------- */
				messages:{
					compId:{
						defaultvalue: 'Please choose a company'
					},
					outletId:{
						defaultvalue: 'Please choose an outlet'
					},
					machId:{
						defaultvalue: 'Please choose a machine'
					},
					error:{
						defaultvalue: 'Please choose an error code'
					},
					callType:{
						defaultvalue: 'Please choose the call type'
					},
					status:{
						defaultvalue: 'Please choose ticket status'
					},
					name:{
						required: 'Fill in customer name'
					},
					amount:{
						number: 'This field only accept decimal values'
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
		});
	</script>
	<!-- END: PAGE SCRIPTS -->
</body>
</html>