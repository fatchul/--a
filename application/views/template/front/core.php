<?php $this->load->view('template/front/header'); ?>
<?php $this->load->view('template/front/menu'); ?>
<div id="banner" class="banner-page" style="background-image: url('http://localhost/development-workflow/asset/images/banner.jpg')">
	<div class="banner-caption" >
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 object-non-visible" data-animation-effect="fadeIn">

				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view($body); ?>	 
<?php $this->load->view('template/front/footer'); ?>
<?php if ($script){ ?>
	<?php $this->load->view('template/front/script') ?>			
<?php } ?>
