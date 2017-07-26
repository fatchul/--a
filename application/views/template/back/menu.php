<?php $badges_disc="";$any_ticket="";$any_discussion="";$div_total=100; ?>

<?php $disp="style='display: none'"; if ($this->uri->segment(1)=='apps'){$disp="style='display: block'";} ?>
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MAIN MENU </li>
  <li><a href="<?php echo site_url('apps') ?>"><span class="icon color5"><i class="fa fa-home"></i></span>Dashboard<span class="label label-default">0</span></a></li>  
   <li><a href="#" ><span class="icon color7"><i class="fa fa-envelope"></i></span>Inbox <?php echo $badges_disc ?><span class="caret"></span></a>
    <ul <?php echo $disp ?>>            
      <li><a href="<?php echo site_url('subscribe') ?>">Subscribe</a> <?php  echo $any_ticket; ?></li>      
    </ul>
  </li>
  <li><a href="<?php echo site_url('admin/broadcast') ?>"><span class="icon color15"><i class="fa fa-columns"></i></span>Broadcast</a></li>
   <li><a href="<?php echo site_url('admin/gallery') ?>"><span class="icon color15"><i class="fa fa-camera"></i></span>Media</a></li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-trophy"></i></span>Master<span class='caret'></span></a>
    <ul <?php echo $disp ?>>
      <li><a href="<?php echo site_url('admin/school') ?>">Data Sekolah</a></li>
      <li><a href="<?php echo site_url('user') ?>">Data Siswa dan Guru</a></li>
    </ul>
  </li>
 
  <li><a href="#"><span class="icon color7"><i class="fa fa-flask"></i></span>Course<span class="caret"></span></a>
    <ul <?php echo $disp ?>>
      <li><a href="<?php echo site_url('tag') ?>">Tag</a></li>
      <li><a href="<?php echo site_url('course') ?>">Course</a></li>
      <li><a href="<?php echo site_url('admin/silabus') ?>">Silabus</a></li>            
      
      
    </ul>
  </li>
  <li><a href="<?php echo site_url('admin/device') ?>"><span class="icon color15"><i class="fa fa-steam"></i></span>Device Management</a></li> 
  <li><a href="#"><span class="icon color9"><i class="fa fa-th"></i></span>CMS<span class="caret"></span></a>
    <ul <?php echo $disp ?>>
      <li><a href="<?php echo site_url('admin/cms/page') ?>">Page</a></li>      
      <li><a href="<?php echo site_url('admin/cms/category') ?>">Category</a></li>      
      <li><a href="<?php echo site_url('admin/cms/post') ?>">Post</a></li>
      <li><a href="<?php echo site_url('admin/cms/menu') ?>">Menu</a></li>
    </ul>
  </li>
</ul>

<ul class="sidebar-panel nav">
  <li class="sidetitle">MORE</li>
    <li><a href="<?php echo site_url('admin/cms/site') ?>"><span class="icon color15"><i class="fa fa-user"></i></span>Social Media</a></li>
  <li><a href="<?php echo site_url('preferences/backup') ?>"><span class="icon color10"><i class="fa fa-lightbulb-o"></i></span>Backup Database</a></li>
  <li><a href="<?php echo site_url('preferences/statistics') ?>"><span class="icon color11"><i class="fa fa-eye"></i></span>Statistics</a></li>
</ul>

<!-- <div class="sidebar-plan">
  Memory
  <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $div_size; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php //echo $div_size ?>%;">
  </div>
</div>
<span class="space"><?php //echo byte_format($div_size,2) ?> / <?php echo byte_format($div_total,2) ?> </span> -->
</div>

</div>
