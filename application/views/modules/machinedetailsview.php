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
					<span class="panel-icon"><i class="glyphicons glyphicons-imac"></i></span><span class="panel-title"><b><?php echo strtoupper($machnam0); ?></b></span>
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
								<li class="active">
									<a href="#tab2_1" data-toggle="tab">General</a>
								</li>
								<li>
									<a href="#tab2_3" data-toggle="tab">Tickets</a>
								</li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="tab-content pn br-n">
								<div id="tab2_1" class="tab-pane active">
									<div class="row">
										<div class="col-md-12">
											<table class="table table-condensed">
											<?php $calt = 0; foreach($machines as $row) {
												$calt++;
												echo '<tr>';
												echo '<td>Machine ID</td>';
												echo '<td width="10px" align="center">:</td>';
												echo '<td>'.$row['id'].'</td>';
												echo '</tr>';
												echo '<tr>';
												echo '<td>Company Name</td>';
												echo '<td width="10px" align="center">:</td>';
												echo '<td><a href="'.base_url('companies/details?id='.$row['compId']).'">'.strtoupper($row['compName']).'</a></td>';
												echo '</tr>';
												echo '<tr>';
												echo '<td>Outlet Name</td>';
												echo '<td width="10px" align="center">:</td>';
												echo '<td><a href="'.base_url('outlets/details?id='.$row['outletId']).'">'.strtoupper($row['outletName']).'</a></td>';
												echo '</tr>';
												echo '<tr>';
												echo '<tr>';
												echo '<td>Machine Number</td>';
												echo '<td width="10px" align="center">:</td>';
												echo '<td>'.strtoupper($row['machNo']).'</td>';
												echo '</tr>';
												echo '<td>Machine Name</td>';
												echo '<td width="10px" align="center">:</td>';
												echo '<td>'.strtoupper($row['name']).'</td>';
												echo '</tr>';
												echo '<tr>';
												echo '<td>Machine Type</td>';
												echo '<td width="10px" align="center">:</td>';
												echo '<td>'.strtoupper($row['type']).' <img src="'.base_url('faicons/'.$row['imageName']).'" height="20" width="20"></td>';
												echo '</tr>';
												echo '<tr>';
												echo '<td>Machine Status</td>';
												echo '<td width="10px" align="center">:</td>';
												echo '<td>'.strtoupper($row['status']).'</td>';
												echo '</tr>';
											}?>
											</table>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-2">
											<div id="animation-switcher">
												<button type="button" class="btn btn-alert br2 btn-sm btn-block"  data-effect="mfp-zoomIn">
													<i class="glyphicons glyphicons-circle_plus hidden-lg"></i>
													<span class="hidden-xs">Update Machine details</span>
												</button>
											</div>
										</div>
										<div class="col-md-2">
											<button type="submit" class="btn btn-danger br2 btn-sm btn-block" form="rmmachine" value="Submit">
												<i class="glyphicons glyphicons-circle_minus hidden-lg"></i>
												<span class="hidden-xs"> Delete Machine</span>
											</button>
											<form name="rmmachine" id="rmmachine" action="<?php echo base_url('machines/remove'); ?>" method="POST">
												<input name="checkList[]" type="hidden" class="textbox" id="checkbox" value="<?php echo $row['id']; ?>">
											</form>
										</div>
									</div>
								</div>
								<div id="tab2_3" class="tab-pane">
									<div class="row">
										<div class="col-md-2"><button type="submit" class="btn btn-sm btn-danger btn-block" form="rmticket" value="Submit">Delete Selected</button></div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<form name="rmticket" id="rmticket" action="<?php echo base_url('tickets/remove'); ?>" method="POST">
												<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th width="20px">ID</th>
															<th>Customer Name</th>
															<th>Contact Number</th>
															<th>Call Type</th>
															<th>Error Code</th>
															<th>Status</th>
															<th width="10px"><input name="checkAll" type="checkbox" class="textbox" id="checkAll" onClick="javascript:check_all('rmticket', this)" value="yes"></th>
														</tr>
													</thead>
													<tbody>
														<?php $calt = 0; foreach($ticket00 as $ticket00) {
															$calt++;
															echo '<tr>';
															echo '<td>'.$ticket00['id'].'</td>';
															echo '<td><a href="'.base_url('tickets/details?id='.$ticket00['id']).'&outletId='.$ticket00['outletId'].'&compId='.$ticket00['compId'].'">'.strtoupper($ticket00['name']).'</a></td>';
															echo '<td>'.strtoupper($ticket00['contact']).'</td>';
															echo '<td>'.$ticket00['callType'].'</td>';
															echo '<td>'.strtoupper($ticket00['error']).'</td>';
															echo '<td>'.strtoupper($ticket00['status']).'</td>';
															echo '<td><input name="checkList[]" type="checkbox" class="textbox" id="checkbox" value="'.$ticket00['id'].'"></td>';
															echo '</tr>';
														}?>
													</tbody>
												</table>
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
						<span class="panel-icon"><i class="glyphicons glyphicons-imac"></i></span>
						<span class="panel-title">Update Machine Form</span>
					</div>
					<div class="panel-body">
						<div class="admin-form">
							<?php $form_attributes = array('method' => 'POST','id' => 'machine-form'); echo form_open('machines/validate?id='.$row['id'],$form_attributes); ?>
								<input type="hidden" name="compId" id="compId" class="gui-input" value="<?php echo $row['compId']?>">
								<input type="hidden" name="outletId" id="outletId" class="gui-input" value="<?php echo $row['outletId']?>">
								<div class="row">
									<div class="col-md-6">
										<div class="section">
											<label class="field prepend-icon">
												<input type="text" name="name" id="name" class="gui-input" placeholder="Machine Name*" value="<?php echo $row['name']?>">
												<label for="name" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="section">
											<label class="field prepend-icon">
												<input type="text" name="machNo" id="machNo" class="gui-input" placeholder="Machine Number" value="<?php echo $row['machNo']?>">
												<label for="machNo" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="section">
											<label for="type" class="field select">
												<select name="type" id="type">
													<option value="default">Machine Type</option>
													<?php $calt = 0; foreach($mactyp00 as $mactyp00) {
														$calt++;
														if($row['typeId'] == $mactyp00['id']){
															echo '<option selected value="'.$mactyp00['id'].'">#'.$mactyp00['id'].'| '.ucwords($mactyp00['type']).'</option>';
														}
														else{
															echo '<option value="'.$mactyp00['id'].'">#'.$mactyp00['id'].'| '.ucwords($mactyp00['type']).'</option>';
														}
													}?>
												</select>
												<i class="arrow"></i>
											</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="section">
											<label for="status" class="field select">
												<select name="status" id="status">
													<option value="default">Machine Status</option>
													<?php $calt = 0; foreach($status00 as $status00) {
														$calt++;
														if($row['statusId'] == $status00['id']){
															echo '<option selected value="'.$status00['id'].'">#'.$status00['id'].'| '.strtoupper($status00['status']).'</option>';
														}
														else {
															echo '<option value="'.$status00['id'].'">#'.$status00['id'].'| '.strtoupper($status00['status']).'</option>';
														}
													}?>
												</select>
												<i class="arrow"></i>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<button type="submit" class="btn btn-sm dark btn-alert btn-block active" form="machine-form" value="Submit">Submit</button>
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
	
			// Init tray navigation smooth scroll
			$('.tray-nav a').smoothScroll({
				offset: -145
			});
			
			$("#compId").change(function() {
				$("#outletId").load("<?php echo base_url('machines/machinedropdown'); ?>?choice=" + jQuery("#compId").val());
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
	
			$( "#machine-form" ).validate({
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
					type:{
						defaultvalue: "default"
					},
					status:{
						defaultvalue: "default"
					}
				},
			
				/* @validation error messages 
				---------------------------------------------- */
				messages:{
					name:{
						required: 'This field is mandatory'
					},
					type:{
						defaultvalue: 'Please choose machine type'
					},
					status:{
						defaultvalue: 'Please choose machine status'
					},
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