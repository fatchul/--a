
<?php $this->load->view('template/back/modal') ?>
<style type="text/css">
    .bl{
        display: block; width: 100%; height: 100%;color: #666;
    }
    .bl-no-read{
        display: block; width: 100%; height: 100%;font-weight: bold; color: #666;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/plugins/datatables/datatables.css">
<div class="section">
<div class="container">
    <h1><span class="label label-danger lb-sm" style="color: #FFF"><?php echo $count ?></span> Course</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No </th>
				<th>Course</th>
				<th>Summary</th>
				<th>Total Silabus</th>
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
					
					
					<td><span class="btn-xs btn-primary link" onclick="silabus('<?php echo $value->id_course ?>')"><?php echo $this->silabus->total_silabus($value->id_course) ?> Silabus </span></td>
					<td><?php echo $value->last_update ?></td>
					<td>
						<a class="btn-xs btn-success " href='<?= base_url() ?>learn/<?php echo $value->slug ?>?utm=course' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
						
						<a class="btn-xs btn-danger" href="javascript:void(0)" title="Endorse Guru" onclick="endorse('<?php echo $value->id_course ?>')"><i class="glyphicon glyphicon-plus"></i></a>
					</td>
				</tr>		
			<?php endforeach ?>
		<?php endif ?>
        </tbody>
    </table>
      </div>
      
      
  </div>
</div>
</div>
<hr>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#example0').DataTable();
	} );

	
	function silabus(id){
		 $.ajax({
	        url : "<?php echo site_url('guru/course/see_silabus')?>/"+id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data){
	        	$('#modal-form').modal('show'); 
	         	$('#modal_overview').html(data);
        		
	        },error: function (jqXHR, textStatus, errorThrown){
	          alert('Error');
	        }
	      });
	}
	function endorse(id){
    
	    var post_data = {
	        'id': id,
	        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
	    };
	    $.ajax({
	      url : "<?php echo site_url('guru/course/endorse/')?>"+id,
	      data: post_data,
	      type: "POST",
	      dataType: "json",
	      success: function(data)
	      {
	      	$('#modal-form').modal('show');     
	        $('#modal_overview').html(data);
	                   
	      },
	      error: function (xhr, textStatus, errorThrown)
	      {
	        alert(xhr.responseText);
	      }
	    });

	  }
</script>
<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>