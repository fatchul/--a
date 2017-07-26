<?php $this->load->view('template/back/header'); ?>
<div id="loading" class="loading" style="display: none;">Wait</div>
<?php $this->load->view('template/teacher/top'); ?>
<?php $this->load->view('template/teacher/menu'); ?>
<div class="content">
	<?php $this->load->view('template/back/breadcumb'); ?>
	<?php $this->load->view($body); ?>	 		
</div>
<?php $this->load->view('template/back/notif') ?>
<?php if ($script){ ?>
	<?php $this->load->view('template/front/script') ?>		
<?php } ?>

</body>
</html>
