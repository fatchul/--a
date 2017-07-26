
<div class="panel-body table-responsive">

<br>
<br>
<table id="example0" class="table display">
	<thead>
		<tr class="text-center">
			<th>No </th>
			<th>Silabus</th>
			<th>Jumlah Enroll Total</th>
			<th>Tanggal Dibuat</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php if ($all<>0): $no=0; ?>
			<?php foreach ($all as $key => $value): $no++; ?>
				<tr id="rows<?php echo $value->id_silabus ?>">
					<td ><?php echo $no ?></td>
					<td><?php echo $value->no_urut.". ".$value->title_silabus ?></td>
					<td><span class="btn-xs btn-primary link" onclick="enroll('<?php echo $value->id_silabus ?>')"><?php echo $this->enroll->total_enrollment($value->id_silabus) ?>  </span></td>
					
					<td><?php echo $value->last_update ?></td>
					<td>
						<a class="btn-xs btn-success " href='<?= base_url() ?>tutorial/<?php echo $value->id_silabus ?>?utm=silabus' title="Lihat" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a>
						
					</td>
				</tr>		
			<?php endforeach ?>
		<?php endif ?>
	</tbody>
</table>
</div>
<?php $this->load->view('template/back/modal') ?>


<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>