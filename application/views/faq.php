<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<!DOCTYPE html>
<html><head></head><body><?php $calt = 0; foreach($faqscr00 as $faqscr01) {$calt++;echo base64_decode($faqscr01['content']);}?></body></html>