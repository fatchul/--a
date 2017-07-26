<?php if ($param == 1): ?>
	<div id="alertbottomright" class="kode-alert kode-alert-img alert3 kode-alert-bottom-right">	
		<img src="<?= base_url(); ?>assets/back/img/success.png" class="img" alt="img">
		<a href="#" class="closed">&times;</a>
		<span>Message</span>
		<h4><?php echo $message ?></h4>
	</div>	
<?php else: ?>
	<div id="alertbottomright" class="kode-alert kode-alert-img alert6 kode-alert-bottom-right">	
		<!-- <img src="img/profileimg.png" class="img" alt="img"> -->
		<a href="#" class="closed">&times;</a>
		<a href="#">Error</a>
		<h4><?php echo $message ?></h4>
	</div>	
<?php endif ?>
<script type="text/javascript">$(document).ready(function() {$('#alertbottomright').click();$("#alertbottomright").fadeIn(1550);$('#alertbottomright').click();$("#alertbottomright").fadeOut(2000000);});</script>


<!-- <?php if ($this->session->flashdata('1')) { ?>
	<div id="alertbottomright" class="kode-alert kode-alert-img alert3 kode-alert-bottom-right">	
		<img src="<?= base_url(); ?>assets/back/img/success.png" class="img" alt="img">
		<a href="#" class="closed">&times;</a>
		<span>Message</span>
		<h4><?php echo $message ?></h4> 
		<h4><?php echo $this->session->flashdata('1'); ?></h4>
	</div>	
	<script type="text/javascript">$(document).ready(function() {$('#alertbottomright').click();$("#alertbottomright").fadeIn(1550);$('#alertbottomright').click();$("#alertbottomright").fadeOut(2000);});</script>
<?php } ?>
<?php if ($this->session->flashdata('0')) { ?>
	<div id="alertbottomright" class="kode-alert kode-alert-img alert3 kode-alert-bottom-right">	
		<img src="img/profileimg.png" class="img" alt="img">
		<a href="#" class="closed">&times;</a>
		<h4><?php echo $message ?></h4>
		<h4><?php echo $this->session->flashdata('0'); ?></h4>
		<a href="#">Send a Message</a>
	</div>	
	<script type="text/javascript">$(document).ready(function() {$('#alertbottomright').click();$("#alertbottomright").fadeIn(1550);$('#alertbottomright').click();$("#alertbottomright").fadeOut(2000);});</script>
<?php } ?> -->

