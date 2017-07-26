<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title" id="project-1-label">Course Tema "<?php echo $tema ?>"</h4>
</div>
<div class="modal-body">
	
	<div class="row">
		<div class="col-md-12">
			<table id="example0" class="table display">
			<thead>
				<tr class="text-center">
					<th>No </th>
					<th>Course</th>
					<th>Summary</th>
					<th>Tag</th>
					<th>Jumlah Enroll</th>
					<th>Tanggal Dibuat</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if ($all<>0): $no=0; ?>
					<?php foreach ($all as $key => $value): $no++; ?>
						<tr id="rows<?php echo $value->id_course ?>">
							<td ><?php echo $no ?></td>
							<td><?php echo $value->title ?></td>
							<td><?php echo $value->summary ?></td>
							<td>
								<?php 
									if ($this->course_tag->get_tag($value->id_course) <> 0) {
				                      foreach ($this->course_tag->get_tag($value->id_course) as $key => $v){
				                        echo "<span onclick='opentag(\"$v->id_tag\")' class='btn btn-xs'>".$v->name."</span> ";
				                      }                              
				                    }
								?>
							</td>
							<td>10</td>
							<td><?php echo $value->last_update ?></td>
							<td>
								<a class="btn btn-xs btn-success " href='<?= base_url() ?>course/view/<?php echo $value->id_course ?>' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
								<a class="btn btn-xs btn-warning" href='<?= base_url() ?>course/edit/<?php echo $value->id_course ?>' title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i></a>
								
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