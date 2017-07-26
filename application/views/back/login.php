<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link href="<?= base_url(); ?>asset/css/bootstrap.css" rel="stylesheet"> 
	<link href="<?= base_url(); ?>asset/css/appsroot.css" rel="stylesheet">  
	<link rel="shortcut icon" href="<?= base_url() ?>asset/images/ico_logo.png">
	<meta name="robots" content="noindex, nofollow">
	<script type="text/javascript" src="<?= base_url(); ?>asset/js/jquery.min.js"></script>
	<style type="text/css">
		@import url(http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700,100);
		body {
		    font-family: 'Roboto', sans-serif;
		    background: ;
		    position: relative;
		    font-weight: 400px;
		}
		.form-signin
		{
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
		.form-signin .form-signin-heading, .form-signin .checkbox
		{
			margin-bottom: 10px;
		}
		.form-signin .checkbox
		{
			font-weight: normal;
		}
		.form-signin .form-control
		{
			position: relative;
			font-size: 16px;
			height: auto;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}
		.form-signin .form-control:focus
		{
			z-index: 2;
		}
		.form-signin input[type="text"]
		{
			margin-bottom: -1px;
			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
		}
		.form-signin input[type="password"]
		{
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
		.account-wall
		{
			margin-top: 20px;
			padding: 40px 0px 20px 0px;
			background-color: #f7f7f7;
			-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		}
		.login-title
		{
			
			margin: 0 auto 10px;
			display: block;
			
		}
		.profile-img
		{
			width: 96px;
			height: 96px;
			margin: 0 auto 10px;
			display: block;
			-moz-border-radius: 50%;
			-webkit-border-radius: 50%;
			border-radius: 50%;
		}
		.need-help
		{
			margin-top: 10px;
		}
		.new-account
		{
			display: block;
			margin-top: 10px;
		}
	</style>
</head>

<body>
	<div class="container">
		<br><br>
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				
				<div class="account-wall">
					<img class="profile-img" src="<?= base_url(); ?>asset/images/ico_sm.png"
					alt="">
					
					<?php echo form_open(base_url(uri_string()), array('method' => 'POST', 'id' =>'createform','class'=>'form-signin')); ?>
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<input type="text" class="form-control" placeholder="Email" name="username" autocomplete="off"  required autofocus value="<?php echo $user ?>"> <br>
						<input type="password" class="form-control" name="password" placeholder="Password" required value="<?php echo $pass ?>">
						<button class="btn btn-lg btn-warning btn-block" type="submit" name="sign" id="submit" value="1">
							Sign in</button>
							<!-- <a href="login/forgot" class="pull-right need-help">Forgot your password? </a><span class="clearfix"></span> -->
						</form>
					</div>
					<span class="text-center new-account">2017 <a href="<?php echo base_url() ?>">Arkana</a> </span>

				</div>
			</div>
		</div>
	</body>	
	</html>
	<?php $this->load->view('template/back/notif') ?>
	<script type="text/javascript">
		var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
		$('#createform').on('submit', function(e)
	    {    	
	    	$.post( csrf_value, $('#createform').serialize(), function( response ) {		    
			}, 'json' );       
	    });	   
	</script>
	