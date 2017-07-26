<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title><?php echo (isset($seo)) ? $seo : "Arkademy | IoT Learning Academy"; ?></title>
		<meta name="description" content="<?php echo $meta_desc ?>">
		<meta name="keywords" content="<?php echo $meta_key ?>">
		<meta name="robots" content="index, follow">
		<meta name="author" content="Arkademy | IoT Learning Academy">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="<?= base_url() ?>asset/images/ico.png">		
		<link href="<?= base_url() ?>asset/css/root.css" rel="stylesheet">
		<script type="text/javascript" src="<?= base_url() ?>asset/plugins/jquery.min.js"></script>
		
		<?php echo $g_a ?>
	</head>

	<body class="no-trans">
		<div class="loading" style="display: none"></div>