<!DOCTYPE html>
<html>
<head>
    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/skin/default_skin/css/theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/html2pdf.css");?>">

</head>

<body>
		<div class="panel-body p20" id="invoice-item">
			<div class="row mb30">
				<div class="col-md-4">
					<div class="pull-left">
						<h1 class="lh10 mt10">FILTERED REFUND REPORT</h1>
					</div>
				</div>
			</div>
			<br>
			<h5>Refunded Tickets</h5>
			<div class="row" id="invoice-table">
				<div class="col-xs-12">
					<table class="tg" width='100%'>
						<tr>
							<th class="tg-ng14" width='50px'>No.</th>
							<th class="tg-ng14" width='100px'>Ticket ID</th>
							<th class="tg-ng14">Ticket Creation Date</th>
							<th class="tg-ng14">Customer Name</th>
							<th class="tg-ng14">Contact No.</th>
							<th class="tg-ng14">Status</th>
							<th class="tg-ng14">Person In Charge</th>
							<th class="tg-ng14" width='100px'>Refund Amount<br></th>
						</tr>
						<?php $calt = 0; $total = 0; foreach($refprm00 as $refprm10) {
							$calt++;
							echo '<tr>';
							echo '<td class="tg-ng14">'.$calt.'</td>';
							echo '<td class="tg-ng14">'.$refprm10['id'].'</td>';
							echo '<td class="tg-ng14">'.date("d/m/Y",$refprm10['crDate']).'</td>';
							echo '<td class="tg-ng15">'.strtoupper($refprm10['name']).'</td>';
							echo '<td class="tg-ng14">'.$refprm10['contact'].'</td>';
							echo '<td class="tg-ng14">'.strtoupper($refprm10['status']).'</td>';
							echo '<td class="tg-ng15">'.strtoupper($refprm10['pic']).'</td>';
							echo '<td class="tg-ng14">'.$refprm10['amount'].'</td>';
							echo '</tr>';
						}?>
					</table>
					<br>
					<table class="tl" width='100%' border=0>
						<tr>
							<td align="right">Total Refunded amount:</td>
							<td class="tl-ng14" width="100px"><?php echo $totalr00; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<br>
			<h5>Not Refunded Tickets</h5>
			<div class="row" id="invoice-table">
				<div class="col-xs-12">
					<table class="tg" width='100%'>
						<tr>
							<th class="tg-ng14" width='50px'>No.</th>
							<th class="tg-ng14" width='100px'>Ticket ID</th>
							<th class="tg-ng14">Ticket Creation Date</th>
							<th class="tg-ng14">Customer Name</th>
							<th class="tg-ng14">Contact No.</th>
							<th class="tg-ng14">Status</th>
							<th class="tg-ng14">Person In Charge</th>
							<th class="tg-ng14" width='100px'>Refund Amount<br></th>
						</tr>
						<?php $calt = 0; $total = 0; foreach($refprm01 as $refprm11) {
							$calt++;
							echo '<tr>';
							echo '<td class="tg-ng14">'.$calt.'</td>';
							echo '<td class="tg-ng14">'.$refprm11['id'].'</td>';
							echo '<td class="tg-ng14">'.date("d/m/Y",$refprm11['crDate']).'</td>';
							echo '<td class="tg-ng15">'.strtoupper($refprm11['name']).'</td>';
							echo '<td class="tg-ng14">'.$refprm11['contact'].'</td>';
							echo '<td class="tg-ng14">'.strtoupper($refprm11['status']).'</td>';
							echo '<td class="tg-ng15">'.strtoupper($refprm11['pic']).'</td>';
							echo '<td class="tg-ng14">'.$refprm11['amount'].'</td>';
							echo '</tr>';
						}?>
					</table>
					<br>
					<table class="tl" width='100%' border=0>
						<tr>
							<td align="right">Total Not Refunded amount:</td>
							<td class="tl-ng14" width="100px"><?php echo $totalr01; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
    </div>

</body>
</html>