<?php $this->load->view('template/back/header'); ?>
<div id="loading" class="loading" style="display: none;">Wait</div>
<?php $this->load->view('template/back/top'); ?>
<?php $this->load->view('template/back/menu'); ?>

<div class="content">
	<?php $this->load->view('template/back/breadcumb'); ?>
	<?php $this->load->view($body); ?>	 	
</div>

<?php $this->load->view('template/back/notif') ?>
<?php $this->load->view('template/back/script'); ?>
</body>
</html>
