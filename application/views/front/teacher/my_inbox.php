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
    <h1><span class="label label-danger lb-sm" style="color: #FFF"><?php echo $count_msg ?></span> Kotak Masuk</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Pengirim</th>
                <th>Subjek</th>
                <th>Tanggal Terkirim</th>
            </tr>
        </thead>
        
        <tbody>
            <?php if ($inbox<>0): ?>
                <?php foreach ($inbox as $key => $value): ?>
                    <?php
                        $bl="bl" ;
                        if ($value->is_read_by_user=='0') {
                            $bl="bl-no-read";
                        }
                    ?>
                    <tr class="bc">
                        <td><a href="" class="<?php echo $bl ?>">Administrator</a></td>
                        <td><a href="" class="<?php echo $bl ?>"><?php echo $value->subjek ?></a></td>
                        <td><a href="" class="<?php echo $bl ?>"><?php echo $value->date_create ?></a></td>

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