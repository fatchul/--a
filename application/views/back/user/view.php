<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart(base_url(uri_string()),"class='form-horizontal'") ?>
  <div class='form-group'>
    <label class='col-sm-2 control-label form-label'>Foto</label>
    <div class='col-sm-8'>
      <p class='form-control-static'></p>
      <img src="<?php echo dir_profile()."".$res[0]->pict_name ?>" width="300px">
    </div>
  </div>
  <?php echo t_static('Nama',$res[0]->nama) ?>
  <?php echo t_static('Email',$res[0]->email) ?>
  <?php echo t_static("Jenis Kelamin",gender($res[0]->gender)) ?>  
  <?php echo t_static('Tanggal Lahir',$res[0]->dob) ?>
  <?php echo t_static('Contact Person',$res[0]->phone) ?>
  <?php echo t_static('Alamat',$res[0]->address) ?>
  <?php echo t_static('Profil',$res[0]->profile) ?>
  <hr>
  <?php echo t_static("Level",role($res[0]->role)) ?>
  <?php echo t_static("Nama Sekolah",$this->school->specific_view('school_name',$res[0]->id_school)) ?>  
  
  <?php //echo t_static('Keterangan',active($res[0]->is_valid)) ?>
  <hr>
  <?php echo t_static('Facebook URL',$res[0]->facebook_url) ?>
  <?php echo t_static('Tanggal Bergabung',dates($res[0]->date_join)) ?>
  <?php echo t_static('Terakhir Login',dates($res[0]->last_login)) ?>
  <?php echo t_static('Verifikasi?',active($res[0]->is_valid)) ?>
  <?php //echo t_file('Foto','foto') ?>  
  <?php //echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>



