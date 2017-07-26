<div class="loading" style="display: none"></div>
<header class="header fixed clearfix navbar navbar-fixed-top" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="header-left">

					<div class="logo smooth-scroll hidden-xs">
						<a href="#banner" style="margin-right: -30px"><img id="logo" src="http://www.arkademy.com/asset/images/ico_logo.png" alt="Arkademy"></a>
					</div>
					
					<div class=" smooth-scroll hidden-lg hidden-md hidden-sm">
						<div class="site-name">
						<img id="logo-sm" src="<?= base_url() ?>asset/images/ico_logo_sm.png" alt="Arkademy">
						</div>

					</div>
				</div>
			</div>
			
			<div class="col-md-8">
				<div class="header-right clearfix">
					<div class="main-navigation animated">
						<nav class="navbar navbar-default" role="navigation">
							<div class="container-fluid">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
									<ul class="nav navbar-nav navbar-right">
										<li><a href="<?= base_url() ?>">Home</a></li>		
										<li><a href="<?= base_url() ?>catalog">Course</a></li>
										<li><a href="<?= base_url() ?>kit">Kit</a></li>
										<?php 
											if (isset($parent_menu)&&$parent_menu<>0) {
												foreach ($parent_menu as $key => $parent) {
													echo "<li><a href=".site_url($parent->slug).">".$parent->title."</a></li>";
												}
											}
										?>
										<?php if (sesi_siswa()){?>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
														<?php 
															$get_mail_siswa = $this->session->userdata('__usr__');
															$nama=$this->user->specific_column('nama','email',$get_mail_siswa);
															echo $nama;
														?> 
													<span class="caret"></span></a>
													<ul class="dropdown-menu">

														<li><a href="<?= base_url() ?>u/dashboard" >My Course <span class="label label-danger lb-sm"><?php echo $total_course[0]->total_course ?></span></a></li>
														<li>
															<a href="<?php echo site_url("u/myinbox") ?>">My Inbox <span class="label label-danger lb-sm"><?php echo $count_msg ?></span></a>
														</li>

														<li role="separator" class="divider"></li>
														<li><a href="<?= base_url() ?>u/device">Device Management</a></li>
														<li><a href="<?= base_url() ?>u/device/api/docs">API documentations</a></li>
														<li><a href="<?= base_url() ?>u/setting">Setting</a></li>
														<li role="separator" class="divider"></li>
														<li><a href="<?= base_url() ?>logout">Keluar</a></li>
													</ul>
												</li>
										<?php } else if (sesi_guru()) { ?>										
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
														<?php 
															$get_mail = $this->session->userdata('__usr_teacher_');
															$nama=$this->user->specific_column('nama','email',$get_mail);
															echo $nama;
														?> 

														<span class="caret"></span></a>
													<ul class="dropdown-menu">
														<li><a href="<?= base_url() ?>g/dashboard">My Open Course <span class="label label-danger lb-sm"><?php echo $total_course[0]->total_course ?></span></a></li>
														<li><a href="<?= base_url() ?>g/student">My Student <span class="label label-danger lb-sm"><?php //echo $c_user ?></span></a></li>
														<li>
															<a href="<?php echo site_url("g/inbox") ?>">My Inbox <span class="label label-danger lb-sm"><?php echo $count_msg ?></span></a>
														</li>
														<li role="separator" class="divider"></li>
														<li><a href="<?= base_url() ?>g/device">Device Management</a></li>
														<li><a href="<?= base_url() ?>g/device/api/docs">API documentations</a></li>
														<li><a href="<?= base_url() ?>g/akun">Setting</a></li>														
														<li role="separator" class="divider"></li>
														<li><a href="<?= base_url() ?>logout">Keluar</a></li>
													</ul>
												</li>
										<?php } else if (sesi_admin_sekolah()) { ?>										
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
														<?php 
															$get_mail = $this->session->userdata('arch_sch');
															$nama=$this->school->specific_column('school_name','id_school',$get_mail);
															echo $nama;
														?> 

														<span class="caret"></span></a>
													<ul class="dropdown-menu">
														<li><a href="<?= base_url() ?>school/course">Dashboard</a></li>
														<li><a href="<?= base_url() ?>school/setting">Setting</a></li>
														<li role="separator" class="divider"></li>
														<li><a href="<?= base_url() ?>logout">Keluar</a></li>
													</ul>
												</li>
										<?php } else{ ?>
											<li><a href="<?= base_url() ?>login">Login</a></li>
										<?php } ?>
									</ul>
								</div>

							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>