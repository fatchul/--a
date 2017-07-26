
<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart(base_url(uri_string()),"class='form-horizontal'") ?>  
  <?php echo t_text('Tag','tag',$res[0]->name) ?>
  <?php echo t_radio_select('Keterangan','is_publish','1','0','Publish','Draft',$res[0]->is_publish) ?>  
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>