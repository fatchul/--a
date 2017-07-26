<script type="text/javascript" src="<?php echo base_url('asset/js/dropzone/dropzone.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/dropzone.min.css') ?>">

<?php echo open_bootstrap(); ?>
<?php //echo $title ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
<?php //echo $hidden ?>
<?php echo t_hidden('','id_silabus',"".$res[0]->id_silabus."",'ids') ?>
<?php //echo $course_id ?>
<?php echo t_text('Materi Ke','no_urut',"".$res[0]->no_urut."") ?>
<?php echo t_text('Judul Bahasan','title',"".$res[0]->title_silabus."") ?>
<?php echo t_editor('Summary','summary',"".$res[0]->summary_silabus."",'',tooltip_for_ckeditor()) ?>
<?php echo t_editor('Bahasan','content',"".$res[0]->content_silabus."",'',tooltip_for_ckeditor()) ?> 

<hr>  
<?php echo t_radio_select('Keterangan','is_publish','1','0','Publish','Draft',$res[0]->is_publish) ?>
<hr>   
 
<!-- <div class='form-group'>
	<label class='col-sm-2 control-label form-label'>Media</label>
	<div class='col-sm-8'>
		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Upload Media</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Pilih Foto</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					<div class="dropzone">
						<div class="dz-message">
							<h3> Klik atau Drop file disini</h3>
						</div>
					</div>    
					<span class='help-block'></span>
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">
					<span class="btn btn-warning btn-xs" onclick="reload_table()">REFRESH</span>
					<br><br>
					<div class="table-responsive">
					  <table id="table" class="table" cellspacing="0" width="100%">
					  <thead>
					    <tr>
					      <th>Thumbnail</th>					      
					      <th>Note</th>
					      <th>Mime</th>      
					      <th>Pilih</th>
					    </tr>
					  </thead>
					  <tbody>
					  </tbody>  
					</table>
					</div>
				</div>
			</div>
		</div>  
	</div>
</div>   -->                          

<?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>

<script type="text/javascript">

	Dropzone.autoDiscover = false;

	var foto_upload= new Dropzone(".dropzone",{
		url: "<?php echo base_url('admin/gallery/upload/silabus') ?>",
		method:"post",
		paramName:"userfile",
		dictInvalidFileType:"Type file ini tidak dizinkan",
		addRemoveLinks:true,
	});

	foto_upload.on("sending",function(a,b,c){
		id=document.getElementById("ids").value;

		a.token=Math.random();
	  	c.append("token_foto",a.token); 
	  	c.append("note",'');
	  	c.append("id_gallery",'');
	  	c.append("id_course",id);
	  	
	  });

	foto_upload.on("removedfile",function(a){
		var token=a.token;
		$.ajax({
			type:"post",
			data:{token:token},
			url: "<?php echo base_url('admin/gallery/remove_upload_course') ?>",
			cache:false,
			dataType: 'json',
			success: function(){
				console.log("Foto terhapus");
			},
			error: function(){
				console.log("Error");

			}
		});
	});

	function reload_table()
	  {
	      table.ajax.reload(null,false); 
	  }

	 var table;

	  $(document).ready(function() {
	    table = $('#table').DataTable({ 

	        "processing": true, 
	        "serverSide": true, 
	        "order": [], 
	        
	        "ajax": {
	            "url": "<?php echo site_url('admin/gallery/list_of_choose')?>",
	            "type": "GET"
	        },

	        "columnDefs": [
	        { 
	            "targets": [ -1 ],
	            "orderable": false,
	        },
	        ],
	    });
	});
</script>


<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>
