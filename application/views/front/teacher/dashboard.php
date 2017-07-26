
<div class="section">
	<div class="container">
		<h1>Dashboard</h1>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Kelas Yang Saya Ikuti</a></li> 
			<li><a href="#profile" data-toggle="tab">Kelas Yang Sedang Aktif</a></li>
	  <!-- <li><a href="#messages" data-toggle="tab">Messages</a></li>
	  <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
	</ul>
	
	<div class="tab-content">
		<div class="tab-pane active" id="home">
			<div class="row">
				<div class="col-md-12">
					<hr>
					<?php if ($my_course<>0){ ?>
					<?php foreach ($my_course as $key => $value): ?>
						<div class="row">

							<div class="col-sm-4"><a href="#" class=""><img src="<?= base_url() ?><?php echo $value->directory."/".$value->enc_name."".$value->mime ?>" class="img-responsive" ></a>
							</div>
							<div class="col-sm-8">
								<h3 class="title"><a  href="<?= base_url() ?>learn/<?php echo $value->slug ?>"><?php echo $value->title ?></a></h3>
								<?php $check_finish=$this->enroll->status_course('id_course',$value->id_course,'id_user',$user);  ?>
								<?php if ($check_finish=='0'){ ?>
								<p class="text-muted"><span class="glyphicon glyphicon-lock"></span> &nbsp Ada kelas yang belum anda selesaikan <a href="<?php echo site_url('learn/start/'.$value->id_course.'/'.has(15).'')?>" class="btn-primary btn-xs">Lihat</a></p>	
								<?php } ?>
								<?php if ($check_finish=='1'){ ?>
								<p><span class="glyphicon glyphicon-ok"></span> &nbsp Anda telah menyelesaikan kelas ini <a href="<?php echo site_url('learn/start/'.$value->id_course.'/'.has(15).'')?>" class="btn-success btn-xs">Review Ulang</a></p>	
								<?php } else { echo "-"; } ?>

								<?php echo $value->summary ?>
								<br><br>
								<p class="text-muted">Presented by <a href="#">Arkana Team</a></p>

							</div>
						</div>
						<hr>		
					<?php endforeach ?>
					<?php } else { ?>

					<div class="alert alert-danger">
						Anda belum terdaftar di dalam salah satu kelas. Klik <a href="<?= base_url() ?>catalog" class="btn-md"> disini </a> untuk melihat kelas yang dibuka.
					</div>
					<?php } ?>

				</div>
			</div>
		</div>
		<div class="tab-pane" id="profile">
			<!--  -->
			<div class="section">
				<div class="container">
					<div class="row">
						<?php if ($my_course_active<>0){ ?>
							<?php foreach ($my_course_active as $key => $active): ?>
								<div class="col-sm-3">
									<div class="panel panel-warning">
										<div class="panel-heading">
											<h3 class="panel-title"><?php echo $active->title ?></h3>
										</div>
										<ul class="list-group">
											<?php $all_silabus=$this->silabus->get_silabus_active($active->id_course,$user); ?>
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
							<?php endforeach ?>
						<?php } else { ?>
							<div class="alert alert-danger">
								Anda belum mempunyai kelas aktif.
							</div>
						<?php } ?>
					</div>		
				</div>
				<!--  -->
			</div>
		</div>
	</div>
</div>