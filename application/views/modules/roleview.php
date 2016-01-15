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
					<span class="panel-icon"><i class="glyphicons glyphicons-keys"></i></span><span class="panel-title"><b>Roles</b></span>
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
						<span class="hidden-xs"> Add New System Role</span>
					</button>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-danger br2 btn-sm btn-block" form="rmrole" value="Submit">
						<i class="glyphicons glyphicons-circle_minus hidden-lg"></i>
						<span class="hidden-xs"> Delete Selected</span>
					</button>
				</div>
				<div class="col-md-12">
					<div class="panel panel-visible" id="spy2">
						<div class="panel-body pn">
							<form name="rmrole" id="rmrole" action="<?php echo base_url('roles/remove'); ?>" method="POST">
								<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="10px" align="center">ID</th>
											<th>Role Name</th>
											<th width="10px" align="center"><input name="checkAll" type="checkbox" class="textbox" id="checkAll" onClick="javascript:check_all('rmrole', this)" value="yes"></th>
										</tr>
									</thead>
									<tbody>
										<?php $calt = 0; foreach($usrole00 as $row00) {
											$calt++;
											echo '<tr>';
											echo '<td align="center">'.$row00['id'].'</td>';
											echo '<td>'.strtoupper($row00['name']).'</a></td>';
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
						<span class="panel-icon"><i class="glyphicons glyphicons-keys"></i></span>
						<span class="panel-title">System Role Form</span>
					</div>
					<div class="panel-body">
						<div class="admin-form">
							<?php $form_attributes = array('method' => 'POST','id' => 'roles-form'); echo form_open('roles/validate',$form_attributes); ?>
								<div class="row">
									<div class="col-md-12">
										<div class="section">
											<label class="field prepend-icon">
												<input type="text" name="name" id="name" class="gui-input" placeholder="Role Name">
												<label for="name" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td>Screen Privilege</td>
												<td width="100px" align="center">View</td>
												<td width="100px" align="center">Create/Update</td>
												<td width="100px" align="center">Delete</td>
											</tr>
											<tr>
												<td>Companies</td>
												<td align="center">
													<input type="checkbox" name="compvr00" id="compvr00" value="r">
												</td>
												<td align="center">
													<input type="checkbox" name="compvr01" id="compvr01" value="cu">
												</td>
												<td align="center">
													<input type="checkbox" name="compvr02" id="compvr02" value="d">
												</td>
											</tr>
											<tr>
												<td>Outlets</td>
												<td align="center">
													<input type="checkbox" name="outpvr00" id="outpvr00" value="r">
												</td>
												<td align="center">
													<input type="checkbox" name="outpvr01" id="outpvr01" value="cu">
												</td>
												<td align="center">
													<input type="checkbox" name="outpvr02" id="outpvr02" value="d">
												</td>
											</tr>
											<tr>
												<td>Machines</td>
												<td align="center">
													<input type="checkbox" name="macpvr00" id="macpvr00" value="r">
												</td>
												<td align="center">
													<input type="checkbox" name="macpvr01" id="macpvr01" value="cu">
												</td>
												<td align="center">
													<input type="checkbox" name="macpvr02" id="macpvr02" value="d">
												</td>
											</tr>
											<tr>
												<td>Tickets</td>
												<td align="center">
													<input type="checkbox" name="ticpvr00" id="ticpvr00" value="r">
												</td>
												<td align="center">
													<input type="checkbox" name="ticpvr01" id="ticpvr01" value="cu">
												</td>
												<td align="center">
													<input type="checkbox" name="ticpvr02" id="ticpvr02" value="d">
												</td>
											</tr>
											<tr>
												<td>Notifications</td>
												<td align="center">
													<input type="checkbox" name="notpvr00" id="notpvr00" value="r">
												</td>
												<td align="center">
													<input type="checkbox" name="notpvr01" id="notpvr01" value="cu">
												</td>
												<td align="center">
													<input type="checkbox" name="notpvr02" id="notpvr02" value="d">
												</td>
											</tr>
											<tr>
												<td>Error Codes</td>
												<td align="center">
													<input type="checkbox" name="errpvr00" id="errpvr00" value="r">
												</td>
												<td align="center">
													<input type="checkbox" name="errpvr01" id="errpvr01" value="cu">
												</td>
												<td align="center">
													<input type="checkbox" name="errpvr02" id="errpvr02" value="d">
												</td>
											</tr>
											<tr>
												<td>System Users</td>
												<td align="center">
													<input type="checkbox" name="usrpvr00" id="usrpvr00" value="r">
												</td>
												<td align="center">
													<input type="checkbox" name="usrpvr01" id="usrpvr01" value="cu">
												</td>
												<td align="center">
													<input type="checkbox" name="usrpvr02" id="usrpvr02" value="d">
												</td>
											</tr>
											<tr>
												<td>Roles</td>
												<td align="center">
													<input type="checkbox" name="rolpvr00" id="rolpvr00" value="r">
												</td>
												<td align="center">
													<input type="checkbox" name="rolpvr01" id="rolpvr01" value="cu">
												</td>
												<td align="center">
													<input type="checkbox" name="rolpvr02" id="rolpvr02" value="d">
												</td>
											</tr>
											<tr>
												<td>FAQ Screen Settings</td>
												<td align="center">
													<input type="checkbox" name="faqpvr00" id="rolpvr00" value="r">
												</td>
												<td align="center">
													<input type="checkbox" name="faqpvr01" id="faqpvr01" value="cu">
												</td>
												<td align="center">
													<input type="checkbox" name="faqpvr02" id="faqpvr02" value="d">
												</td>
											</tr>
											<tr>
												<td>Reports</td>
												<td align="center">
													<input type="checkbox" name="reppvr00" id="reppvr00" value="r">
												</td>
												<td align="center">
												</td>
												<td align="center">
												</td>
											</tr>
										</tbody>
									</table>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-2">
										<button type="submit" class="btn btn-sm dark btn-alert btn-block active" form="roles-form" value="Submit">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
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

			$( "#roles-form" ).validate({
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
				},
			
				/* @validation error messages 
				---------------------------------------------- */
				messages:{
					name:{
						required: 'Please enter the role\'s name',
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