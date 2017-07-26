<style>
#myProgress {
      width: 100%;
      background-color: #ddd;
  }

  #myBar {
      width: 1%;
      height: 30px;
      background-color: #4CAF50;
  }
</style>
<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('admin/broadcast/proceed',"class='form-horizontal upload-form'") ?>   
<?php //echo t_text('Kepada','to') ?>
<div class='form-group'>
    <label class='col-sm-2 control-label form-label'></label>
    <div class='col-sm-3'>
        <select name="opsi" class="form-control" id="ops">
            <option value="all">--All--</option>
            <option value="pilih_sekolah">--Pilih Sekolah--</option>
        </select>
    </div>                            
</div> 
<div class='form-group' id="pilih_semua">
	<label class='col-sm-2 control-label form-label'>Kepada</label>
	<div class='col-sm-6 checkbox'>
		<div class="checkbox checkbox-success checkbox-inline">
			<input type="checkbox" id="all_subscriber" value="P" class="ce" name='cek[]' checked>
			<label for="all_subscriber"> Semua Subscribers </label>
		</div>
		<div class="checkbox checkbox-success checkbox-inline">
			<input type="checkbox" id="admin_sekolah" value="S" class="ce"  name='cek[]' checked="">
			<label for="admin_sekolah"> Administrator Sekolah </label>
		</div>
		<div class="checkbox checkbox-success checkbox-inline">
			<input type="checkbox" id="guru" value="G"  class="ce" name='cek[]' checked="">
			<label for="guru"> Guru </label>
		</div>
		<div class="checkbox checkbox-success checkbox-inline">
			<input type="checkbox" id="siswa" value="M" class="ce"  name='cek[]' checked="">
			<label for="siswa"> Siswa </label>
		</div>
	</div>                            
</div>
<div id="c" style="display: none">
    <div class="form-group" id="list_sekolah" >
        <label class="col-sm-2 control-label form-label"> Pilih Sekolah</label>
        <div class="col-sm-10">
            <select class="form-control" name="id_sekolah[]" id="form-field-select-2" multiple="multiple" style="height: 300px">
                <?php if ($sekolah<>0): ?>
                  <?php foreach ($sekolah as $key => $value): ?>
                    <?php echo "<option value=".$value->id_school.">".$value->school_name."</option>"; ?>
                <?php endforeach ?>
            <?php endif ?>
        </select>
        </div>
    </div>
    <div class='form-group' id="pilih_semua">
        <label class='col-sm-2 control-label form-label'>Pilih</label>
        <div class='col-sm-6 checkbox'>
            <div class="checkbox checkbox-success checkbox-inline">
                <input type="checkbox" id="_guru" value="G_"  class="co" name='ceks[]' checked="">
                <label for="_guru"> Guru </label>
            </div>
            <div class="checkbox checkbox-success checkbox-inline">
                <input type="checkbox" id="_siswa" value="M_" class="co"  name='ceks[]' checked="">
                <label for="_siswa"> Siswa </label>
            </div>
        </div>                            
    </div>
</div>
<?php echo t_text('Judul Pesan','judul','','title') ?>
<?php echo t_editor('Pesan','pesan','','pesan') ?> 
<div class='form-group'>
    <label class='col-sm-2 control-label form-label'></label>
    <div class='col-sm-8'>
        <input type='button' name='send' class='btn btn-default' value='Kirim' id='send' >       
        <span class='help-block'></span>
    </div>                            
</div> 

<div id="myProgress" style="display: none">
  Please Wait .. <div id="myBar"></div>
</div> 
<div class="alert alert-success" id="sukses" style="display: none">
  <strong>Success!</strong> Pesan terkirim.
</div>     
<div class="alert alert-danger" id="gagal" style="display: none">
  <strong>Success!</strong> Pesan terkirim.
</div>          
</form>
<?php echo close_bootstrap(); ?>

<script type="text/javascript">
	
  $(document).ready(function() {
    $("#send").click(function(){
        var title = document.getElementById("title").value;    
        var msg =  CKEDITOR.instances['pesan'].getData();
        var ops = document.getElementById("ops").value; 
        
        var ids = [];
        var idsco = [];
        var is=[];
        $('.ce:checked').each(function(i, e) {
            ids.push($(this).val());
        });
        $('.co:checked').each(function(i, e) {
            idsco.push($(this).val());
        });
        $('#list_sekolah option:selected').each(function() {
            is.push($(this).val());
        });
        
        var post_data={
            'judul' : title,
            'pesan' : msg,
            'cek[]' : ids,
            'id_sekolah[]' : is,
            'ceks[]' : idsco,
            'ops' : ops,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
        };
        $.ajax({
            url : "<?php echo site_url('admin/broadcast/sent')?>",
            type: "POST",
            cache: false,
            data: post_data,
            dataType: "JSON",
            beforeSend: function(){
                $('#sukses').hide();
                $('#myProgress').show();
                var elem = document.getElementById("myBar");
                var width = 10;
                var id = setInterval(frame, 10);
                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                    } else {
                        width++;
                        elem.style.width = width + '%';
                        elem.innerHTML = width * 1 + '%';
                    }
                }
            },
            complete: function(){
                $('#myProgress').hide();
                $('#sukses').show();

            },
            error: function (r) {
                var r = jQuery.parseJSON(response.responseText);
                alert("Message: " + r.Message);
                alert("StackTrace: " + r.StackTrace);
                alert("ExceptionType: " + r.ExceptionType);
            },
            success: function(response)
            {
                if( response.status === true ){
                    window.location.href = response.redirect;
                }
                else{
                    $('#gagal').text(response.pesan);
                }
            }
        })
    });

});

</script>

<script type="text/javascript">
    $(document).ready(function () {
      $("#ops").change(function () {
        $(this).find("option:selected").each(function () {
          if (($(this).attr("value") == "all")) {
            $("#c").hide();
            $("#pilih_semua").show();
          }
          else {
            $("#c").show();
            $("#pilih_semua").hide();
          }
        });
      }).change();
    });

  </script>