<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart(base_url(uri_string()),"class='form-horizontal'") ?>    
  <?php echo t_text('Kategori','category',$res[0]->category) ?>
  <?php echo t_text('Judul','title',$res[0]->title) ?>
  <?php echo t_editor('Isi','konten',$res[0]->content) ?>   
  <?php echo t_radio_select('Keterangan','is_post','1','0','Publish','Draft',$res[0]->is_post) ?>
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>