<?php echo open_bootstrap(); ?>
<div class="panel-body table-responsive">
<a  class="btn btn-info" role="button" href="<?php echo base_url('admin/silabus/tambah/') ?>">TAMBAH</a>

<br>
<br>
<table id="example0" class="table display">
	<thead>
		<tr class="text-center">
			<th>No </th>
			<th>Silabus</th>
			<th>Jumlah Enroll</th>
			<th>Tanggal Dibuat</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php if ($all<>0): $no=0; ?>
			<?php foreach ($all as $key => $value): $no++; ?>
				<tr id="rows<?php echo $value->id_silabus ?>">
					<td ><?php echo $no ?></td>
					<td><?php echo $value->no_urut.". ".$value->title_silabus ?></td>
					<td><span class="btn btn-xs btn-primary link" onclick="enroll('<?php echo $value->id_silabus ?>')"><?php echo $this->enroll->total_enrollment($value->id_silabus) ?>  </span></td>
					
					<td><?php echo $value->last_update ?></td>
					<td>
						<a class="btn btn-xs btn-success " href='<?= base_url() ?>admin/silabus/view/<?php echo $value->id_silabus ?>' title="Lihat" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a>
						<a class="btn btn-xs btn-warning" href='<?= base_url() ?>admin/silabus/edit/<?php echo $value->id_silabus ?>' title="Edit" onclick="" target="_blank"><i class="glyphicon glyphicon-pencil"></i></a>
						<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('<?php echo $value->id_silabus ?>')" target="_blank"><i class="glyphicon glyphicon-trash"></i></a>
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

	function d(id){
		 if(confirm('Are you sure delete this data?')){
	      $.ajax({
	        url : "<?php echo site_url('admin/silabus/delete')?>/"+id,
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

	function enroll(id){
		 $.ajax({
	        url : "<?php echo site_url('admin/silabus/see_enroll')?>/"+id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data){
	         	$('#modal_overview').html(data);
        		$('#modal-form').modal('show'); 
	        },error: function (jqXHR, textStatus, errorThrown){
	          alert('Error');
	        }
	      });
	}
</script>
<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>