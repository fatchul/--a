
<div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><b><?php echo $title ?></b></h4>
    </div>
    <div class="modal-body" >
      <div class="row">
        <div class="col-md-8">
          <table class="table ">
            <thead>
              <tr class="text-center">
                <th>No </th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Terakhir Login</th>
                <th><span onclick="checkall()" class="btn btn-xs">All</span></th>
              </tr>
            </thead>
            
            <tbody>
              <?php if ($all<>0): $no=0; ?>
                <?php foreach ($all as $key => $value): $no++; ?>
                  <tr>
                    <td ><?php echo $no ?></td>
                    <td><?php echo $value->nama ?></td>
                    <td><?php echo $value->email ?></td>
                    <td><?php echo role($value->role) ?></td>
                    <td><?php echo $value->last_login ?></td>
                    <td align="center"><input type="checkbox" name="cb[]" value="<?php echo $value->id_user ?>"></td>
                  </tr>   
                <?php endforeach ?>
              <?php endif ?>
            </tbody>
          </table>    
        </div>
        <div class="col-md-4 gets">
            <p align="center"><b>Siswa Yang Terdaftar Dalam Kelas Ini</b></p>
             <table class="table ">
                <thead>
                  <tr class="text-center">
                    
                    <th>Nama</th>                    
                    <th><span onclick="o()">Hapus</span></th>
                  </tr>
                </thead>
                
                <tbody >
                  <?php if ($listed_course<>0):  ?>
                    <?php foreach ($listed_course as $key => $v):  ?>
                      <tr id="rows<?php echo $v->id ?>">
                        <td><?php echo $v->nama ?></td>
                        
                        <td align="center">
                          <a class="btn-xs btn-danger " href='javascript:void()' title="Hapus" onclick="del(<?php echo $v->id ?>)"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                      </tr>   
                    <?php endforeach ?>
                  <?php endif ?>
                </tbody>
              </table> 
        </div>
      </div>
      
    </div>
     <div class="modal-footer" >
        <button class="btn btn-primary" onclick="save()" id="btnSave">Simpan</button>
    </div>
</div>


<script type="text/javascript">

  function save()
  {
      $('#btnSave').text('Menyimpan...'); //change button text
      //$('#btnSave').attr('disabled',true); //set button disable 

      var data = { 'cb' : []};
      $(":checked").each(function() {
        data['cb'].push($(this).val());
        data['course']='<?php echo $course ?>';
      });

      var post_data = {
          'id' : data,
          'course' : data,
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
      };

      $.ajax({
          url : "<?php echo site_url('guru/course/save')?>",
          type: "POST",
          data: data,
          dataType: "JSON",
          success: function(data)
          {
              $('#modal-form').modal('hide');             
              $('#btnSave').text('Simpan'); //change button text
              $('#btnSave').attr('disabled',false); //set button enable 
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error adding data');
              $('#btnSave').text('Simpan'); //change button text
              $('#btnSave').attr('disabled',false); //set button enable 

          }
      });
  }
  function checkall(){
    $(':checkbox').each(function() {
            this.checked = true;                        
    });
  }
  function del(id){
    if(confirm('Are you sure delete this data?')){
      $.ajax({
        url : "<?php echo site_url('guru/course/revoke')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data){
           $('#rows'+id).remove();
        },error: function (jqXHR, textStatus, errorThrown){
          alert('Error deleting data');
        }
      });
    }
  }

</script>
<script src="<?= base_url(); ?>asset/js/datatables/datatables.min.js"></script>
