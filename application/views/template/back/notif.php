	<style type="text/css">
		.pojok{
			position:fixed;
			bottom: 0px;
			right: 10px;
			float: right;
		}
	</style>
	<div class="pojok" id="alertbottomright">
		<?php if($this->session->flashdata('sukses')) { ?>
			<div class="kode-alert kode-alert-icon alert1-light">
				<i class="fa fa-check"></i>
				<a href="#" class="closed">&times;</a>
				<?php echo $this->session->flashdata('sukses'); ?>           
			</div>
		<?php } ?>
		<?php if($this->session->flashdata('gagal')) { ?>
		<div class="kode-alert kode-alert-icon alert9-light">
			<i class="fa fa-warning"></i>
			<a href="#" class="closed">&times;</a>
			<?php echo $this->session->flashdata('gagal'); ?>           
		</div>
		<?php } ?>
	</div>
	<script>
		var close = document.getElementsByClassName("closebtn");
		var i;

		for (i = 0; i < close.length; i++) {
			close[i].onclick = function(){
				var div = this.parentElement;
				div.style.opacity = "0";
				setTimeout(function(){ div.style.display = "none"; }, 600);
			}
		}
	</script>

	<script type="text/javascript">$(document).ready(function() {$('#alertbottomright').click();$("#alertbottomright").fadeIn(5000);$('#alertbottomright').click();$("#alertbottomright").fadeOut(5000);});</script>