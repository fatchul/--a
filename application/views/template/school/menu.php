<!-- <?php 
  $get_size=array_sum(array_map('filesize', glob('*')));
  $div_size=$get_size/1000/1000;
  $total_all_size=10485760;
  $div_total=$total_all_size/100;
  $badges="";
  $badges_disc="";
  $badges_ticket="";

  if ($any_order>0) {
    $badges="<span class='label label-danger'>NEW</span>";
    $any_order="<span class='label label-danger'>".$any_order."</span>";  
  }
  else{
    $any_order="";
  }

  if ($any_discussion>0) {
    $badges_disc="<span class='label label-danger'>NEW</span>";
    if ($any_discussion>0) {
      $any_discussion="<span class='label label-danger'>".$any_discussion."</span>";  
    }
    
  }
  else{
    $any_discussion="";    
  }

  if ($any_ticket>0) {
    $badges_disc="<span class='label label-danger'>NEW</span>";
    if ($any_ticket>0) {
      $any_ticket="<span class='label label-danger'>".$any_ticket."</span>";  
    }
  }
  else{
    $any_ticket=""; 
  }

  // $size=0;
  // foreach (new RecursiveIterator(new RecursiveDirectoryIterator($directory)) as $file) {
  //   $size += $file->getSize();
  // }
?> -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MAIN MENU </li>
  <li><a href="<?php echo site_url('school/course') ?>"><span class="icon color5"><i class="fa fa-home"></i></span>Course<span class="label label-default"><?php echo $jml ?></span></a></li>  
   <!-- <li><a href="#"><span class="icon color7"><i class="fa fa-envelope"></i></span>Inbox <?php echo $badges_disc ?><span class="caret"></span></a>
    <ul>      
      <li><a href="<?php echo site_url('admin/messages/inbox') ?>">Inbox</a> <?php  echo $any_discussion; ?></li>      
    </ul>
  </li> -->
  <li><a href="#"><span class="icon color7"><i class="fa fa-trophy"></i></span>Master<span class='caret'></span></a>
    <ul>      
      <li><a href="<?php echo site_url('school/user') ?>">Data Siswa dan Guru</a></li>
      <!-- <li><a href="<?php echo site_url('course') ?>">Course</a></li> -->

    </ul>
  </li>
  
</ul>


</div>

</div>
