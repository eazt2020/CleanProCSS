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
					<span class="panel-icon"><i class="glyphicons glyphicons-group"></i></span><span class="panel-title"><b>Users Settings</b></span>
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
						<span class="hidden-xs"> Add New System User</span>
					</button>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-danger br2 btn-sm btn-block" form="rmusers" value="Submit">
						<i class="glyphicons glyphicons-circle_minus hidden-lg"></i>
						<span class="hidden-xs"> Delete Selected</span>
					</button>
				</div>
				<div class="col-md-12">
					<div class="panel panel-visible" id="spy2">
						<div class="panel-body pn">
							<form name="rmusers" id="rmusers" action="<?php echo base_url('users/remove'); ?>" method="POST">
								<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="10px" align="center">ID</th>
											<th>Username</th>
											<th>Full Name</th>
											<th>Email Address</th>
											<th>Status</th>
											<th width="10px" align="center"><input name="checkAll" type="checkbox" class="textbox" id="checkAll" onClick="javascript:check_all('rmusers', this)" value="yes"></th>
										</tr>
									</thead>
									<tbody>
										<?php $calt = 0; foreach($sysuser0 as $row00) {
											$calt++;
											echo '<tr>';
											echo '<td align="center">'.$row00['id'].'</td>';
											echo '<td>'.$row00['username'].'</td>';
											echo '<td><a href="'.base_url('users/details?id='.$row00['id']).'">'.strtoupper($row00['name']).'</a></td>';
											echo '<td>'.$row00['email'].'</td>';
											if ($row00['status'] == 1){
												echo '<td><span class="tm-tag tm-tag-success">Enabled</span></td>';
											}
											else{
												echo '<td><span class="tm-tag tm-tag-default">Disabled</span></td>';
											}
											echo '<td width="10px" align="center"><input name="checkList[]" type="checkbox" class="textbox" id="checkbox" value="'.$row00['id'].'"></td>';
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
						<span class="panel-icon"><i class="glyphicons glyphicons-user_add"></i></span>
						<span class="panel-title">System User Form</span>
					</div>
					<div class="panel-body">
						<div class="admin-form">
							<?php $form_attributes = array('method' => 'POST','id' => 'users-form'); echo form_open('users/validate',$form_attributes); ?>
								<div class="row">
									<div class="col-md-12">
										<div class="section">
											<label class="field prepend-icon">
												<input type="text" name="name" id="name" class="gui-input" placeholder="Full Name">
												<label for="name" class="field-icon"><i class="fa fa-user"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="section">
											<label class="field prepend-icon">
												<input type="text" name="username" id="username" class="gui-input" placeholder="Username">
												<label for="username" class="field-icon"><i class="fa fa-user"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="section">
											<label class="field prepend-icon">
												<input type="text" name="email" id="email" class="gui-input" placeholder="Email Address">
												<label for="email" class="field-icon"><i class="fa fa-envelope-o"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="section">
											<label for="role" class="field select">
												<select id="role" name="role">
													<option value="default">User Role</option>
													<?php $calt00 = 0; foreach($usrole00 as $usrole00) {
														$calt00++;
														echo '<option value="'.$usrole00['id'].'">'.ucwords($usrole00['name']).'</option>';
													}?>
												</select>
												<i class="arrow"></i>
											</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="section">
											<label for="status" class="field select">
												<select id="status" name="status">
													<option value="default">User Status</option>
													<option value="1">Enable</option>
													<option value="2">Disable</option>
												</select>
												<i class="arrow"></i>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="section">
											<label class="field prepend-icon">
												<input type="password" name="secret" id="secret" class="gui-input" placeholder="Password">
												<label for="secret" class="field-icon"><i class="fa fa-key"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="section">
											<label class="field prepend-icon">
												<input type="password" name="secret2" id="secret2" class="gui-input" placeholder="Re-type Password">
												<label for="secret2" class="field-icon"><i class="fa fa-key"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<button type="submit" class="btn btn-sm dark btn-alert btn-block active" form="users-form" value="Submit">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
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
	
			$( "#users-form" ).validate({
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
					username:{
						required: true
					},
					email:{
						required: true,
						email: true
					},
					role:{
						defaultvalue: "default"
					},
					status:{
						defaultvalue: "default"
					},
					secret2:{
						equalTo: '#secret'
					}
				},
			
				/* @validation error messages 
				---------------------------------------------- */
				messages:{
					name:{
						required: 'This field is mandatory'
					},
					username:{
						required: 'This field is mandatory'
					},
					email:{
						required: 'This field is mandatory',
						email: 'Please enter a valid email address'
					},
					role:{
						defaultvalue: 'Pleae choose the user role'
					},
					status:{
						defaultvalue: 'Please choose the user status'
					},
					secret2:{
						equalTo: 'Password entered mismatch'
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