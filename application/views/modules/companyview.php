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
					<span class="panel-icon"><i class="glyphicons glyphicons-building"></i></span><span class="panel-title"><b>Companies</b></span>
				</div>
				<div class="col-md-6">
						<a href="<?php echo base_url('faq/view?id='.$faqscrid);?>" target="_blank"><span class="glyphicons glyphicons-circle_question_mark pull-right"></span></a>
				</div>
				<br>
				<?php echo $flashmsg ?>
				<br>
				<div id="animation-company" class="col-md-2">
					<button type="button" class="btn btn-alert br2 btn-sm btn-block" data-effect="mfp-zoomIn">
						<i class="glyphicons glyphicons-circle_plus hidden-lg"></i>
						<span class="hidden-xs">Add New Company</span>
					</button>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-danger br2 btn-sm btn-block" form="rmcomp" value="Submit">
						<i class="glyphicons glyphicons-circle_minus hidden-lg"></i>
						<span class="hidden-xs">Delete Selected</span>
					</button>
				</div>
				<div class="col-md-12">
					<div class="panel panel-visible" id="spy2">
						<div class="panel-body pn">
							<form name="rmcomp" id="rmcomp" action="<?php echo base_url('companies/remove'); ?>" method="POST">
								<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th width="20px">ID</th>
											<th>Company Name</th>
											<th width="100px">Contact Number</th>
											<th>Company Address</th>
											<th align="center" width="10px"><input name="checkAll" type="checkbox" class="textbox" id="checkAll" onClick="javascript:check_all('rmcomp', this)" value="yes"></th>
										</tr>
									</thead>
									<tbody>
										<?php $calt = 0; foreach($company0 as $company1) {
											$calt++;
											echo '<tr>';
											echo '<td align="center">'.$company1['id'].'</td>';
											echo '<td><a href="'.base_url('companies/details?id='.$company1['id']).'">'.strtoupper($company1['name']).'</a></td>';
											echo '<td>'.$company1['contact'].'</td>';
											echo '<td>'.strtoupper($company1['primeAdd']).' '.strtoupper($company1['secondAdd']).' '.strtoupper($company1['city']).' '.$company1['postcode'].' '.strtoupper($company1['state']).'</td>';
											echo '<td align="center"><input name="checkList[]" type="checkbox" class="textbox" id="checkbox" value="'.$company1['id'].'"></td>';
											echo '</tr>';
										}?>
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
				<div class="panel panel-primary mfp-with-anim mfp-hide mw800 center-block" id="modal-company">
					<div class="panel-heading">
						<span class="panel-icon"><i class="glyphicons glyphicons-building"></i></span>
						<span class="panel-title">New Company Form</span>
					</div>
					<div class="panel-body">
						<div class="admin-form">
							<?php $form_attributes = array('method' => 'POST','id' => 'company-form'); echo form_open('companies/validate',$form_attributes); ?>
								<div class="row">
									<div class="col-md-4">
										<div class="section">
											<label for="name" class="field prepend-icon">
												<input type="text" name="name" id="name" class="gui-input" placeholder="Company Name">
												<label for="name" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="regNo" class="field prepend-icon">
												<input type="text" name="regNo" id="regNo" class="gui-input" placeholder="Company Reg. Number">
												<label for="regNo" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="contact" class="field prepend-icon">
												<input type="text" name="contact" id="contact" class="gui-input" placeholder="Contact Number">
												<label for="contact" class="field-icon"><i class="fa fa-phone"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="section">
											<label for="add1" class="field prepend-icon">
												<input type="text" name="add1" id="add1" class="gui-input" placeholder="Address Line 1">
												<label for="add1" class="field-icon"><i class="fa fa-home"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="section">
											<label for="add2" class="field prepend-icon">
												<input type="text" name="add2" id="add2" class="gui-input" placeholder="(Optional) Address Line 2">
												<label for="add2" class="field-icon"><i class="fa fa-home"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="section">
											<label for="city" class="field prepend-icon">
												<input type="text" name="city" id="city" class="gui-input" placeholder="City">
												<label for="city" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="state" class="field select">
												<select id="state" name="state">
													<option value="default">Choose a State</option>
													<?php $calt = 0; foreach($state000 as $state001) {
														$calt++;
														echo '<option value="'.$state001['id'].'">'.ucwords($state001['name']).'</option>';
													}?>
												</select>
												<i class="arrow"></i>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="postcode" class="field prepend-icon">
												<input type="text" name="postcode" id="postcode" class="gui-input" placeholder="Postcode">
												<label for="postcode" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<button type="submit" class="btn btn-sm dark btn-alert btn-block" form="company-form" value="Submit">Submit</button>
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
			
			// Form Skin Switcher
			$('#animation-company button').on('click', function() {
				$('#animation-company').find('button').removeClass('active-animation');
				$(this).addClass('active-animation item-checked');
	
				// Inline Admin-Form example 
				$.magnificPopup.open({
					removalDelay: 500, //delay removal by X to allow out-animation,
					items: {
						src: '#modal-company'
					},
					// overflowY: 'hidden', // 
					callbacks: {
						beforeOpen: function(e) {
							var Animation = $("#animation-company").find('.active-animation').attr('data-effect');
							this.st.mainClass = Animation;
						}
					},
					midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
				});
			});
			
			$.validator.addMethod("defaultvalue", function(value, element, arg){
				return arg != value;
			}, "Value must not equal arg.");
			
			$( "#company-form" ).validate({
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
					contact:{
						required: true,
						digits: true
					},
					add1:{
						required: true
					},
					city:{
						required: true
					},
					state:{
						defaultvalue: "default"
					},
					postcode:{
						required: true,
						digits: true
					}
				},
			
				/* @validation error messages 
				---------------------------------------------- */
				messages:{
					name:{
						required: 'This field is mandatory'
					},
					contact:{
						required: 'This field is mandatory',
						digits: 'This field only accept numeric values'
					},
					add1:{
						required: 'This field is mandatory'
					},
					city:{
						required: 'This field is mandatory'
					},
					state:{
						defaultvalue: 'Please choose a state'
					},
					postcode:{
						required: 'This field is mandatory',
						digits: 'This field only accept numeric values'
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