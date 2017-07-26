<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart(base_url(uri_string()),"class='form-horizontal'") ?>  
  <?php echo t_select_select("Level",$role) ?>
  <?php echo t_text('Nama','nama',$res[0]->nama) ?>
  <?php echo t_select_select("Jenis Kelamin",$gender) ?>  
  <?php echo t_calendar('Tanggal Lahir','dob','dob',$res[0]->dob) ?>
  <?php echo t_text('Contact Person','kontak',$res[0]->phone) ?>
  <?php echo t_textarea('Alamat','alamat',$res[0]->address) ?>
  <?php echo t_textarea('Profil','profile',$res[0]->profile) ?>
  <hr>
  <?php echo t_email('Email','email',$res[0]->email) ?>
  <?php echo t_password('Password','password',$res[0]->password) ?>
  <?php echo t_radio_select('Keterangan','is_valid','1','0','Aktif','Non Aktif',$res[0]->is_valid) ?>
  <hr>
  <?php echo t_text('Facebook URL','facebook',$res[0]->facebook_url) ?>
  <?php echo t_file('Foto','foto') ?>  
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>


