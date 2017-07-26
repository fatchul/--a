<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?> 
  <?php echo t_text('Tag','tag') ?>
  <?php echo t_radio('Keterangan','is_publish','1','0','Yes','No') ?>
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>