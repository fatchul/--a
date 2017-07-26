<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title" id="project-1-label">Course Tema <b>"<?php echo $title ?>"</b></h4>
</div>
<div class="modal-body">
	
	<div class="row">
		<div class="col-md-12">
			<table id="example0" class="table display">
			<thead>
				<tr class="text-center">
					<th>No </th>
					<th>Nama</th>
					<th>Status</th>
					<th>Asal Sekolah</th>
					<th>Tanggal Enroll</th>
					<th>Tanggal Selesai</th>
					<th>Waktu Pengerjaan</th>
					<th>Terakhir Login</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($all<>0): $no=0; ?>
					<?php foreach ($all as $key => $value): $no++; ?>
						<tr id="rows">
							<td ><?php echo $no ?></td>
							<td><?php echo $value->nama ?></td>
							<td><?php echo role($value->role) ?></td>
							<td><?php echo $this->school->specific_view('school_name',$value->id_school) ?></td>
							<td><?php echo dates($value->date_enrollment) ?></td>
							<td>
								<?php 
									if ($value->is_finish==0) {
										echo "<span class='btn-xs btn-danger'>Unfinish </span>";
									}
									else{
										echo $value->finish_task ?> <?php //echo count_time($this->enroll->lama_pengerjaan($value->id_course));
									} 
								?>	
							</td>
							<td>
								<?php 
									echo count_time($this->enroll->lama_pengerjaan($value->id_course));
									
								?>	
							</td>
							<td><?php echo dates($value->last_login) ?></td>
							

							<td>
								<a class="btn btn-xs btn-success " href='<?= base_url() ?>user/view/<?php echo $value->id_user ?>' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
							</td>
						</tr>		
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
		</table>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
</div>
