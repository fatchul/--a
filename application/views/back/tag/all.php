<?php echo open_bootstrap(); ?>
<div class="panel-body table-responsive">
<a  class="btn btn-info" role="button" href="<?php echo base_url('tag/tambah/') ?>">TAMBAH</a>
<span class="btn btn-warning" onclick="reload_table()">REFRESH</span>
<br>
<br>
<table id="example0" class="table display">
  <thead>
    <tr class="text-center">
      <th>No </th>
      <th>Tag</th>
      <th>Publish</th>
      
      <th>Tanggal Dibuat</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if ($all<>0): $no=0; ?>
      <?php foreach ($all as $key => $value): $no++; ?>
        <tr id="rows<?php echo $value->id_tag ?>">
          <td ><?php echo $no ?></td>
          <td><?php echo $value->name ?></td>
          <td><?php echo dates($value->update_at) ?></td>
      
          <td><?php echo publish($value->is_publish) ?></td>
          <td>
            <a class="btn btn-xs btn-success " href='<?= base_url() ?>tag/view/<?php echo $value->id_tag ?>' title="Lihat Course"><i class="glyphicon glyphicon-eye-open"></i></a>
            <a class="btn btn-xs btn-warning" href='<?= base_url() ?>tag/edit/<?php echo $value->id_tag ?>' title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i></a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('<?php echo $value->id_tag ?>')"><i class="glyphicon glyphicon-trash"></i></a>
          </td>
        </tr>   
      <?php endforeach ?>
    <?php endif ?>
    
    
  </tbody>
</table>
</div>
<?php echo close_bootstrap() ?>
<script>
  $(document).ready(function() {
    $('#example0').DataTable();
  } );

  function d(id){
     if(confirm('Are you sure delete this data?')){
        $.ajax({
          url : "<?php echo site_url('admin/tag/delete')?>/"+id,
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