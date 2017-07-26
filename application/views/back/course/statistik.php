
<?php echo open_bootstrap(); ?>
<ul class="topstats clearfix">
  <li class="arrow"></li>
  <li class="col-xs-6 col-lg-2 ajax">
    <span class="title" onclick="totalenrol('<?php echo $res[0]->id_course ?>')"><i class="fa fa-dot-circle-o"></i> Total Enroll</span>
    <h3 ><?php echo $this->enroll->total_enrollment($res[0]->id_course) ?></h3>

  </li>
  <li class="col-xs-6 col-lg-2">
    <span class="title" onclick="totalsilabus('<?php echo $res[0]->id_course ?>')"><i class="fa fa-calendar-o"></i> Total Silabus</span>
    <h3><?php echo $this->silabus->total_silabus($res[0]->id_course) ?> </h3>

  </li>
  <li class="col-xs-6 col-lg-2">
    <span class="title" onclick="jumlahviewer('<?php echo $res[0]->id_course ?>')"><i class="fa fa-shopping-cart"></i> Jumlah Viewer</span>
    <h3><?php echo $this->enroll->total_visit($res[0]->id_course) ?> </h3>

  </li>
  <li class="col-xs-6 col-lg-2">
    <span class="title" onclick="guru('<?php echo $res[0]->id_course ?>')"><i class="fa fa-users"></i>Guru Terdaftar</span>
    <h3><?php echo $this->enroll->total_enrollment_role($res[0]->id_course,0) ?> </h3>

  </li>
  <li class="col-xs-6 col-lg-2">
    <span class="title" onclick="siswa('<?php echo $res[0]->id_course ?>')"><i class="fa fa-eye"></i>Murid Terdaftar</span>
    <h3><?php echo $this->enroll->total_enrollment_role($res[0]->id_course,1) ?> </h3>

  </li>
  <li class="col-xs-6 col-lg-2">
    <span class="title" onclick="avgtime('<?php echo $res[0]->id_course ?>')"><i class="fa fa-clock-o"></i> Avarage Time</span>
    <h3><?php echo count_time($this->enroll->avg_time_finish($res[0]->id_course,1)) ?> </h3>

  </li>
</ul>
<?php echo close_bootstrap(); ?>
<?php echo open_bootstrap(); ?>
<ul class="topstats clearfix">
  <li class="arrow"></li>
  <li class="col-xs-6 col-lg-2">
    <span class="title" onclick="totalsekolah('<?php echo $res[0]->id_course ?>)')"><i class="fa fa-dot-circle-o"></i> Sekolah Terdaftar</span>
    <h3><?php echo $this->enroll->total_enrollment($res[0]->id_course) ?></h3>

  </li>

</ul>
<?php echo close_bootstrap(); ?>

<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
<?php echo t_static('Judul ',$res[0]->title) ?>
<?php echo t_static('Kesimpulan ',$res[0]->summary) ?>
<?php echo t_static('Tanggal Publish',dates($res[0]->last_update)) ?>
<?php echo t_static('Durasi',$res[0]->duration) ?>
<?php echo t_static('Keterangan',active($res[0]->is_publish)) ?>
<?php echo t_static('Meta',$res[0]->meta) ?>
<hr>
<?php echo t_static('Jumlah Enrollment',$this->enroll->total_enrollment($res[0]->id_course)." User") ?>
<hr>
<div class="form-group">
	<label class="col-sm-2 control-label form-label">Media(s)<br>                        
	</label>
	<div class="col-sm-10">
		<?php $get_media=$this->galeri_course->retrieve_all_media($res[0]->id_course) ?>
   <?php if ($get_media<>0) { ?>
   <?php foreach ($get_media as $key => $value): ?>
     <div class="col-md-4 column productbox">
       <img src="<?= base_url()."".$value->directory."/".$value->enc_name ?>" class="img-media">
       <div class="producttitle"><?php echo $value->mime ?></div>
       <div class="productprice"><div class="pull-right"></div>
       <div class="pricetext">
         <?php if ($value->owner=='T'){ ?>
         <span class="btn btn-xs btn-primary">Thumbnail</span>
         <?php } else { ?>
         &nbsp
         <?php } ?>
       </div>
     </div>
   </div>
 <?php endforeach ?>
 <?php } ?>
</div>
</div>
<?php //echo t_static('Jumlah Sub Materi',"10 Materi") ?>
</form>
<?php echo close_bootstrap(); ?>

<?php $this->load->view('template/back/modal') ?>
<script type="text/javascript">

  function totalenrol(id) {    
    $.ajax({
      url : "<?php echo site_url('admin/course/see_enroll')?>/"+id,
      type: "GET",
      dataType: "JSON",
      beforeSend: function(){$('.loading').show();},complete: function(){$('.loading').hide();},
      success: function(data){
        $('#modal_overview').html(data);
        $('#modal-form').modal('show'); 
      },error: function (jqXHR, textStatus, errorThrown){
        alert('Error');
      }
    });
  }
  function totalsilabus(id){
     $.ajax({
      url : "<?php echo site_url('admin/course/see_silabus')?>/"+id,
      type: "GET",
      dataType: "JSON",
      beforeSend: function(){$('.loading').show();},complete: function(){$('.loading').hide();},
      success: function(data){
        $('#modal_overview').html(data);
        $('#modal-form').modal('show'); 
      },error: function (jqXHR, textStatus, errorThrown){
        alert('Error');
      }
    });
  }
  function jumlahviewer(id){
    alert(id);
  }
  function guru(id){
    
    $.ajax({
      url : "<?php echo site_url('admin/course/see_enroll_guru')?>/"+id,
      type: "GET",
      dataType: "JSON",
      beforeSend: function(){$('.loading').show();},complete: function(){$('.loading').hide();},
      success: function(data){
        $('#modal_overview').html(data);
        $('#modal-form').modal('show'); 
      },error: function (jqXHR, textStatus, errorThrown){
        alert('Error');
      }
    });
  } 
  function siswa(id){
    $.ajax({
      url : "<?php echo site_url('admin/course/see_enroll_student')?>/"+id,
      type: "GET",
      dataType: "JSON",
      beforeSend: function(){$('.loading').show();},complete: function(){$('.loading').hide();},
      success: function(data){
        $('#modal_overview').html(data);
        $('#modal-form').modal('show'); 
      },error: function (jqXHR, textStatus, errorThrown){
        alert('Error');
      }
    });
  }
  function avgtime(id){
    alert(id);
  }
  function totalsekolah(id){
    alert(id);
  }
</script>
