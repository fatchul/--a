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

<a  class="btn btn-info" role="button" href="<?php echo base_url('admin/broadcast/tambah/') ?>">TAMBAH</a>
<span class="btn btn-warning" onclick="reload_table()">REFRESH</span>
  <br/>
  <br/>
  <div class="table-responsive">
  <table id="table" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Kepada</th>
      <th>Status Pembaca</th>
       
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
  </tbody>  
</table>
</div>
</div>
</div>
<?php $this->load->view('template/back/modal') ?>

<script type="text/javascript">
  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax 
  }

  
  function d(id){
    if(confirm('Are you sure delete this data?')){
      $.ajax({
        url : "<?php echo site_url('admin/broadcast/delete')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
          reload_table();
        },error: function (jqXHR, textStatus, errorThrown){
          alert('Error deleting data');
        }
      });
    }
  }

  var table;

  $(document).ready(function() {
    table = $('#table').DataTable({ 

        "processing": true, 
        "serverSide": true, 
        "order": [], 
        
        "ajax": {
            "url": "<?php echo site_url('admin/broadcast/list_of')?>",
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
  
  function copyclipboard(id){
    
    var post_data = {
        'id': id,
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
    };
    $.ajax({
      url : "<?php echo site_url('admin/gallery/url/')?>"+id,
      data: post_data,
      type: "POST",
      dataType: "json",
      success: function(data)
      {
        $('#modal_overview').html(data);
        $('#modal-form').modal('show');                
      },
      error: function (xhr, textStatus, errorThrown)
      {
        alert(xhr.responseText);
      }
    });

  }
  function list(i){
    alert(i);
  }
</script>
<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>
<?php echo close_bootstrap(); ?>
