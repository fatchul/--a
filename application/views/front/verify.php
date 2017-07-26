
<div class="section">
	<div class="container">
		<h1 class="text-center title" id="portfolio">Reset Password</h1>
		<div class="separator"></div>
		<br>			
		<div class="row object-non-visible" data-animation-effect="fadeIn">
			<div class="col-md-4 col-md-offset-4">

				<?php echo form_open(base_url(uri_string()),"role='form'") ?>
					
					<div class="form-group has-feedback">
						<label class="sr-only" for="email2">Password</label>
						<input type="password" class="form-control" id="email2" placeholder="Password" name="upassw" required>
						<i class="fa fa-key form-control-feedback"></i>
					</div>
					<div class="form-group has-feedback">
						<label class="sr-only" for="email2">Konfirmasi Password</label>
						<input type="password" class="form-control" id="email2" placeholder="Konfirmasi" name="passwkonf" required>
						<i class="fa fa-key form-control-feedback"></i>
					</div>					
					<input type="submit" value="Submit" class="btn btn-default" name="tok">
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