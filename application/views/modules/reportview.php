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
					<span class="panel-icon"><i class="glyphicons glyphicons-blog"></i></span><span class="panel-title"><b>Reports</b></span>
				</div>
				<div class="col-md-6">
						<a href="<?php echo base_url('faq/view?id='.$faqscrid);?>" target="_blank"><span class="glyphicons glyphicons-circle_question_mark pull-right"></span></a>
				</div>
				<br>
				<?php echo $flashmsg ?>
				<br>
				<div class="col-md-12">
					<div class="panel panel-alert">
						<div class="panel-heading">
							<span class="panel-title">Data Reports Generator</span>
							<div class="widget-menu pull-right">
								<span class="glyphicons glyphicons-notes_2"></span>
							</div>
						</div>
						<div class="panel-body border">
							<table class="table table-condensed">
								<tbody>
									<tr>
										<td>
											<div id="animate-overallreport" class="col-xs-12">
												<span class="fa fa-circle text-info fs14 mr10"><a href="#"></span>Overall Report</a>
											</div>
											<div class="panel panel-alert mfp-with-anim mfp-hide mw600 center-block" id="overallreportscreen">
												<div class="panel-heading">
													<span class="panel-title">Overall Report</span>
												</div>
												<div class="panel-body">
													<div class="admin-form">
														<?php $form_attributes = array('method' => 'POST','id' => 'overallreport'); echo form_open('reportsdatarecords/overallreport',$form_attributes); ?>
															<div class="row">
																<div class="col-md-4">
																	<div class="section">
																		<div id="datetimepicker1">
																			<label class="field prepend-icon">
																				<input type="text" name="datefr00" id="datefr00" class="form-control" style="max-width: 250px;" placeholder="From Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="section">
																		<div id="datetimepicker2">
																			<label class="field prepend-icon">
																				<input type="text" name="dateto00" id="dateto00" class="form-control" style="max-width: 250px;" placeholder="To Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="section">
																		<label for="sortie" class="field select">
																			<select name="sortie" id="sortie">
																				<option value="DESC">Descending</option>
																				<option value="ASC">Ascending</option>
																			</select>
																			<i class="arrow"></i>
																		</label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-4">
																	<button type="submit" class="btn btn-sm dark btn-dark btn-block" form="overallreport" value="Submit" formtarget="_blank">Submit</button>
																</div>
																<div class="col-md-4">
																	<div class="checkbox-custom fill checkbox-alert mb5">
																		<input type="checkbox" name="preview0" id="preview0" value="1">
																		<label for="preview0">Preview Only</label>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										
										</td>
									</tr>
									<tr>
										<td>
											<div id="animate-overallrefund" class="col-xs-12">
												<span class="fa fa-circle text-info fs14 mr10"><a href="#"></span>Overall Refund</a>
											</div>
											<div class="panel panel-alert mfp-with-anim mfp-hide mw600 center-block" id="overallrefundscreen">
												<div class="panel-heading">
													<span class="panel-title">Overall Refund</span>
												</div>
												<div class="panel-body">
													<div class="admin-form">
														<?php $form_attributes = array('method' => 'POST','id' => 'overallrefund'); echo form_open('reportsdatarecords/overallrefund',$form_attributes); ?>
															<div class="row">
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker3">
																			<label class="field prepend-icon">
																				<input type="text" name="datefr00" id="datefr00" class="form-control" style="max-width: 250px;" placeholder="From Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker4">
																			<label class="field prepend-icon">
																				<input type="text" name="dateto00" id="dateto00" class="form-control" style="max-width: 250px;" placeholder="To Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-4">
																	<button type="submit" class="btn btn-sm dark btn-dark btn-block" form="overallrefund" value="Submit" formtarget="_blank">Submit</button>
																</div>
																<div class="col-md-4">
																	<div class="checkbox-custom fill checkbox-alert mb5">
																		<input type="checkbox" name="preview0" id="preview0" value="1">
																		<label for="preview0">Preview Only</label>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div id="animate-companyreport" class="col-xs-12">
												<span class="fa fa-circle text-info fs14 mr10"><a href="#"></span>Company Report</a>
											</div>
											<div class="panel panel-alert mfp-with-anim mfp-hide mw600 center-block" id="companyreportscreen">
												<div class="panel-heading">
													<span class="panel-title">Company Report</span>
												</div>
												<div class="panel-body">
													<div class="admin-form">
														<?php $form_attributes = array('method' => 'POST','id' => 'companyreport'); echo form_open('reportsdatarecords/companyreport',$form_attributes); ?>
															<div class="row">
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker5">
																			<label class="field prepend-icon">
																				<input type="text" name="datefr00" id="datefr00" class="form-control" style="max-width: 250px;" placeholder="From Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker6">
																			<label class="field prepend-icon">
																				<input type="text" name="dateto00" id="dateto00" class="form-control" style="max-width: 250px;" placeholder="To Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-4">
																	<button type="submit" class="btn btn-sm dark btn-dark btn-block" form="companyreport" value="Submit" formtarget="_blank">Submit</button>
																</div>
																<div class="col-md-4">
																	<div class="checkbox-custom fill checkbox-alert mb5">
																		<input type="checkbox" name="preview0" id="preview0" value="1">
																		<label for="preview0">Preview Only</label>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div id="animate-outletreport" class="col-xs-12">
												<span class="fa fa-circle text-info fs14 mr10"><a href="#"></span>Outlet Report</a>
											</div>
											<div class="panel panel-alert mfp-with-anim mfp-hide mw600 center-block" id="outletreportscreen">
												<div class="panel-heading">
													<span class="panel-title">Outlet Report</span>
												</div>
												<div class="panel-body">
													<div class="admin-form">
														<?php $form_attributes = array('method' => 'POST','id' => 'outletreport'); echo form_open('reportsdatarecords/outletreport',$form_attributes); ?>
															<div class="row">
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker7">
																			<label class="field prepend-icon">
																				<input type="text" name="datefr00" id="datefr00" class="form-control" style="max-width: 250px;" placeholder="From Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker8">
																			<label class="field prepend-icon">
																				<input type="text" name="dateto00" id="dateto00" class="form-control" style="max-width: 250px;" placeholder="To Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-4">
																	<button type="submit" class="btn btn-sm dark btn-dark btn-block" form="outletreport" value="Submit" formtarget="_blank">Submit</button>
																</div>
																<div class="col-md-4">
																	<div class="checkbox-custom fill checkbox-alert mb5">
																		<input type="checkbox" name="preview0" id="preview0" value="1">
																		<label for="preview0">Preview Only</label>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div id="animate-machinesreport" class="col-xs-12">
												<span class="fa fa-circle text-info fs14 mr10"><a href="#"></span>Machines Report</a>
											</div>
											<div class="panel panel-alert mfp-with-anim mfp-hide mw600 center-block" id="machinesreportscreen">
												<div class="panel-heading">
													<span class="panel-title">Machines Report</span>
												</div>
												<div class="panel-body">
													<div class="admin-form">
														<?php $form_attributes = array('method' => 'POST','id' => 'machinesreport'); echo form_open('reportsdatarecords/machinesreport',$form_attributes); ?>
															<div class="row">
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker9">
																			<label class="field prepend-icon">
																				<input type="text" name="datefr00" id="datefr00" class="form-control" style="max-width: 250px;" placeholder="From Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker10">
																			<label class="field prepend-icon">
																				<input type="text" name="dateto00" id="dateto00" class="form-control" style="max-width: 250px;" placeholder="To Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-4">
																	<button type="submit" class="btn btn-sm dark btn-dark btn-block" form="machinesreport" value="Submit" formtarget="_blank">Submit</button>
																</div>
																<div class="col-md-4">
																	<div class="checkbox-custom fill checkbox-alert mb5">
																		<input type="checkbox" name="preview0" id="preview0" value="1">
																		<label for="preview0">Preview Only</label>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div id="animate-errorcodesreport" class="col-xs-12">
												<span class="fa fa-circle text-info fs14 mr10"><a href="#"></span>Error Codes Report</a>
											</div>
											<div class="panel panel-alert mfp-with-anim mfp-hide mw600 center-block" id="errorcodesreportscreen">
												<div class="panel-heading">
													<span class="panel-title">Error Codes Report</span>
												</div>
												<div class="panel-body">
													<div class="admin-form">
														<?php $form_attributes = array('method' => 'POST','id' => 'errorcodesreport'); echo form_open('reportsdatarecords/errorcodesreport',$form_attributes); ?>
															<div class="row">
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker11">
																			<label class="field prepend-icon">
																				<input type="text" name="datefr00" id="datefr00" class="form-control" style="max-width: 250px;" placeholder="From Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker12">
																			<label class="field prepend-icon">
																				<input type="text" name="dateto00" id="dateto00" class="form-control" style="max-width: 250px;" placeholder="To Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-4">
																	<button type="submit" class="btn btn-sm dark btn-dark btn-block" form="errorcodesreport" value="Submit" formtarget="_blank">Submit</button>
																</div>
																<div class="col-md-4">
																	<div class="checkbox-custom fill checkbox-alert mb5">
																		<input type="checkbox" name="preview0" id="preview0" value="1">
																		<label for="preview0">Preview Only</label>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div id="animate-filteredrefund" class="col-xs-12">
												<span class="fa fa-circle text-info fs14 mr10"><a href="#"></span>Filtered Refund Report</a>
											</div>
											<div class="panel panel-alert mfp-with-anim mfp-hide mw600 center-block" id="filteredrefundscreen">
												<div class="panel-heading">
													<span class="panel-title">Filtered Refund Report</span>
												</div>
												<div class="panel-body">
													<div class="admin-form">
														<?php $form_attributes = array('method' => 'POST','id' => 'filteredrefund'); echo form_open('reportsdatarecords/filteredrefund',$form_attributes); ?>
															<div class="row">
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker13">
																			<label class="field prepend-icon">
																				<input type="text" name="datefr00" id="datefr00" class="form-control" style="max-width: 250px;" placeholder="From Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="section">
																		<div id="datetimepicker14">
																			<label class="field prepend-icon">
																				<input type="text" name="dateto00" id="dateto00" class="form-control" style="max-width: 250px;" placeholder="To Date">
																				<label for="description" class="field-icon"><i class="fa fa-calendar"></i></label>
																			</label>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-4">
																	<button type="submit" class="btn btn-sm dark btn-dark btn-block" form="filteredrefund" value="Submit" formtarget="_blank">Submit</button>
																</div>
																<div class="col-md-4">
																	<div class="checkbox-custom fill checkbox-alert mb5">
																		<input type="checkbox" name="preview0" id="preview0" value="1">
																		<label for="preview0">Preview Only</label>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
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
	
	<!-- Modal Popup -->
	<script type="text/javascript" src="<?php echo base_url('vendor/plugins/magnific/jquery.magnific-popup.js'); ?>"></script>
	
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
            $('#datetimepicker1').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });
			
            // Init datetimepicker - inline + range detection
            $('#datetimepicker2').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });

            // Init datetimepicker - inline + range detection
            $('#datetimepicker3').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });
			
            // Init datetimepicker - inline + range detection
            $('#datetimepicker4').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });
			
            // Init datetimepicker - inline + range detection
            $('#datetimepicker5').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });

            // Init datetimepicker - inline + range detection
            $('#datetimepicker6').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });
			
            // Init datetimepicker - inline + range detection
            $('#datetimepicker7').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });
			
            // Init datetimepicker - inline + range detection
            $('#datetimepicker8').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });

            // Init datetimepicker - inline + range detection
            $('#datetimepicker9').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });
			
            // Init datetimepicker - inline + range detection
            $('#datetimepicker10').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });
			
            // Init datetimepicker - inline + range detection
            $('#datetimepicker11').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });

            // Init datetimepicker - inline + range detection
            $('#datetimepicker12').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });
			
            // Init datetimepicker - inline + range detection
            $('#datetimepicker13').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });

            // Init datetimepicker - inline + range detection
            $('#datetimepicker14').datetimepicker({
				format:'DD/MM/YYYY',
                inline: true
            });

            // Form Skin Switcher
            $('#animate-filteredrefund a').on('click', function() {
				$('#animation-switcher').find('a').removeClass('active-animation');
				$(this).addClass('active-animation item-checked');

				// Inline Admin-Form example 
				$.magnificPopup.open({
					removalDelay: 500, //delay removal by X to allow out-animation,
					items: {
						src: '#filteredrefundscreen'
					},
					// overflowY: 'hidden', // 
					callbacks: {
						beforeOpen: function(e) {
							var Animation = 'mfp-zoomIn';
							this.st.mainClass = Animation;
						}
					},
					midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
				});
			});
			
            $('#animate-errorcodesreport a').on('click', function() {
				$('#animation-switcher').find('a').removeClass('active-animation');
				$(this).addClass('active-animation item-checked');

				// Inline Admin-Form example 
				$.magnificPopup.open({
					removalDelay: 500, //delay removal by X to allow out-animation,
					items: {
						src: '#errorcodesreportscreen'
					},
					// overflowY: 'hidden', // 
					callbacks: {
						beforeOpen: function(e) {
							var Animation = 'mfp-zoomIn';
							this.st.mainClass = Animation;
						}
					},
					midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
				});
			});
			
            $('#animate-machinesreport a').on('click', function() {
				$('#animation-switcher').find('a').removeClass('active-animation');
				$(this).addClass('active-animation item-checked');

				// Inline Admin-Form example 
				$.magnificPopup.open({
					removalDelay: 500, //delay removal by X to allow out-animation,
					items: {
						src: '#machinesreportscreen'
					},
					// overflowY: 'hidden', // 
					callbacks: {
						beforeOpen: function(e) {
							var Animation = 'mfp-zoomIn';
							this.st.mainClass = Animation;
						}
					},
					midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
				});
			});
			
            $('#animate-outletreport a').on('click', function() {
				$('#animation-switcher').find('a').removeClass('active-animation');
				$(this).addClass('active-animation item-checked');

				// Inline Admin-Form example 
				$.magnificPopup.open({
					removalDelay: 500, //delay removal by X to allow out-animation,
					items: {
						src: '#outletreportscreen'
					},
					// overflowY: 'hidden', // 
					callbacks: {
						beforeOpen: function(e) {
							var Animation = 'mfp-zoomIn';
							this.st.mainClass = Animation;
						}
					},
					midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
				});
			});
			
            $('#animate-companyreport a').on('click', function() {
				$('#animation-switcher').find('a').removeClass('active-animation');
				$(this).addClass('active-animation item-checked');

				// Inline Admin-Form example 
				$.magnificPopup.open({
					removalDelay: 500, //delay removal by X to allow out-animation,
					items: {
						src: '#companyreportscreen'
					},
					// overflowY: 'hidden', // 
					callbacks: {
						beforeOpen: function(e) {
							var Animation = 'mfp-zoomIn';
							this.st.mainClass = Animation;
						}
					},
					midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
				});
			});
			
            $('#animate-overallrefund a').on('click', function() {
				$('#animation-switcher').find('a').removeClass('active-animation');
				$(this).addClass('active-animation item-checked');

				// Inline Admin-Form example 
				$.magnificPopup.open({
					removalDelay: 500, //delay removal by X to allow out-animation,
					items: {
						src: '#overallrefundscreen'
					},
					// overflowY: 'hidden', // 
					callbacks: {
						beforeOpen: function(e) {
							var Animation = 'mfp-zoomIn';
							this.st.mainClass = Animation;
						}
					},
					midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
				});
			});
			
            $('#animate-overallreport a').on('click', function() {
				$('#animation-switcher').find('a').removeClass('active-animation');
				$(this).addClass('active-animation item-checked');

				// Inline Admin-Form example 
				$.magnificPopup.open({
					removalDelay: 500, //delay removal by X to allow out-animation,
					items: {
						src: '#overallreportscreen'
					},
					// overflowY: 'hidden', // 
					callbacks: {
						beforeOpen: function(e) {
							var Animation = 'mfp-zoomIn';
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