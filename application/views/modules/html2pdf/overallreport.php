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
						<h1 class="lh10 mt10">OVERALL REPORT</h1>
					</div>
				</div>
			</div>
			<div class="row" id="invoice-table">
				<div class="col-md-12">
					<table class="tg" width='100%'>
						<tr>
							<th class="tg-ng14" width='50px'>No.</th>
							<th class="tg-ng14" width='100px'>ID</th>
							<th class="tg-ng14">Outlet Name<br></th>
							<th class="tg-ng14" width='100px'>Total Error<br></th>
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
							<td align="right">Total Error for all outlets:</td>
							<td class="tl-ng14" width="100px"><?php echo $total; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
    </div>

</body>
</html>