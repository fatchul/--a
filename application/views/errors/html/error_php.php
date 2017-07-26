<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<?php 
	if(ENVIRONMENT==='production'){
		?>

			<?php 
			$root = 'http://' . $_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
			?>
			<!DOCTYPE html>
			<html lang="en">
				<head>
					<meta charset="utf-8">
					<title>404 Not Found</title>
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta name="robots" content="noindex, nofollow">
					<link rel="shortcut icon" href="<?= $root ?>asset/images/ico_logo.png">		
					<link href="<?= $root ?>asset/css/root.css" rel="stylesheet">
				</head>

				<body class="no-trans">
					
					<header class="header fixed clearfix navbar navbar-fixed-top text-center">
						<div class="container">
							<div class="row">
								<div class="col-md-4">
									<div class="header-left">
										<div class="logo smooth-scroll">
											<a href="#banner"><img style="margin-right: 0px;" id="logo" src="<?= $root ?>asset/images/ico_logo.png" alt="Arkademy"></a>
										</div>
										
									</div>
								</div>
								<div class="col-md-8">
									<div class="header-right clearfix">
										<div class="main-navigation animated">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</header>
					
							<br><br><br><br>
							<div class="section" style="background-color: #ffffff">
								<div class="container">
									<div class="col-md-12" align="center" class="text-center">
										
										<H3>404 NOT FOUND</H3>

										<h4>Halaman tidak di temukan</h4>
										<a href="<?= $root ?>" class="btn btn-primary">Back To Home</a>
									</div>
								</div>
							</div>
						
				
					
					
					<footer id="footers">

					
						<div class="subfooter">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<p class="text-center">Copyright © 2017 by <a target="_blank" href="">Arkana IoT Platform</a>.</p>
									</div>
								</div>
							</div>
						</div>
					</footer>
					<script type="text/javascript" src="<?= $root ?>asset/js/bootstrap.min.js"></script>
					<script type="text/javascript" src="<?= $root ?>asset/js/custom.js"></script>

				</body>
			</html>


		<?php
	}else{
		?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: <?php echo $severity; ?></p>
<p>Message:  <?php echo $message; ?></p>
<p>Filename: <?php echo $filepath; ?></p>
<p>Line Number: <?php echo $line; ?></p>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

	<p>Backtrace:</p>
	<?php foreach (debug_backtrace() as $error): ?>

		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

			<p style="margin-left:10px">
			File: <?php echo $error['file'] ?><br />
			Line: <?php echo $error['line'] ?><br />
			Function: <?php echo $error['function'] ?>
			</p>

		<?php endif ?>

	<?php endforeach ?>

<?php endif ?>

</div>

		<?php
	}
?>
