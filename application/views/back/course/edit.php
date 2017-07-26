<script type="text/javascript" src="<?php echo base_url('asset/js/dropzone/dropzone.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/dropzone.min.css') ?>">
<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
<?php echo t_hidden('','id_course',"".$res[0]->id_course."",'ids') ?>
<?php echo t_text('Judul','title',"".$res[0]->title."") ?>
<?php echo t_textarea('Summary','summary',"".$res[0]->summary."") ?>
<?php echo t_editor('Text','content',"".$res[0]->content."") ?> 
<?php echo t_number('Durasi','duration',"".$res[0]->duration."") ?> 
<hr>  
<?php echo t_radio_select('Keterangan','is_publish','1','0','Publish','Draft',$res[0]->is_publish) ?>
<hr> 

<div class="form-group">
	<label class="col-sm-2 control-label form-label">Thumbnail<br>                        
	</label>
	<div class="col-sm-10">
		<?php $get_thumnail=$this->galeri_course->retrieve_thumbnail($res[0]->id_course) ?>
		<?php if ($get_thumnail<>0) { ?>
		<?php foreach ($get_thumnail as $key => $thumb): ?>
			<div class="col-md-4 column productbox" id="rows<?php echo $thumb->id ?>">
				<img src="<?= base_url()."".$thumb->directory."/".$thumb->enc_name."_thumb".$thumb->mime ?>" class="img-media">
				<div class="producttitle"><?php echo $thumb->mime ?></div>
			</div>
		<?php endforeach ?>
		<?php } ?>
	</div>
</div>
<?php echo t_file('Thumbnail Edit<br> <span class=badge>Ukuran gambar ideal <br> 1834px X 1190px</span>','thumbnail','','','changes') ?>
<div class="form-group">
	<label class="col-sm-2 control-label form-label">Media(s)<br>                        
	</label>
	<div class="col-sm-10">
		<?php $get_media=$this->galeri_course->retrieve_all_media($res[0]->id_course) ?>
		<?php if ($get_media<>0) { ?>
		<?php foreach ($get_media as $key => $value): ?>
			<div class="col-md-4 column productbox" id="rows<?php echo $value->id ?>">
				<img src="<?= base_url()."".$value->directory."/".$value->enc_name."_thumb".$value->mime ?>" class="img-media">
				<div class="producttitle"><?php echo $value->mime ?></div>
				<div class="productprice"><div class="pull-right">

					<span class="btn btn-danger btn-sm" role="button" onclick="delete_media(<?php echo $value->id ?>)">
						Delete
					</span>
				</div>
			</div>
			</div>
		<?php endforeach ?>
		<?php } ?>
	</div>
</div>


<div class='form-group'>
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
</div>                            

<div class="form-group">
	<label class="col-sm-2 control-label form-label">Tag<br>                        
	</label>
	<div class="col-sm-10">
		
		<?php if ($course_tag<>0){ ?>
		<?php foreach ($course_tag as $key => $val): ?>
			<label for="<?php echo $val->id_tag ?>" id="tags<?php echo $val->i ?>"> <?php echo $val->name ?> </label> <span id="sp<?php echo $val->i ?>" class="btn btn-xs btn-danger" onclick="dtag(<?php echo $val->i ?>)"> x </span>
		<?php endforeach ?>
		<?php } ?>
		<hr>
		
		<?php if ($tag<>0){ ?>
		<?php foreach ($tag as $key => $tg): ?>
			<div class="checkbox checkbox-success checkbox-inline">
				<input type="checkbox" id="<?php echo $tg->id_tag ?>" value="<?php echo $tg->id_tag ?>"  name='id_tag[]'>
				<label for="<?php echo $tg->id_tag ?>"> <?php echo $tg->name ?> </label>
			</div>
		<?php endforeach ?>
		<?php } ?>
		
	</div>
</div>


<?php $meta = json_decode($res[0]->meta) ?>

<?php echo t_text('Tag Meta','meta',"".$res[0]->meta."") ?> 
<?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>

<script type="text/javascript">

	$("#changes").click(function(){
	    $("#editable").toggle();
	});

	Dropzone.autoDiscover = false;
	var foto_upload= new Dropzone(".dropzone",{
		url: "<?php echo base_url('admin/gallery/upload') ?>",
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
			url: "<?php echo base_url('admin/gallery/remove_upload') ?>",
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

	function delete_media(id){
		if(confirm('Are you sure delete this media?')){
			$.ajax({
				url : "<?php echo site_url('admin/course/delete_media')?>/"+id,
				type: "GET",
				dataType: "JSON",
				success: function(data){
					$('#rows'+id).remove();
				},error: function (jqXHR, textStatus, errorThrown){
					alert('Error deleting data');
				}
			});
		}
	}
	function dtag(id){
		if(confirm('Are you sure delete this tag?')){
			$.ajax({
				url : "<?php echo site_url('admin/course/delete_tag')?>/"+id,
				type: "GET",
				dataType: "JSON",
				success: function(data){
					$('#tags'+id).remove();
					$('#sp'+id).remove();
				},error: function (jqXHR, textStatus, errorThrown){
					alert('Error deleting data');
				}
			});
		}
	}
</script>


<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>