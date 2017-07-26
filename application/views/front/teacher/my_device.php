<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/plugins/datatables/datatables.css">
<div class="section">
    <div class="container">
        <h1>Device Management</h1>
        <?php $this->load->view('template/front/notif') ?>
        <hr>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <button type="button" data-toggle="modal" class="btn-success btn-md btn" data-target="#device">Tambah Device</button>
            <button type="button" class="btn-warning btn-md btn" id="connect" onclick="getTokens()">Refresh Tokens</button>
            <br><br>
            <div class="alert alert-danger" id="error" style="display: none">
                <strong>Koneksi gagal.
            </div>
            <div class="alert alert-success" id="success" style="display: none">
                  <strong>Koneksi berhasil.
                </div>
            <table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
                <br>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Device</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                $count=0;
                foreach($devices as $key=>$val){
                    $count++;
                    echo '<tr>';
                        echo '<td>';
                        echo $count;
                        echo '</td>'; 
                        echo '<td>';
                        echo $val;
                        echo '</td>'; 
                        echo '<td>';
                        echo '<a href="'.site_url('g/device/delete/'.$val).'">Delete</a>';
                        echo '</td>'; 
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
</div>

<hr>

<div class="modal fade" id="device" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Device</h4>
        </div>
        <div class="modal-body">
            <?php echo form_open(base_url()."g/device/save","class='form-horizontal'") ?>
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Platform's Host URL</label> 
                        <p>Use this platform's host url for device Flash</p>        
                        <p class="col-md-12" id="platform_url" name="platform_url"><font style="color: blue"><b>http://arkana.arkademy.com:8080/api/rest</b></font></p>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Register Token</label> 

                        <p>Use this token for device Flash</p>        
                        <font style="color: blue"><p class="col-md-12" id="reg_token" name="reg_token"></p></font>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Device GUID</label>         
                        <input type="text" class="sm-form-control required" id="nama_device" name="nama_device">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-12">
                        
                        <button class="button button-3d nomargin" name="_btn_save" type="submit" value="1" id="register">
                            Tambahkan
                        </button>
                        
                        
                        <a href="<?=base_url()?>asset/files/linux-arkana.zip" class="button button-3d nomargin" name="download_windows" type="submit" value="1" id="download_linux" title="Download For Linux">
                            <span class="glyphicon glyphicon-save"></span title="Download"> Linux
                        </a>
                        <a href="<?=base_url()?>asset/files/windows-arkana.zip" class="button button-3d nomargin" name="download_windows" type="submit" value="1" id="download_windows" title="Download For Windows">
                            <span class="glyphicon glyphicon-save"></span title="Download"> Windows
                        </a>
                        

                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
        $('#example').DataTable();
        getTokens();
        
    } );

  function getTokens(){ 
            $.ajax({
                    url : "<?php echo site_url('g/device/test_connect')?>",
                    type: "POST",
                    cache: false,
                    data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
                    dataType: "JSON",
                    beforeSend: function(){
                        $('#success').hide();
                        $('#error').hide();
                        $('#connect').text("Connecting..");
                        $('.loading').show();
                    },
                    error: function (response) {
                        $('.loading').hide();
                        $('#connect').text("Test");
                        $('#error').show();
                    },
                    complete: function(){
                        $('.loading').hide();
                    },
                    success: function(response)
                    {
                        if (response.stat==true) {
                            $('#success').show();

                            $('#success').html('<b>Your Access Token is : '+response.token+'</b>');
                            $('#reg_token').html('<b>'+response.register_token+'</b>');

                            $('#connect').text("Refresh Token");
                        }
                        else{
                            $('#connect').text("Refresh Once Again");
                            $('#error').show();   
                        }
                    },
                    
            })
        }
  
</script>
<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>