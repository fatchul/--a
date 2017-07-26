<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart(base_url(uri_string())."?action=update","class='form-horizontal'") ?>
  <?php echo t_text('Nama Sekolah','nama_skolah',$res[0]->school_name) ?>
  <?php echo t_text('Nomor Sekolah','gugus',$res[0]->reg_number_ministry) ?>
  <?php echo t_text('Nama Kepala Sekolah','kepsek',$res[0]->headmaster) ?>
  <?php echo t_textarea('Alamat','alamat',$res[0]->address) ?>
  <?php echo t_text('Kota','kota',$res[0]->kota) ?>
  <?php echo t_text('Contact Person','pic',$res[0]->pic) ?>
  <?php echo t_text('Nomor yang bisa dihubungi','kontak',$res[0]->contact_person) ?>
  <?php echo t_text('Email','email',$res[0]->email) ?>  
  <?php echo t_radio_select('Keterangan','is_valid','1','0','Aktif','Non Aktif',$res[0]->is_valid) ?>
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>

<?php echo open_bootstrap(); ?>
  <?php echo form_open_multipart(base_url(uri_string())."?action=update","class='form-horizontal'") ?>
  <?php echo t_password('New Password','password') ?>  
  <?php echo t_submit('','btn-change-password',"Simpan") ?>
  </form>
<?php echo close_bootstrap(); ?>