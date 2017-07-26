
<div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><b>Link</b></h4>
    </div>
    <div class="modal-body" >
      <?php echo form_open_multipart('',"class='form-horizontal'") ?> 
    	<?php echo t_text('Link Direct','nama_skolah',$link) ?>
      <?php echo t_text('Link Download','nama_skolah',$link_download) ?>
      <?php echo form_close() ?>
    </div>
     <div class="modal-footer" >
        
    </div>
</div>
