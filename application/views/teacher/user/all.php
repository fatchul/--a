
<?php $this->load->view('template/back/modal') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/plugins/datatables/datatables.css">
<div class="section">
<div class="container">
    <h1><span class="label label-danger lb-sm" style="color: #FFF"><?php echo $count ?></span> Data Siswa</h1>
    <hr>
  <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              
              <th>Tanggal Mendaftar</th>
              
              <th>Jenis Kelamin</th>
              <th>HP</th>
              <th>Aktif</th>
              <th>Lihat</th>
            </tr>
        </thead>
        
        <tbody>
            <?php if ($all<>0): $no=0; ?>
              <?php foreach ($all as $key => $value): $no++; ?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?= $value->nama ?></td>
                <td><?= $value->email ?></td>
                
                <td><?= $value->date_join ?></td>
                
                <td><?= gender($value->gender) ?></td>
                <td><?= $value->phone ?></td>
                <td><?= oke($value->is_valid) ?></td>
                <td><span class="btn-primary btn-xs" onclick="detail(<?= $value->id_user ?>)">Detail</span></td>
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