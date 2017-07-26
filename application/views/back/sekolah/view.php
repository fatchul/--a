<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart(base_url(uri_string())."?action=update","class='form-horizontal'") ?>
  <?php echo t_static('Nama Sekolah',$res[0]->school_name) ?>
  <?php echo t_static('Nomor Sekolah',$res[0]->reg_number_ministry) ?>
  <?php echo t_static('Nama Kepala Sekolah',$res[0]->headmaster) ?>
  <?php echo t_static('Alamat',$res[0]->address) ?>
  <?php echo t_static('Kota',$res[0]->kota) ?>
  <?php echo t_static('Contact Person',$res[0]->pic) ?>
  <?php echo t_static('Nomor yang bisa dihubungi',$res[0]->contact_person) ?>
  <?php echo t_static('Email',$res[0]->email) ?>  
  <hr>
  <?php echo t_static('Terakhir Update',dates($res[0]->update_at)) ?> 
  <?php echo t_static('Terakhir Login',dates($res[0]->last_login)) ?> 
  <?php echo t_static('Keterangan',active($res[0]->is_valid)) ?>
                  
</form>
<?php echo close_bootstrap(); ?>