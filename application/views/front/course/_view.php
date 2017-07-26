	<div class="container">
		<div class="row object-non-visible" data-animation-effect="fadeIn">
			<div class="col-md-12">
				<div class="footer section">
					<div class="container">
						<h1 class="title text-center" id="contact"><?= $title ?></h1>
						<p class="lead text-center"><?= $summary ?></p>	
						<div class="space"></div>
						<div class="row">
							<div class="col-sm-6">
								<div class="footer-content">
									<?= $content ?>	
									<?php if ($is_enroll){ ?>
										<a href="<?php echo site_url('learn/start/'.$_token.'/'.has(15).'')?>" class="btn btn-sm btn-primary">Mulai &#9658;</a>							
									<?php }else{ ?>							
										<a href="<?php echo site_url('learn/enroll/'.$_token.'/'.has(15).'')?>" class="btn btn-sm btn-success">Enroll &#9658;</a>	
									<?php } ?>
									
								</div>
							</div>
							<div class="hidden-lg"><br></div>
							<div class="col-sm-6">
								
								<div class="embed-responsive embed-responsive-16by9">
									<video width="400" controls>
									  <source src="<?= base_url() ?>upload/mov_bbb.mp4" type="video/mp4">
									  
									  Your browser does not support HTML5 video.
									</video>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>			
		</div>
		
	</div>


<!-- Modal -->
<div class="modal fade" id="project-1" tabindex="-1" role="dialog" aria-labelledby="project-1-label" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="modal_overview">

		</div>
	</div>
</div>
<!-- Modal end -->

<script type="text/javascript">
	function enroll() {	
		var post_data = {
			'id': id,
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		}; 
		$.ajax({
			url: '<?php echo site_url('learn/enroll/'.$_token.'/'.$this->security->get_csrf_hash().'')?>',
			type: 'GET',        
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