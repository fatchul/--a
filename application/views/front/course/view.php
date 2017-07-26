<div class="container">
  <div class="row object-non-visible" data-animation-effect="fadeIn">
    <div class="col-md-12">
      <div class="footer section-ark">
        <div class="container">
          <h1 class="title text-center hidden-sm hidden-xs" id="contact"><?= $title ?></h1>
          <h2 class="title text-center hidden-lg" id="contact"><?= $title ?></h2>
          <p class="lead text-center"><?= $summary ?></p> 
          
          <div class="row">
            <div class="col-sm-12">
              <div class="footer-content text-center" id="start">
                
                  <?php if ($is_enroll){ ?>
                  <a href="<?php echo site_url('learn/start/'.$_token.'/'.has(15).'')?>" class="btn btn-sm btn-primary">Mulai &#9658;</a>             
                  <?php }else{ ?>             
                  <a href="<?php echo site_url('learn/enroll/'.$_token.'/'.has(15).'')?>" class="btn btn-sm btn-success">Enroll &#9658;</a> 
                  <?php } ?>
                  <br><br>
                  <span class="lead text-center">Waktu Pengerjaan : <?php echo $__durasi ?></span> 
                  <?php if ($msg): ?>
                    <br><br>
                    <div class="alert alert-danger">
                      Anda tidak diperkenankan untuk mengambil kelas ini. Silahkan menghubungi mentor / guru anda terlebih dahulu.
                    </div>  
                  <?php endif ?>
              
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>      
  </div>

</div>
<div class="container">
  <div class="col-md-12 col-lg-12 padding-0">
    <ul class="nav nav-tabs nav-justified" role="tablist">
      <li role="presentation" class="active"><a href="#home6" aria-controls="home6" role="tab" data-toggle="tab"><i class="fa fa-home"></i> Deskripsi</a></li>
      <li role="presentation"><a href="#profile6" aria-controls="profile6" role="tab" data-toggle="tab"><i class="fa fa-user"></i> Silabus</a></li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home6">
        <br>
        <?php echo $content ?>
      </div>
      <div role="tabpanel" class="tab-pane" id="profile6">
        <br>
        <p class="text-center"> <b>Ikuti tutorial berikut untuk meningkatkan pemahaman Anda tentang <?= $title ?></b></p>
       <!--  <div class="well hidden-xs"> 
          <div class="row">        
            <div class="col-xs-12">
              <div class="btn-group">
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-th"></span> <br>Jumlah Siswa <br> 25 </button>
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-camera"></span> <br>Dilihat <br> 25 </button>
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-retweet"></span> <br>Diskusi <br> 25 </button>
              </div>
            </div>
          </div>
        </div> -->
        
        <!--  -->
        
        <div class="row"> 
          <div class="col-md-12">
            <div class="timeline-centered">
              <?php if ($all_silabus<>0){ $no=0; ?>
                <?php foreach ($all_silabus as $key => $value): $no++; ?>
                    <article class="timeline-entry">
                      <div class="timeline-entry-inner">
                        <div class="timeline-icon bg-primary">
                          #<i class="entypo-feather"></i> <?php echo $no ?>
                        </div>
                        <div class="timeline-label">
                          <?php if ($is_enroll){ ?>
                            <?php $check_finish=$this->enroll->status_course('id_course',$value->id_silabus,'id_user',$user);  ?>

                              <?php if ($check_finish==='0'){ ?>
                                <h2><a href="<?php echo base_url()."tutorial/".$value->id_silabus ?>"><b><?php echo $value->title_silabus ?></b></a> </h2>
                                <?php echo $value->summary_silabus ?>
                              <?php } ?>
                              <?php if ($check_finish==='F'){ ?>
                                <h2><a href="#"><b><?php echo $value->title_silabus ?></b></a> </h2>
                                Anda belum di perkenankan mengambil kelas ini
                                <?php if ($this->enroll->is_empty_enroll($user)): ?>
                                  <a href="<?php echo site_url('learn/start/'.$_token.'/'.has(15).'')?>" class="btn-primary btn-xs">Mulai kelas awal</a>
                                <?php endif ?>
                              <?php } ?>
                              <?php if ($check_finish==='1'){ ?>
                                <h2><a href="<?php echo base_url()."tutorial/".$value->id_silabus ?>"><b><?php echo $value->title_silabus ?></b></a> </h2>
                                <?php echo $value->summary_silabus ?>
                              <?php } ?>

                          <?php }else{ ?>
                            <h2><a href="#"><b><?php echo $value->title_silabus ?></b></a> </h2>
                            Anda harus enroll terlebih dahulu
                          <?php } ?>
                          
                        </div>
                      </div>
                    </article>                
                <?php endforeach ?>
              <?php } ?>
            </div>
          </div>           
        </div>
        
        <!--  -->
      </div>
    </div>    
  </div>
</div>            

