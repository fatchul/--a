<?php 
if ($status==='1'){
	$set="Sukses";
	$msg="Registrasi berhasil, silahkan periksa email anda";
}
elseif ($status==='0'){
	$set="Gagal";	
	$msg="Email sudah terdaftar";
}
elseif ($status==='2'){
	$set="Gagal";	
	$msg="Email tidak terkirim, periksa alamat email anda";
}
elseif ($status==='3'){
	$set="Gagal";	
	$msg="Validasi captcha terlebih dahulu";
}
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title" id="project-12-label"><?php echo $set ?></h4>
</div>
<div class="modal-body">
	<!-- <h3>Project Description</h3> -->
	<div class="row">
		<div class="col-md-12">
			<p align="center"><?php echo $msg ?></p>
		</div>							
	</div>
</div>
<div class="modal-footer">
	<!-- <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button> -->
</div>