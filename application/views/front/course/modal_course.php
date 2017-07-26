<div class="loading" style="display: none"></div>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title" id="project-1-label"><?php echo $__title ?></h4>
</div>
<div class="modal-body">
	<h3>Deskripsi</h3>
	<div class="row">
		<div class="col-md-6">
			<?php echo $__content ?>
		</div>
		<div class="col-md-6">
			<img src="<?php echo $__open_img ?>" alt="">
		</div>
	</div>
</div>
<div class="modal-footer">	

	<?php if ($is_enroll){ ?>
	<a href="<?php echo site_url('learn/start/'.$_token.'/'.has(15).'')?>" class="btn btn-sm btn-primary">Mulai &#9658;</a>             
	<?php }else{ ?>             
	<span onclick="opencourse()" id="txt" class="btn btn-sm btn-success">Enroll This Course  &#9658;</span>	
	<?php } ?>		
</div>

<script type="text/javascript">
	function opencourse() {
		var post_data={
			'__session' : '<?php echo $__id ?>',
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		};

		$.ajax({
			url: "<?php echo site_url('front/course/open')?>",
			type: 'POST',        
			data: post_data,            
			dataType: 'json',
			beforeSend: function(){
				   $('.loading').show();
				   $('#txt').text("Wait..");
			    },
			complete: function(){
				    $('.loading').hide();
				},
			success : function(response) {
				if( response.status === true ){
					window.location.href = response.redirect;
				} 
			}
		}); 
	}
</script>

