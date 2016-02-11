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
						<h1 class="lh10 mt10">ERROR CODES REPORT</h1>
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
					<table class="tg" width="100%">
					<tr>
					<th class="tg-ng14" width="100">Error Code<br></th>
					<th class="tg-ng14">Description<br></th>
					<th class="tg-ng14" width="120px">Total Error<br></th>
					</tr>
					<?php $calt00 = 0; foreach($errors0 as $row01) {
						$calt01++;
						$calt02 = 0;
						echo '<tr>';
						echo '<td class="tg-ng14">'.$row01['id'].'</td>';
						echo '<td class="tg-0bri">'.strtoupper($row01['name']).'</td>';
						echo '<td class="tg-ng14">'.$row01['total'].'</td>';
						echo '</tr>';
					}?>
					</table>
					<br>
					<table class="tl" width='100%' border=0>
						<tr>
							<td align="right">Total Error Occured:</td>
							<td class="tl-ng14" width="120px"><?php echo $totale0; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
    </div>
</body>
</html>