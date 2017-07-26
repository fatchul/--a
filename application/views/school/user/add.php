<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
  <?php echo t_select("Role",'role','role',$role) ?>  
  <?php echo t_text('Nama','nama') ?>
  <?php echo t_select("Jenis Kelamin",'gender','gender',$gender) ?>    
  <?php echo t_calendar('Tanggal Lahir','dob','dob') ?>
  <?php echo t_text('Contact Person','kontak') ?>
  <?php echo t_textarea('Alamat','alamat') ?>
  <?php echo t_textarea('Profil','profile') ?>
   <?php echo t_text('Kelas','kelas') ?> 
  <hr>
  <?php echo t_email('Email','email') ?>
  <?php echo t_password('Password','password') ?>
  <?php echo t_radio('Keterangan','is_valid','1','0','Aktif','Non Aktif') ?>
  <hr>
  <?php echo t_text('Facebook URL','facebook') ?>
  <?php echo t_file('Foto','foto') ?>  
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>