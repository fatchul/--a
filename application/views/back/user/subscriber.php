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
<!-- <div class="row">
  <div class="col-md-12">
  <ul class="topstats clearfix">
    <li class="arrow"></li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-dot-circle-o"></i> Total Product</span>
      <h3 class="color-up"><?php //echo $product ?></h3>
      <span class="diff"><b class="color-up">Products </b></span>
    </li>
    <li class="col-xs-6 col-lg-2 more" onclick="list('zero')">
      <span class="title"><i class="fa fa-calendar-o"></i> Stock <= 0</span>
      <h3 class="color-down"><?php //echo $down ?></h3>
      <span class="diff"><b class="color-down">Products </b></span>
    </li>
    <li class="col-xs-6 col-lg-2 more" onclick="list('no-zero')">
      <span class="title"><i class="fa fa-shopping-cart"></i> Stock >0 </span>
      <h3 class="color-up"><?php //echo $up ?></h3>
      <span class="diff"><b class="color-up">Products </b></span>
    </li>
    <li class="col-xs-6 col-lg-2 more" onclick="list('publish')">
      <span class="title"><i class="fa fa-users"></i> Publish</span>
      <h3 class="color-up"><?php //echo $publis ?></h3>
      <span class="diff"><b class="color-up">Products </b></span>
    </li>
    <li class="col-xs-6 col-lg-2 more" onclick="list('draft')">
      <span class="title"><i class="fa fa-users"></i> Draft</span>
      <h3><?php //echo $draft ?></h3>
      <span class="diff"><b class="color-up">Products </b></span>
    </li>
    
  </ul>
  </div>
</div>

<br> -->
<div class="row">

<div class="col-md-12">

<!-- <a class="btn btn-info" role="button" href="<?php echo base_url('user/tambah') ?>">INSERT NEW</a>
  <br/>
  <br/> -->
  <div class="table-responsive">
  <table id="table" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Email</th>
      <th>Tanggal Mendaftar</th>        
      <th>Konfirmasi</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
  </tbody>  
</table>
</div>
</div>
</div>
<?php //$this->load->view('admin/template/modal') ?>
<?php echo close_bootstrap(); ?>
<script type="text/javascript"> 

  var table;

  $(document).ready(function() {
    table = $('#table').DataTable({ 

        "processing": true, 
        "serverSide": true, 
        "order": [], 
        
        "ajax": {
            "url": "<?php echo site_url('admin/user/list_user')?>",
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

