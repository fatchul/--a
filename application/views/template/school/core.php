<?php $this->load->view('template/back/header'); ?>
<!-- <div class="loading"><img src="<?= base_url(); ?>assets/back/img/loading.gif" alt="loading-img"></div> -->
<div id="loading" class="loading" style="display: none;">Wait</div>
<?php $this->load->view('template/school/top'); ?>
<?php $this->load->view('template/school/menu'); ?>

<div class="content">
	<?php $this->load->view('template/back/breadcumb'); ?>
	<?php $this->load->view($body); ?>	 		
</div>

<?php //$this->load->view('template/back/tab-panel'); ?>

<?php $this->load->view('template/back/notif') ?>
<!--  -->
<?php $this->load->view('template/back/script'); ?>
</body>
</html>
