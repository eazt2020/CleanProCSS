<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php echo $headervw; ?>
<?php echo $sidebrvw; ?>
<?php echo $contntvw; ?>