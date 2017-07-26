<?php echo open_bootstrap(); ?>
<div class="panel-body table-responsive">
<br>
<table id="example0" class="table display">
	<thead>
		<tr class="text-center">
			<th>No </th>
			<th>Course</th>
			<th>Summary</th>
			<th>Total Silabus</th>
			<th>Tanggal Dibuat</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php if ($all<>0): $no=0; ?>
			<?php foreach ($all as $key => $value): $no++; ?>
				<tr id="rows<?php echo $value->id_course ?>">
					<td ><?php echo $no ?></td>
					<td><?php echo $value->title ?></td>
					<td><?php echo $value->summary ?></td>
					
					
					<td><span class="btn btn-xs btn-primary link" onclick="silabus('<?php echo $value->id_course ?>')"><?php echo $this->silabus->total_silabus($value->id_course) ?> Silabus </span></td>
					<td><?php echo $value->last_update ?></td>
					<td>
						<a class="btn btn-xs btn-success " href='<?= base_url() ?>school/course/view/<?php echo $value->id_course ?>?utm=course' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
						
						<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Endorse Guru" onclick="endorse('<?php echo $value->id_course ?>')"><i class="glyphicon glyphicon-plus"></i></a>
					</td>
				</tr>		
			<?php endforeach ?>
		<?php endif ?>
	</tbody>
</table>
</div>
<?php $this->load->view('template/back/modal') ?>
<?php echo close_bootstrap() ?>
<script>
	$(document).ready(function() {
		$('#example0').DataTable();
	} );

	
	function silabus(id){
		 $.ajax({
	        url : "<?php echo site_url('school/course/see_silabus')?>/"+id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data){
        		$('#modal-form').modal('show'); 
        		$('#modal_overview').html(data);
	        },error: function (jqXHR, textStatus, errorThrown){
	          alert('Error');
	        }
	      });
	}
	function endorse(id){
    
	    var post_data = {
	        'id': id,
	        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
	    };
	    $.ajax({
	      url : "<?php echo site_url('school/course/endorse/')?>"+id,
	      data: post_data,
	      type: "POST",
	      dataType: "json",
	      success: function(data)
	      {
	        
	        $('#modal-form').modal('show');                
	        $('#modal_overview').html(data);
	      },
	      error: function (xhr, textStatus, errorThrown)
	      {
	        alert(xhr.responseText);
	      }
	    });

	  }
</script>
<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>