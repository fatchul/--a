
<div class="section">
	<div class="container">
		<h1 class="text-center title" id="portfolio">Lupa Kata Sandi</h1>
		<div class="separator"></div>
		<p class="lead text-center">insert your email address.<br> a forgot password link will be sent to your email.</p>
		<br>			
		<div class="row object-non-visible" data-animation-effect="fadeIn">
			<div class="col-md-4 col-md-offset-4">
				
				<?php echo form_open('',"role='form'") ?>
					<div class="form-group has-feedback">
					<label class="sr-only" for="name2">Email</label>
						<input type="text" class="form-control" id="name2" placeholder="Email" name="uname" required>
						<i class="fa fa-user form-control-feedback"></i>
					</div>
					<div class="text-centert">
						<input type="submit" name="btn-forgot" value="Submit" class="btn-default btn-x text-center">				
					</div>
					<div class="pojok" id="alertbottomright">
						<br><br>
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
				</form>
			</div>
		</div>
	</div>
</div>