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
						<h1 class="lh10 mt10">MACHINES REPORT</h1>
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
					<?php $calt00 = 0; foreach($outlet0 as $row00) {
						$calt00++;
						echo '<table class="tg" width="100%">';
						echo '<tr>';
						echo '<th class="tg-ng15" colspan="5">Outlet Name: '.strtoupper($row00['name']).'</th>';
						echo '</tr>';
						echo '<tr>';
						echo '<th class="tg-ng14" width="100px">Machine ID<br></th>';
						echo '<th class="tg-ng14" width="300px">Machine Name<br></th>';
						echo '<th class="tg-ng14" width="100px">Error ID<br></th>';
						echo '<th class="tg-ng14">Error Details<br></th>';
						echo '<th class="tg-ng14" width="120px">Occurence<br></th>';
						echo '</tr>';
						$calt03 = 0;
						$calt01 = 0;
						foreach($machi00 as $row01) {
							$calt01++;
							if ($row00['id'] == $row01['outletId']) {
								echo '<tr>';
								echo '<td class="tg-ng14">'.$row01['machId'].'</td>';
								echo '<td class="tg-0bri">'.strtoupper($row01['name']).'</td>';
								echo '<td class="tg-ng14">'.$row01['error'].'</td>';
								echo '<td class="tg-0bri">'.strtoupper($row01['errorname']).'</td>';
								echo '<td class="tg-ng14">'.$row01['total'].'</td>';
								echo '</tr>';
								$calt03++;
							}
						}
						if ($calt03 > 0) {
							echo '<tr>';
							echo '<td class="tg-ng16" colspan="4" align="right">Total Occurence:</td>';
							echo '<td class="tg-ng14">'.$row00['total'].'</td>';
							echo '</tr>';
						}
						if ($calt03 == 0){
							echo '<tr>';
							echo '<td class="tg-ng14" colspan="5">NO DATA AVAILABLE</td>';
							echo '</tr>';
						}		
						echo '</table>';
						echo '<br>';
					}?>
				</div>
			</div>
		</div>
    </div>

</body>
</html>