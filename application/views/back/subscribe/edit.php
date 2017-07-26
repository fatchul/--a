<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart(base_url(uri_string()),"class='form-horizontal'") ?>   
  <?php echo t_text('Email','email',$res[0]->email) ?>
  <?php echo t_text('Nama','n',$res[0]->nama) ?>
  <?php echo t_text('Profesi','p',$res[0]->profesi) ?>
  <?php echo t_text('Instansi','i',$res[0]->instansi) ?>
  <?php echo t_text('No Hp','t',$res[0]->telp) ?>
  <?php echo t_radio_select('Keterangan','is_valid','1','0','Aktif','Non Aktif',$res[0]->is_active) ?>
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>