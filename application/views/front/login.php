
<div class="section">
	<div class="container">

		<h1 style="margin-top: 2em" class="text-center title" id="portfolio">Login</h1>
		<p class="text-muted lead text-center">Use your login credentials or <br> please contact <span title="arkanaplatform@gmail.com">administrator</span> for new user registration.</p>

		<br>			
		<div class="row object-non-visible" data-animation-effect="fadeIn">
			<div class="col-md-4 col-md-offset-4">
				
				<?php echo form_open('',"role='form'") ?>
					<div class="form-group has-feedback">
					<label class="sr-only" for="name2">Email </label>
						<input type="text" value="" class="form-control" id="name2" placeholder="Email" name="uname"  >
						<i class="fa fa-user form-control-feedback"></i>
					</div>
					<div class="form-group has-feedback">
						<label class="sr-only" for="email2">Password</label>
						<input type="password" class="form-control" id="email2" placeholder="Password" name="upassw" required value="">
						<i class="fa fa-key form-control-feedback"></i>
					</div>								
					<div class="form-group has-feedback" style="display: none">	
						<input type="checkbox" name="remember" checked=""> Remember Me
					</div>
					
					<input type="submit" value="Sign In" name="btn-login" class="button button-rounded">
					<span class="pull-right" >&nbsp <a href="<?= base_url() ?>forgot" class="span-danger">Lupa Password?</a></span>					

					

					<div class="pojok" id="alertbottomright">
						<br>
						<?php if($this->session->flashdata('sukses')) { ?>
							<div class="notice notice-sukses">								
						        <strong><?php echo $this->session->flashdata('sukses') ?></strong>
						    </div>	
						<?php } ?>
						<?php if($this->session->flashdata('gagal')) { ?>
							<div class="notice notice-danger">
						        <strong><?php echo $this->session->flashdata('gagal') ?></strong>
						    </div>	
						<?php } ?>
					</div>
				<?php echo form_close() ?>
			</div>

			
		</div>
	</div>
</div>