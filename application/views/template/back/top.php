
<div id="top" class="clearfix">
  	<div class="applogo">
  		<a href="<?= base_url() ?>" class="logo"><img src="<?= base_url() ?>asset/images/ico_logo.png" width="35px">&nbspArkademy</a>
  	</div>
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <form class="searchform">
      <!-- <input type="text" class="searchbox" id="searchbox" placeholder="Search">
      <span class="searchbutton"><i class="fa fa-search"></i></span> -->
    </form>
    <ul class="topmenu">
      <li><a href="<?php echo base_url()."admin/messages/inbox" ?>">Inbox </a></li>
      <li><a href="<?php echo base_url()."course/" ?>">My Course</a></li>
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Tambah Data <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url()."sekolah/tambah/" ?>">Sekolah</a></li>
          <li><a href="<?php echo base_url()."user/tambah/" ?>">Guru</a></li>
          <li><a href="<?php echo base_url()."user/tambah/" ?>">Murid</a></li>
          <li><a href="<?php echo base_url()."subscribe/tambah/" ?>">Subscriber</a></li>
        </ul>
      </li>
    </ul>
    
    <ul class="top-right">
      <li class="dropdown link">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton">Create New <span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list">
          <li><a href="<?php echo site_url('course/tambah') ?>"><i class="fa falist fa-flask"></i>Course</a></li>
          <li><a href="<?php echo site_url('course/materials') ?>"><i class="fa falist fa-th"></i>Material / Media</a></li>
        </ul>
      </li>
      <li class="dropdown link">
        <a href="#" data-toggle="dropdown" class="notifications dropdown-toggle profilebox" title="<?php echo all() ?> Notifications"><?php echo all() ?> <span class="caret"></span></a>

        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right dropdown-menu-moeblo">
          <li role="presentation" class="dropdown-header">Notifications</li>
          <li><a href="<?= base_url(); ?>subscribe?act=new"><i class="fa falist fa-lock"></i>New Subscribers<span class="badge label-danger"><?php echo any_subscribers() ?></span></a></li>
          <li class="divider"></li>
          <li><a href="<?= base_url(); ?>user?act=new"><i class="fa falist fa-user"></i>User Baru<span class="badge label-danger"><?php echo any_user() ?></span></a></li>
          <li><a href="<?= base_url(); ?>admin/messages/inbox?act=new"><i class="fa falist fa-inbox"></i>Inbox<span class="badge label-danger"><?php echo any_inbox() ?></span></a></li>          
        </ul>
      </li>  
      <li class="dropdown link">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="<?= base_url(); ?>asset/images/profileimg.png" alt="img"><b>Administrator</b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">Profile</li>
          <!-- <li><a href="#"><i class="fa falist fa-inbox"></i>Inbox<span class="badge label-danger">4</span></a></li> -->
          <!-- <li><a href="#"><i class="fa falist fa-file-o"></i>Files</a></li> -->
          <li><a href="<?php echo site_url('admin/dashboard/setting') ?>"><i class="fa falist fa-wrench"></i>Settings</a></li>
          <li class="divider"></li>
          <!-- <li><a href="#"><i class="fa falist fa-lock"></i> Lockscreen</a></li> -->
          <li><a href="<?php echo site_url('logout') ?>"><i class="fa falist fa-power-off"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>