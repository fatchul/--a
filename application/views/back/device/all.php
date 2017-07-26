<?php echo open_bootstrap(); ?>
<div class="panel-body table-responsive">
<a  class="btn btn-info" role="button" href="<?php echo base_url('admin/device/tambah/') ?>">TAMBAH</a>

<br>
<br>
<table id="example0" class="table display">
	<thead>
		<tr class="text-center">
			<th>No </th>
			<th>Token</th>
			<th>Nama Device</th>
			
			<th></th>
		</tr>
	</thead>
	<tbody>
		
				<tr id="rows1">
					<td >1</td>
					<td>dsa-dsaBHh-1ds80-dskj</td>
					<td>SEMARGARENG</td>
					<td>
						<a class="btn btn-xs btn-warning" href='' title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i></a>
						<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d()"><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>		
		
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
</script>
<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>