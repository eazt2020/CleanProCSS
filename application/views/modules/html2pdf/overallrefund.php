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
				<div class="col-md-6">
					<div class="pull-left">
						<h1 class="lh10 mt10">OVERALL REFUND</h1>
					</div>
				</div>
				<div class="col-md-6">
					<div class="pull-right">
						<h5 class="lh10 mt10"><?php echo 'Report date from '.date("d/m/Y",$datefr00).' to '.date("d/m/Y",$dateto00);?></h5>
					</div>
				</div>
			</div>
			<div class="row" id="invoice-table">
				<div class="col-md-12">
					<table class="tg" width='100%'>
						<tr>
							<th class="tg-ng14" width='50px'>No.</th>
							<th class="tg-ng14" width='100px'>Outlet ID</th>
							<th class="tg-ng14">Outlet Name<br></th>
							<th class="tg-ng14" width='120px'>Sum Refunded (RM)<br></th>
						</tr>
						<?php $calt = 0; foreach($tickets as $row) {
							$calt++;
							echo '<tr>';
							echo '<td class="tg-ng14">'.$calt.'</td>';
							echo '<td class="tg-ng14">'.$row['id'].'</td>';
							echo '<td class="tg-0bri">'.strtoupper($row['name']).'</td>';
							echo '<td class="tg-ng14">'.$row['total'].'</td>';
							echo '</tr>';
						}?>
					</table>
					<br>
					<table class="tl" width='100%' border=0>
						<tr>
							<td align="right">Total refund for all outlets (RM):</td>
							<td class="tl-ng14" width="120px"><?php echo $total; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
    </div>

</body>
</html>