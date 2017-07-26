<script type="text/javascript" src="<?php echo base_url('asset/js/dropzone/dropzone.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/dropzone.min.css') ?>">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/basic.min.css') ?>"> -->
<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
<?php //echo t_hidden('','id_gallery',curtime(),'ids') ?>
<?php echo t_text('Catatan','note','','note') ?>
<div class='form-group'>
	<label class='col-sm-2 control-label form-label'>Media</label>
	<div class='col-sm-8'>
		<div class="dropzone">
			<div class="dz-message">
				<h3> Klik atau Drop file disini</h3>
			</div>
		</div>    
		<span class='help-block'></span>
	</div>                            
</div>


<?php //echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>

<script type="text/javascript">
	
	Dropzone.autoDiscover = false;

	var foto_upload= new Dropzone(".dropzone",{
		url: "<?php echo base_url('admin/gallery/upload') ?>",
		//maxFilesize: 15,
		method:"post",
		//acceptedFiles:"image/*,application/pdf,video/*",
		paramName:"userfile",
		dictInvalidFileType:"Type file ini tidak dizinkan",
		addRemoveLinks:true,
	});


	//Event ketika Memulai mengupload
	foto_upload.on("sending",function(a,b,c){
		note=document.getElementById("note").value;
		a.token=Math.random();
	  	c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
	  	c.append("note",note);
	  	c.append("id_gallery",'');
	  	
	});


	//Event ketika foto dihapus
	foto_upload.on("removedfile",function(a){
		var token=a.token;
		$.ajax({
			type:"post",
			data:{token:token},
			url: "<?php echo base_url('admin/gallery/remove_upload') ?>",
			cache:false,
			dataType: 'json',
			success: function(){
				$("#notif").modal('show');
			},
			error: function(){
				console.log("Error");

			}
		});
	});


</script>