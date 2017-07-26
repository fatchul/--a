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
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Database Error</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
	<div id="container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div>
</body>
</html>

	<?php
	}
?>
