<?php echo open_bootstrap(); ?>
<style type="text/css">
  .more{
    cursor: pointer;
  }
</style>
<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
?>

<div class="row">

<div class="col-md-12">

<a  class="btn btn-info" role="button" href="<?php echo base_url('subscribe/tambah/') ?>">TAMBAH</a>
<span class="btn btn-warning" onclick="reload_table()">REFRESH</span>
  <br/>
  <br/>
  <div class="table-responsive">
  <table id="table" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th width="20px">No</th>
      <th width="350px">Email</th>
      <th width="350px">Nama</th>
      <th width="350px">Instansi</th>
      <th width="350px">No HP</th>
      <th>Tanggal Daftar</th> 
      <th width="20px">Status</th>           
      <th width="100px">Edit</th>
    </tr>
  </thead>
  <tbody>
  </tbody>  
</table>
</div>
</div>
</div>
<?php //$this->load->view('admin/template/modal') ?>

<script type="text/javascript">
  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax 
  }

  
  function d(id){
    if(confirm('Are you sure delete this data?')){
      $.ajax({
        url : "<?php echo site_url('admin/subscribe/delete')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
          reload_table();
        },error: function (jqXHR, textStatus, errorThrown){
          alert('Error deleting data');}});
    }
  }


  var table;

  $(document).ready(function() {
    table = $('#table').DataTable({ 

        "processing": true, 
        "serverSide": true, 
        "order": [], 
        
        "ajax": {
            "url": "<?php echo site_url('admin/subscribe/list_of')?>",
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

  function list(i){
    alert(i);
  }
</script>
<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>

<?php echo close_bootstrap(); ?>