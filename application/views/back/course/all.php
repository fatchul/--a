<?php echo open_bootstrap(); ?>
<div class="panel-body table-responsive">
<a  class="btn btn-info" role="button" href="<?php echo base_url('course/tambah/') ?>">TAMBAH</a>

<br>
<br>
<table id="example0" class="table display">
	<thead>
		<tr class="text-center">
			<th>No </th>
			<th>Course</th>
			<th>Summary</th>
			<th>Tag</th>
			<th>Jumlah Enroll</th>
			<th>Total Silabus</th>
			<th>Tanggal Dibuat</th>

			<th></th>
			<th>Statistik</th>
		</tr>
	</thead>
	<tbody>
		<?php if ($all<>0): $no=0; ?>
			<?php foreach ($all as $key => $value): $no++; ?>
				<tr id="rows<?php echo $value->id_course ?>">
					<td ><?php echo $no ?></td>
					<td><?php echo $value->title ?></td>
					<td><?php echo $value->summary ?></td>
					<td>
						<?php 
							if ($this->course_tag->get_tag($value->id_course) <> 0) {
		                      foreach ($this->course_tag->get_tag($value->id_course) as $key => $v){
		                        echo "<span onclick='opentag(\"$v->id_tag\")' class='btn btn-xs link'>".$v->name."</span> ";
		                      }                              
		                    }
						?>
					</td>
					<td><span class="btn btn-xs btn-primary link" onclick="enroll('<?php echo $value->id_course ?>')"><?php echo $this->enroll->total_enrollment($value->id_course) ?> Enroll </span></td>
					<td><span class="btn btn-xs btn-primary link" onclick="silabus('<?php echo $value->id_course ?>')"><?php echo $this->silabus->total_silabus($value->id_course) ?> Silabus </span></td>
					<td><?php echo $value->last_update ?></td>
					<td>
						<a class="btn btn-xs btn-primary " href='<?= base_url() ?>admin/silabus/tambah/<?php echo $value->id_course ?>' title="Tambah Silabus"><i class="glyphicon glyphicon-plus"></i></a>
						<a class="btn btn-xs btn-success " href='<?= base_url() ?>course/view/<?php echo $value->id_course ?>' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
						<a class="btn btn-xs btn-warning" href='<?= base_url() ?>course/edit/<?php echo $value->id_course ?>' title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i></a>
						<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('<?php echo $value->id_course ?>')"><i class="glyphicon glyphicon-trash"></i></a>
					</td>
					<td>
						<a class="btn btn-xs btn-success " href='<?= base_url() ?>admin/course/statistik/<?php echo $value->id_course ?>' title="Tambah Silabus">Statistik</a>
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
	        url : "<?php echo site_url('admin/course/delete')?>/"+id,
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
	function opentag(id){
		 $.ajax({
	        url : "<?php echo site_url('admin/course/see_tag')?>/"+id,
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
	function enroll(id){
		 $.ajax({
	        url : "<?php echo site_url('admin/course/see_enroll')?>/"+id,
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
	function silabus(id){
		 $.ajax({
	        url : "<?php echo site_url('admin/course/see_silabus')?>/"+id,
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