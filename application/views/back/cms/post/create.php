<?php echo open_bootstrap(); ?>
<?php echo form_open_multipart('',"class='form-horizontal'") ?>     
  <?php echo t_select("Kategori",'kategori','kategori',$kategori) ?>  
  <?php echo t_text('Judul','title') ?>
  <?php echo t_editor('Isi','konten') ?> 
  <?php echo t_file('Thumbnail <br> <span class=badge>Ukuran gambar ideal <br> 1200px X 600px</span>','foto') ?> 
  <?php echo t_radio('Keterangan','is_post','1','0','Publish','Draft') ?>  
  <?php echo t_submit('','btn-save',"Simpan") ?>                  
</form>
<?php echo close_bootstrap(); ?>