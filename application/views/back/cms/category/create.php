<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>   
  <?php echo t_text('Kategori','category',$kategori) ?>
  <?php echo t_text('Judul','title') ?>  
  <input type="hidden" name="konten">
  <?php echo t_radio('Keterangan','is_post','1','0','Publish','Draft') ?>  
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>