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
						<h1 class="lh10 mt10">COMPANY REPORT</h1>
					</div>
				</div>
			</div>
			<div class="row" id="invoice-table">
				<div class="col-md-12">
					<?php $calt00 = 0; foreach($company as $row00) {
						$calt00++;
						echo '<table class="tg" width="100%">';
						echo '<tr>';
						echo '<th class="tg-ng15" colspan="2">Company Name: '.strtoupper($row00['name']).'</th>';
						echo '</tr>';
						echo '<tr>';
						echo '<th class="tg-ng15">Outlet Name<br></th>';
						echo '<th class="tg-ng14" width="120px">Total Refund (RM)<br></th>';
						echo '</tr>';
						
						$calt01 = 0;
						foreach($outlet0 as $row01) {
							$calt01++;
							if ($row00['id'] == $row01['compId']) {
								echo '<tr>';
								echo '<td class="tg-ng15">'.strtoupper($row01['name']).'</td>';
								echo '<td class="tg-ng14">'.$row01['total'].'</td>';
								echo '</tr>';
							}
							else {
								echo '<tr>';
								echo '<td class="tg-0bri" colspan="2">NO DATA AVAILABLE</td>';
								echo '</tr>';
							}
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