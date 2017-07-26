<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
  <?php echo t_text('Email','email') ?>
  <?php echo t_text('Nama','n') ?>
  <?php echo t_text('Profesi','p') ?>
  <?php echo t_text('Instansi','i') ?>
  <?php echo t_text('No Hp','t') ?>
  <?php echo t_radio_select('Keterangan','is_valid','1','0','Aktif','Non Aktif',1) ?>
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>