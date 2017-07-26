<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart(base_url(uri_string()),"class='form-horizontal'") ?>   
  <?php echo t_static('Nama',$res[0]->nama) ?>
  <?php echo t_static('Email',$res[0]->email) ?>
  <?php echo t_static('Profesi',$res[0]->profesi) ?>
  <?php echo t_static('Instansi',$res[0]->instansi) ?>
  <?php echo t_static('No Handphone',$res[0]->telp) ?>
  <?php echo t_static('Pertanyaan',$res[0]->pertanyaan) ?>
  <?php echo t_static('Tanggal Daftar',dates($res[0]->date_join)) ?>
  <?php echo t_static('Keterangan',active($res[0]->is_active)) ?>  
</form>
<?php echo close_bootstrap(); ?>