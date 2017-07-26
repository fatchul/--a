<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?> 
  <?php echo t_text('Nama Sekolah','nama_skolah') ?>
  <?php echo t_text('Nomor Sekolah','gugus') ?>
  <?php echo t_text('Nama Kepala Sekolah','kepsek') ?>
  <?php echo t_textarea('Alamat','alamat') ?>
  <?php echo t_text('Kota','kota') ?>
  <?php echo t_text('Contact Person','pic') ?>
  <?php echo t_text('Nomor yang bisa dihubungi','kontak') ?>
  <?php echo t_text('Email','email') ?>
  <?php echo t_password('Password','password') ?>
  <?php echo t_radio('Keterangan','is_valid','1','0','Aktif','Non Aktif') ?>
  <?php echo t_file('Logo Sekolah','logo') ?>  
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>