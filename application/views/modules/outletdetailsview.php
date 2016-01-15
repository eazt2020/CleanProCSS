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
					<span class="panel-icon"><i class="glyphicons glyphicons-bank"></i></span><span class="panel-title"><b><?php echo strtoupper($outlet01); ?></b></span>
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
									<a href="#tab2_2" data-toggle="tab">Machines</a>
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
												<tbody>
												<?php $calt = 0; foreach($outlet00 as $outlet10) {
													$calt++;
													echo '<tr>';
													echo '<td>Outlet ID</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.$outlet10['id'].'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Outlet Name</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.strtoupper($outlet10['name']).'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Contact Number</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.strtoupper($outlet10['contact']).'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Company Name</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td><a href="'.base_url('companies/details?id='.$outlet10['compId']).'">'.strtoupper($outlet10['compName']).'</td>';
													echo '</tr>';
													echo '<tr>';
													echo '<td>Company Address</td>';
													echo '<td width="10px" align="center">:</td>';
													echo '<td>'.strtoupper($outlet10['primeAdd']).' '.strtoupper($outlet10['secondAdd']).' '.strtoupper($outlet10['city']).' '.$outlet10['postcode'].' '.strtoupper($outlet10['state']).'</td>';
													echo '</tr>';
												}?>
												<tbody>
											</table>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-2">
											<div id="animation-outlet">
												<button type="button" class="btn btn-alert br2 btn-sm btn-block" data-effect="mfp-zoomIn">
													<i class="glyphicons glyphicons-circle_plus hidden-lg"></i>
													<span class="hidden-xs">Update Outlet details</span>
												</button>
											</div>
										</div>
										<div class="col-md-2">
											<button type="submit" class="btn btn-danger br2 btn-sm btn-block" form="rmcomp" value="Submit">
												<i class="glyphicons glyphicons-circle_minus hidden-lg"></i>
												<span class="hidden-xs">Delete Outlet</span>
											</button>
											<form name="rmcomp" id="rmcomp" action="<?php echo base_url('outlets/remove'); ?>" method="POST">
												<input name="checkList[]" type="hidden" class="textbox" id="checkbox" value="<?php echo $outlet10['id']; ?>">
											</form>
										</div>
									</div>
								</div>
								<div id="tab2_2" class="tab-pane">
									<div class="row">
										<div class="col-md-2"><button type="submit" class="btn btn-sm btn-danger btn-block" form="rmmachine" value="Submit">Delete Selected</button></div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<form name="rmmachine" id="rmmachine" action="<?php echo base_url('machines/remove'); ?>" method="POST">
												<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th width="20px">ID</th>
															<th>Machine Name</th>
															<th>Machine Type</th>
															<th>Status</th>
															<th width="10px"><input name="checkAll" type="checkbox" class="textbox" id="checkAll" onClick="javascript:check_all('rmmachine', this)" value="yes"></th>
														</tr>
													</thead>
													<tbody>
														<?php $calt = 0; foreach($machi000 as $machi100) {
															$calt++;
															echo '<tr>';
															echo '<td>'.$machi100['id'].'</td>';
															echo '<td><a href="'.base_url('machines/details?id='.$machi100['id'].'&outletId='.$machi100['outletId'].'&compId='.$machi100['compId']).'">'.strtoupper($machi100['name']).'</a></td>';
															echo '<td>'.strtoupper($machi100['type']).'</td>';
															echo '<td>'.strtoupper($machi100['status']).'</td>';
															echo '<td><input name="checkList[]" type="checkbox" class="textbox" id="checkbox" value="'.$machi100['id'].'"></td>';
															echo '</tr>';
														}?>
													</tbody>
												</table>
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
														<?php $calt = 0; foreach($ticket00 as $ticket10) {
															$calt++;
															echo '<tr>';
															echo '<td>'.$ticket10['id'].'</td>';
															echo '<td><a href="'.base_url('tickets/details?id='.$ticket10['id']).'&outletId='.$ticket10['outletId'].'&compId='.$ticket10['compId'].'">'.strtoupper($ticket10['name']).'</a></td>';
															echo '<td>'.strtoupper($ticket10['contact']).'</td>';
															echo '<td>'.$ticket10['callType'].'</td>';
															echo '<td>'.strtoupper($ticket10['error']).'</td>';
															echo '<td>'.strtoupper($ticket10['status']).'</td>';
															echo '<td><input name="checkList[]" type="checkbox" class="textbox" id="checkbox" value="'.$ticket10['id'].'"></td>';
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
				<div class="panel panel-primary mfp-with-anim mfp-hide mw800 center-block" id="modal-outlet">
					<div class="panel-heading">
						<span class="panel-icon"><i class="glyphicons glyphicons-bank"></i></span>
						<span class="panel-title">New Outlet Form</span>
					</div>
					<div class="panel-body">
						<div class="admin-form">
							<?php $form_attributes = array('method' => 'POST','id' => 'outlet-form'); echo form_open('outlets/validate?id='.$_GET['id'],$form_attributes); ?>
								<input type="hidden" name="compId" id="compId" class="gui-input" value="<?php echo $outlet10['compId']?>">
								<div class="row">
									<div class="col-md-8">
										<div class="section">
											<label for="name" class="field prepend-icon">
												<input type="text" name="name" id="name" class="gui-input" placeholder="Outlet Name" value="<?php echo $outlet10['name']?>">
												<label for="name" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="contact" class="field prepend-icon">
												<input type="text" name="contact" id="contact" class="gui-input" placeholder="Contact Number" value="<?php echo $outlet10['contact']?>">
												<label for="contact" class="field-icon"><i class="fa fa-phone"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="section">
											<label for="add1" class="field prepend-icon">
												<input type="text" name="add1" id="add1" class="gui-input" placeholder="Address Line 1" value="<?php echo $outlet10['primeAdd']?>">
												<label for="add1" class="field-icon"><i class="fa fa-home"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="section">
											<label for="add2" class="field prepend-icon">
												<input type="text" name="add2" id="add2" class="gui-input" placeholder="(Optional) Address Line 2" value="<?php echo $outlet10['secondAdd']?>">
												<label for="add2" class="field-icon"><i class="fa fa-home"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="section">
											<label for="city" class="field prepend-icon">
												<input type="text" name="city" id="city" class="gui-input" placeholder="City" value="<?php echo $outlet10['city']?>">
												<label for="city" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="state" class="field select">
												<select id="state" name="state">
													<option value="default">State</option>
														<?php $calt2 = 0; $var1 = $outlet10['state']; foreach($states00 as $states01) {
															$calt2++;
															$var1 = $outlet10['state'];
															$line1 = ('<option value="'.$states01['id'].'"');
															if ($states01['name'] == $var1){ $line2 = 'selected';}else {$line2 = '';}
															$line3 = ('>'.ucwords($states01['name']).'</option>');
															echo $line1.$line2.$line3.$var1;
														}?>
												</select>
												<i class="arrow"></i>
											</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="section">
											<label for="postcode" class="field prepend-icon">
												<input type="text" name="postcode" id="postcode" class="gui-input" placeholder="Postcode" value="<?php echo $outlet10['postcode']?>">
												<label for="postcode" class="field-icon"><i class="fa fa-pencil-square-o"></i></label>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<button type="submit" class="btn btn-sm dark btn-alert btn-block" form="outlet-form" value="Submit">Submit</button>
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
			
			$('#animation-outlet button').on('click', function() {
				$('#animation-outlet').find('button').removeClass('active-animation');
				$(this).addClass('active-animation item-checked');
	
				// Inline Admin-Form example 
				$.magnificPopup.open({
					removalDelay: 500, //delay removal by X to allow out-animation,
					items: {
						src: '#modal-outlet'
					},
					// overflowY: 'hidden', // 
					callbacks: {
						beforeOpen: function(e) {
							var Animation = $("#animation-outlet").find('.active-animation').attr('data-effect');
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