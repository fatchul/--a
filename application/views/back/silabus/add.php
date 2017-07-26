<script type="text/javascript" src="<?php echo base_url('asset/js/dropzone/dropzone.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/dropzone.min.css') ?>">
<style type="text/css">
	.affix {
    top:200px;
    right:0;
    position:fixed;
    z-index: 1000;
    width: 200px;
}
</style>


<div class="row hidden-xs">
	<div class="col-lg-2">
		<div class="affix">           
			<div class="panel-group">
				<div class="panel panel-default">
					<?php $no=0; if ($all_silabus<>0): ?>
						<?php foreach ($all_silabus as $key => $value): $no++; ?>
							<div class="panel-body"><b>Part <?php echo $value->no_urut ?>. <?php echo $value->title_silabus ?></b> <a href="<?php echo site_url("admin/silabus/view/".$value->id_silabus) ?>" target="_blank" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp<a href="<?php echo site_url("admin/silabus/edit/".$value->id_silabus) ?>" target="_blank" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a></div>		
						<?php endforeach ?>
					<?php endif ?>
				</div>
			</div>			
		</div>
	</div>

</div>



<?php echo open_bootstrap(); ?>
<?php echo $title ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
<?php echo $hidden ?>
<?php echo t_hidden('','id_silabus',"".has(10)."",'ids') ?>
<?php echo $course_id ?>
<?php echo $materi_ke ?>
<?php echo t_text('Judul Bahasan','title') ?>
<?php echo t_editor('Summary','summary','','',tooltip_for_ckeditor()) ?>
<?php echo t_editor('Bahasan','content','','contents',tooltip_for_ckeditor()) ?> 

<hr>  
<?php echo t_radio('Keterangan','is_publish','1','0','Publish','Draft') ?>
<hr>                      

<?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>
<script type="text/javascript">
	$(document).ready(function () {                            
        $('#id_course').on('change',function(){
            var v = $(this).val();
            if (v) {
              $.ajax({
                    type:'GET',
                    url: "<?php echo base_url(); ?>" + "admin/silabus/get_urut_silabus/"+v,                    
                    dataType: "json",
                    success:function(data){
                        //$('#data').html(data);                        
                        $('#no').val(data.no);                       
                    }
                }); 
            }
          });
    });
</script>
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

	CKEDITOR.replace( 'contents', {
	    filebrowserUploadUrl: "upload/upload.php" 
	} );	

	
</script>


<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>
