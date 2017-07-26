<?php echo open_bootstrap(); ?>
<div class="panel-body table-responsive">
<a  class="btn btn-info" role="button" href="<?php echo base_url('admin/cms/page/tambah?get=page') ?>">ADD PAGE</a>

<br>
<br>
<table id="example0" class="table display">
	<thead>
		<tr class="text-center">
			<th>No </th>
			<th>Title</th>
			<th>Tanggal Dibuat</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php if ($all<>0): $no=0; ?>
			<?php foreach ($all as $key => $value): $no++; ?>
				<tr id="rows<?php echo $value->id ?>">
					<td ><?php echo $no ?></td>
					<td><?php echo $value->title ?></td>
					<td><?php echo $value->date_create ?></td>
					
					<td>
						<a class="btn btn-xs btn-success " href='<?= base_url() ?>admin/cms/page/view/<?php echo $value->id ?>' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
						<a class="btn btn-xs btn-warning" href='<?= base_url() ?>admin/cms/page/edit/<?php echo $value->id ?>' title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i></a>
						<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('<?php echo $value->id ?>')"><i class="glyphicon glyphicon-trash"></i></a>
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
	        url : "<?php echo site_url('admin/cms/page/delete')?>/"+id,
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
	
</script>
<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>