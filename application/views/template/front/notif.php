<?php if($this->session->flashdata('sukses')) { ?>

<div class="alert alert-success alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          <?php echo $this->session->flashdata('sukses'); ?>           
  </div>
<?php } ?>
<?php if($this->session->flashdata('gagal')) { ?>
<div class="alert alert-danger alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          <?php echo $this->session->flashdata('gagal'); ?>           
  </div>
<?php } ?>