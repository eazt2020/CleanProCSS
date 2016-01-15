<!DOCTYPE html>
<html>
<head>
    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/skin/default_skin/css/theme.css'); ?>">

</head>

<body class="invoice-page">
		<div class="panel-body p20" id="invoice-item">
			<div class="row mb30">
				<div class="col-md-4">
					<div class="pull-left">
						<h1 class="lh10 mt10"> OVERALL REPORT </h1>
						<h5 class="mn"> Created: Nov 23 2013 </h5>
						<h5 class="mn"> Status: <b class="text-success">Paid - On Time</b> </h5>
					</div>
				</div>
				<div class="col-md-4"> <img src="<?php echo base_url('assets/img/logo.png'); ?>" class="img-responsive center-block mt10 mw200 hidden-xs" alt="AdminDesigns"> </div>
			</div>
			<div class="row" id="invoice-table">
				<div class="col-md-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Item</th>
								<th>Description</th>
								<th style="width: 135px;">#</th>
								<th>Rate</th>
								<th class="text-right pr10">Price</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><b>3</b>
								</td>
								<td>Net Code Revamp</td>
								<td>Worked on Design and Structure (per hour)</td>
								<td>16</td>
								<td>$35.00</td>
								<td class="text-right pr10">$560.00</td>
							</tr>
							<tr>
								<td><b>1</b>
								</td>
								<td>Developer Newsletter </td>
								<td>Year Subscription X2</td>
								<td>2</td>
								<td>$12.99</td>
								<td class="text-right pr10">$25.98</td>
							</tr>
							<tr>
								<td><b>3</b>
								</td>
								<td>Admin Dashboard</td>
								<td>Design and implemention(per hour)</td>
								<td>16</td>
								<td>$35.00</td>
								<td class="text-right pr10">$560.00</td>
							</tr>
							<tr>
								<td><b>3</b>
								</td>
								<td>Web Development</td>
								<td>Worked on Design and Structure (per hour)</td>
								<td>23</td>
								<td>$30.00</td>
								<td class="text-right pr10">$690.00</td>
							</tr>
							<tr>
								<td><b>1</b>
								</td>
								<td>Developer Newsletter </td>
								<td>Year Subscription X2</td>
								<td>2</td>
								<td>$12.99</td>
								<td class="text-right pr10">$25.98</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row" id="invoice-footer">
				<div class="col-md-12">
					<div class="pull-right">
						<table class="table" id="invoice-summary">
							<thead>
								<tr>
									<th><b>Sub Total:</b>
									</th>
									<th>$1375.98</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><b>Payments</b>
									</td>
									<td>(-)0.00</td>
								</tr>
								<tr>
									<td><b>Total</b>
									</td>
									<td>$230.00</td>
								</tr>
								<tr>
									<td><b>Balance Due:</b>
									</td>
									<td>$1375.98</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery-1.11.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('vendor/jquery/jquery_ui/jquery-ui.min.js') ?>"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js') ?>"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/utility/utility.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/demo.js') ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Demo JS 
            Demo.init();


        });
    </script>
    <!-- END: PAGE SCRIPTS -->
</body>
</html>