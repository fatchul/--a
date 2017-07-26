
<div id="top" class="clearfix">
  	<div class="applogo">
  		<a href="<?= base_url() ?>" class="logo">Arkana</a>
  	</div>
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <form class="searchform">
      <!-- <input type="text" class="searchbox" id="searchbox" placeholder="Search">
      <span class="searchbutton"><i class="fa fa-search"></i></span> -->
    </form>
    <ul class="topmenu">
      <li><a href="<?php echo base_url()."admin/messages/inbox" ?>">Inbox </a></li>      
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Tambah Data <span class="caret"></span></a>
        <ul class="dropdown-menu">          
          <li><a href="<?php echo base_url()."user/tambah/" ?>">Guru</a></li>
          <li><a href="<?php echo base_url()."user/tambah/" ?>">Murid</a></li>          
        </ul>
      </li>
    </ul>
    <!-- <a href="#sidepanel" class="sidepanel-open-button" title="See today activities"><?php //echo $today ?><i class="fa fa-outdent"></i></a> -->
    <ul class="top-right">
      <!-- <li class="dropdown link">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton">Create New <span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list">
          <li><a href="<?php echo site_url('product/insert') ?>"><i class="fa falist fa-flask"></i>Products</a></li>
          <li><a href="<?php echo site_url('blog/insert') ?>"><i class="fa falist fa-th"></i>Blog Post</a></li>
          <li><a href="<?php echo site_url('media/insert') ?>"><i class="fa falist fa-gamepad"></i>Media</a></li>
          <li><a href="<?php echo site_url('promo/insert?reff=promo') ?>"><i class="fa falist fa-check-square-o"></i>Promo</a></li>
        </ul>
      </li> -->
      <!-- <li class="dropdown link">
        <a href="#" data-toggle="dropdown" class="notifications dropdown-toggle profilebox" title="<?php echo all() ?> Notifications"><?php echo all() ?> <span class="caret"></span></a>

        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right dropdown-menu-moeblo">
          <li role="presentation" class="dropdown-header">Notifications</li>
          <li><a href="<?= base_url(); ?>subscribe"><i class="fa falist fa-lock"></i>New Subscribers<span class="badge label-danger"><?php echo any_subscribers() ?></span></a></li>
          <li class="divider"></li>
          <li><a href="<?= base_url(); ?>user"><i class="fa falist fa-user"></i>User Baru<span class="badge label-danger"><?php echo any_user() ?></span></a></li>
          <li><a href="<?= base_url(); ?>admin/messages/inbox"><i class="fa falist fa-inbox"></i>Inbox<span class="badge label-danger"><?php echo any_inbox() ?></span></a></li>          
        </ul>
      </li>   -->
      <li class="dropdown link">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="<?= base_url(); ?>asset/images/profileimg.png" alt="img"><b><?php echo $this->school->specific_view('school_name',$this->session->userdata('arch_sch')) ?></b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">Profile</li>
          <!-- <li><a href="#"><i class="fa falist fa-inbox"></i>Inbox<span class="badge label-danger">4</span></a></li> -->
          <!-- <li><a href="#"><i class="fa falist fa-file-o"></i>Files</a></li> -->
          <li><a href="<?php echo site_url('school/setting') ?>"><i class="fa falist fa-wrench"></i>Settings</a></li>
          <li class="divider"></li>
          <!-- <li><a href="#"><i class="fa falist fa-lock"></i> Lockscreen</a></li> -->
          <li><a href="<?php echo site_url('school/logout') ?>"><i class="fa falist fa-power-off"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>