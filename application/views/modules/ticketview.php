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
					<span class="panel-icon"><i class="glyphicons glyphicons-sampler"></i></span><span class="panel-title"><b>Tickets</b></span>
				</div>
				<div class="col-md-6">
						<a href="<?php echo base_url('faq/view?id='.$faqscrid);?>" target="_blank"><span class="glyphicons glyphicons-circle_question_mark pull-right"></span></a>
				</div>
				<br>
				<?php echo $flashmsg ?>
				<br>
				<div id="animation-switcher" class="col-md-2">
					<button type="button" class="btn btn-alert br2 btn-sm btn-block" data-effect="mfp-zoomIn">
						<i class="glyphicons glyphicons-circle_plus hidden-lg"></i>
						<span class="hidden-xs">Issue New Ticket</span>
					</button>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-danger br2 btn-sm btn-block" form="rmticket" value="Submit">
						<i class="glyphicons glyphicons-circle_minus hidden-lg"></i>
						<span class="hidden-xs">Delete Selected</span>
					</button>
				</div>
				<div class="col-md-12">
					<div class="panel panel-visible" id="spy2">
						<div class="panel-body pn">
							<form name="rmticket" id="rmticket" action="<?php echo base_url('tickets/remove'); ?>" method="POST">
								<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="20px">ID</th>
											<th>Customer Name</th>
											<th>Contact Number</th>
											<th>Call Type</th>
											<th>Error Code</th>
											<th>Status</th>
											<th align="center" width="10px"><input name="checkAll" type="checkbox" class="textbox" id="checkAll" onClick="javascript:check_all('rmticket', this)" value="yes"></th>
										</tr>
									</thead>
									<tbody>
										<?php $calt = 0; foreach($tickets as $row) {
											$calt++;
											echo '<tr>';
											echo '<td align="center">'.$row['id'].'</td>';
											echo '<td><a href="'.base_url('tickets/details?id='.$row['id']).'">'.strtoupper($row['name']).'</a></td>';
											echo '<td>'.$row['contact'].'</td>';
											echo '<td>'.strtoupper($row['callTypeName']).'</td>';
											echo '<td>'.strtoupper($row['errorName']).'</td>';
											echo '<td>'.strtoupper($row['statusName']).'</td>';
											echo '<td align="center"><input name="checkList[]" type="checkbox" class="textbox" id="checkbox" value="'.$row['id'].'"></td>';
											echo '</tr>';
										}?>
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
				<div class="row table-layout" id="modal-content">
					<input class="holder-style p15 holder-active mb20" type="hidden" href="#modal-text">
				</div>
				<div class="panel panel-primary mfp-with-anim mfp-hide mw800 center-block" id="modal-text">
					<div class="panel-heading">
						<span class="panel-icon"><i class="glyphicons glyphicons-sampler"></i></span>
						<span class="panel-title">New Ticket Form</span>
					</div>
					<div class="panel-body">
						<div class="admin-form">
							<?php $form_attributes = array('method' => 'POST','id' => 'ticket-form'); echo form_open('tickets/validate',$form_attributes); ?>
								<div class="row">
									<div class="col-md-12">
										<div style="display: none;">
											<select name="compId" id="compId" class="select2-machine">
												<option value="default">Choose Outlet first...</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="section">
											<label for="outletId" class="field">
												<select name="outletId" id="outletId" class="select2-outlet">
													<option value="default">Choose Outlet Here</option>
													<?php $calt = 0; foreach($outlets00 as $row) {
														$calt++;
														echo '<option value="'.$row['id'].'">#'.$row['id'].'| '.strtoupper($row['name']).'</option>';
													}?>
												</select>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="section">
											<label for="machId" class="field">
												<select name="machId" id="machId" class="select2-machine">
													<option value="default">Choose Outlet first...</option>
												</select>
											</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="section">
											<label for="error" class="field select">
												<select name="error" id="error">
													<option value="default">Choose Error Code</option>
													<?php $calt = 0; foreach($errorcode as $row) {
														$calt++;
														echo '<option value="'.$row['id'].'">#'.$row['id'].'| '.strtoupper($row['name']).'</option>';
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
												<input type="text" name="name" id="name" class="gui-input" placeholder="Customer Name">
												<label for="name" class="field-icon"><i class="fa fa-user"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="contact" class="field prepend-icon">
												<input type="text" name="contact" id="contact" class="gui-input" placeholder="Customer Contact Number">
												<label for="name" class="field-icon"><i class="fa fa-phone-square"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="callType" class="field select">
												<select name="callType" id="callType">
													<option value="default">Choose Call Type</option>
													<?php $calt = 0; foreach($calltype0 as $row) {
														$calt++;
														echo '<option value="'.$row['id'].'">#'.$row['id'].'| '.strtoupper($row['name']).'</option>';
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
												<input type="text" name="bankAc" id="bankAc" class="gui-input" placeholder="Bank Account Number">
												<label for="name" class="field-icon"><i class="fa fa-credit-card"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="amount" class="field prepend-icon">
												<input type="text" name="amount" id="amount" class="gui-input" placeholder="Refund Amount (RM)">
												<label for="name" class="field-icon"><i class="fa fa-dollar"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="status" class="field select">
												<select name="status" id="status">
													<option value="default">Choose Ticket Status</option>
													<?php $calt = 0; foreach($ticstatus as $row) {
														$calt++;
														echo '<option value="'.$row['id'].'">#'.$row['id'].'| '.strtoupper($row['name']).'</option>';
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
												<input type="text" name="pic" id="pic" class="gui-input" placeholder="PIC">
												<label for="pic" class="field-icon"><i class="fa fa-user"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<div class="checkbox-custom fill checkbox-alert mb5">
												<input type="checkbox" name="refund" id="refund" value="1">
												<label for="refund">Already refunded?</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="section">
											<textarea class="form-control textarea-grow"name="remark" id="remark" rows="5" placeholder="(Optional) Remark..."></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="section">
										<div class="section">
											<textarea class="form-control textarea-grow" name="ref" id="ref" rows="5" placeholder="(Optional) Reference..."></textarea>
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
	
	<!-- Select2 plugin -->
	<script src="<?php echo base_url('vendor/plugins/select2/select2.min.js'); ?>"></script>
	
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
			$("#compId").select2({width: "100%"});
			$("#outletId").select2({width: "100%"});
			$("#machId").select2({width: "100%"});
			
			$("#outletId").change(function() {
				$("#compId").load("<?php echo base_url('tickets/companydropdown'); ?>?choice=" + jQuery("#outletId").val(),function(){
					$("#compId").select2({width: "100%"});
					$("#compId").hide();
				});
				$("#machId").load("<?php echo base_url('tickets/machinedropdown'); ?>?choice=" + jQuery("#outletId").val(),function(){
					$("#machId").select2({width: "100%"});

				});
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
							this.wrap.removeAttr('tabindex');
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