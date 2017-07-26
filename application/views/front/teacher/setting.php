
<link href="<?= base_url(); ?>asset/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<div class="section">
<div class="container">
    <h1>Edit Profil</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <?php echo form_open_multipart($link."/akun/update") ?>
        <div class="text-center">
          <?php if ($user[0]->pict_name==""){ ?>
            <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">  
          <?php } else { ?>
            <img src="<?= base_url() ?>upload/<?php echo $user[0]->pict_name ?>"  alt="avatar" height="220px">  
          <?php } ?>
          
          <br>
          <input name="photos" type="file" required="">
          <br>
          
        </div>
        <input type="submit" name="btn-profil" value="Upload" class="btn btn-primary btn-sm">
        <?php echo form_close() ?>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <?php $this->load->view('template/front/notif') ?>        
        <?php echo form_open($link."/akun/update","class='form-horizontal'") ?>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama:</label>
            <div class="col-lg-8">
              <input class="form-control" value="<?php echo $user[0]->nama ?>" type="text" name="nama">
            </div>
          </div>

          <div class="form-group">
                <label class='col-sm-3 control-label form-label'>Tanggal Lahir:</label>
                <div class='col-sm-9'>
                  <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                      <input type='text' id='cal' name='dob' class='form-control' value='<?php echo $user[0]->dob ?>'/> 
                      <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                </div>
                <input type="hidden" id="dtp_input2" value="" /><br/>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Jenis Kelamin:</label>

            <?php if ($user[0]->gender==='L'){ ?>
              <div class="col-lg-8">
                <label class="radio-inline">
                  <input type="radio" name="gender" value="L" checked="">Laki-laki
                </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" value="P" >Perempuan
                </label>
              </div>
            <?php } else { ?>
              <div class="col-lg-8">
                <label class="radio-inline">
                  <input type="radio" name="gender" value="L" >Laki-laki
                </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" value="P" checked="">Perempuan
                </label>
              </div>
            <?php } ?>
          </div>
           <div class="form-group">
            <label class="col-lg-3 control-label">No Handphone:</label>
            <div class="col-lg-8">
              <input class="form-control" name="kontak" value="<?php echo $user[0]->phone ?>" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Alamat:</label>
            <div class="col-lg-8">              
              <textarea class="form-control" name="alamat"><?php echo $user[0]->address ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Profil:</label>
            <div class="col-lg-8">              
              <textarea class="form-control" name="profile"><?php echo $user[0]->profile ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" value="<?php echo $user[0]->email ?>" type="text" name="email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input class="btn btn-primary" value="Simpan" type="submit" name="profil">
            </div>
          </div>
          <?php echo form_close() ?>
          <hr>
          <?php echo form_open($link."/akun/update","class='form-horizontal'") ?> 
          <div class="form-group">
            <label class="col-md-3 control-label">Password Sekarang:</label>
            <div class="col-md-8">
              <input class="form-control" name="password_now" value="password" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password Baru:</label>
            <div class="col-md-8">
              <input class="form-control" name="password_new" value="password" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" name="password_confirmation" value="confirm_password" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input class="btn btn-primary" value="Simpan" type="submit" name="pwd">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
</div>
<hr>

<script type="text/javascript" src="<?= base_url(); ?>asset/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript">
 
  $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
 
</script>