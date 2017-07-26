<div class="section">
  <div class="container">

    <span class="judul_course">Kelas <a href="<?= base_url() ?>learn/<?php echo $course[0]->slug ?>"><?php echo $course[0]->title ?></a></span>
    <br>
    <span class="judul_sub_course">Part #<?php echo $silabus[0]->no_urut ?>. <?php echo $silabus[0]->title_silabus ?></span>
    <hr>
    <?php if ($end==='1'): ?>
      <div class="alert alert-success">
        <strong>Anda telah menyelesaikan kelas ini dengan baik.</strong>
      </div>
    <?php endif ?>
    <div class="row">
      <div class="col-sm-3">
    <!-- <div class="sidebar-nav">
      <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Silabus</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
           <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Panel Warning</h3>
            </div>
            <ul class="nav navbar-nav list-group submenu"> 
              <?php if ($all_silabus<>0){ $no=0; ?>
                  <?php foreach ($all_silabus as $key => $value): $no++; ?>
                    <li class="active"><a  href="<?= base_url() ?>tutorial/<?php echo $value->id_silabus ?>"><?php echo $value->title_silabus ?></a></li>
                  <?php endforeach ?>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div> -->
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">
          Silabus Pembelajaran</h3>
        </div>
        <ul class="list-group">
          <?php if ($all_silabus<>0){ $no=0; ?>
            <?php foreach ($all_silabus as $key => $value): $no++; ?>
              <?php $check_finish=$this->enroll->status_course('id_course',$value->id_silabus,'id_user',$user);  ?>
              <?php if ($check_finish==='0'){ ?>
                <a href="<?= base_url() ?>tutorial/<?php echo $value->id_silabus ?>" class="list-group-item now"> <?php echo $value->title_silabus ?> <span class="label label-success "><span class="glyphicon glyphicon-play-circle"></span></span></a> 
              <?php } ?>
              <?php if ($check_finish==='F'){ ?>
                <span class="list-group-item disable"><?php echo $value->title_silabus ?></span>
              <?php } ?>
              <?php if ($check_finish==='1'){ ?>
                <a href="<?= base_url() ?>tutorial/<?php echo $value->id_silabus ?>" class="list-group-item now"> <?php echo $value->title_silabus ?> <span class="label label-primary "><span class="glyphicon glyphicon-saved"></span></span></a>
              <?php } ?>
          <?php endforeach ?>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="panel panel-warning">
        <div class="panel-heading">
           <span class="judul_sub_course"><?php echo $silabus[0]->title_silabus ?></span>
        </div>
        
          <?php echo $silabus[0]->content_silabus ?>
        
        <ul class="pager">
            <?php echo $prev ?>
            <?php echo $next ?>
        </ul>
      </div>
    </div>
  </div>
</div>