<div class="section">
	<div class="container">
		<h1 class="text-center title" id="portfolio">Course</h1>
		<div class="separator"></div>
		<p class="lead text-center"><!--Course Summary Here--></p>
		<br>			
		<div class="row object-non-visible" data-animation-effect="fadeIn">
			<div class="col-md-12">

				<!-- isotope filters start -->
				<div class="filters text-center">
					<ul class="nav nav-pills">
						<li class="active"><a href="#" data-filter="*">All</a></li>
						<?php if ($tag<>0): ?>
							<?php foreach ($tag as $key => $t): ?>
								<li><a href="#" data-filter=".<?php echo $t->id_tag ?>"><?php echo $t->name ?></a></li>		
							<?php endforeach ?>
						<?php endif ?>
					</ul>
				</div>
				<!-- isotope filters end -->

				<!-- portfolio items start -->
				<div class="isotope-container row grid-space-20">
					<?php if ($course<>0): ?>
						<?php foreach ($course as $key => $value): ?>
							<?php 
								$id_tag=$this->course_tag->specific_column('id_tag','id_course',$value->id_course);
								$tag_list=$this->course_tag->get_all_only('id_course',$value->id_course);
							?>
							<div class="col-sm-6 col-md-3 isotope-item <?php if ($tag_list<>0) {
									foreach ($tag_list as $key => $tl) {
										echo $tl->id_tag." ";
									}
								} ?>">
								<div class="image-box">
									<div class="overlay-container">								
										<img src="<?= base_url() ?><?php echo $value->directory."/".$value->enc_name."_thumb".$value->mime ?>" alt="" width="262px" height="175px">								
										<a class="overlay" data-toggle="modal" onclick="opens('<?php echo $value->id_course ?>','<?php echo $value->token ?>')">
											<i class="fa fa-search-plus"></i>
											<span><?php echo $value->title ?></span>
										</a>
									</div>
									<a class="btn btn-default btn-block" href="<?= base_url() ?>learn/<?php echo $value->slug ?>"><?php echo $value->title ?></a>
								</div>
								
							</div>		
						<?php endforeach ?>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function() {
	    $("#nav li a").click(function() {
	 
	        $("#ajax-content").empty().append("<div id='loading'><img src='images/loading.gif' alt='Loading' /></div>");

	        $("#nav li a").removeClass('current');
	        $(this).addClass('current');
	        $.ajax({ 
	        	url: this.href, 
	        	success: function(html) {
	            	$("#ajax-content").empty().append(html);
	            }
	    });
	    return false;
	    });  
	});
</script>

<!-- Modal -->
<div class="modal fade" id="project-1" tabindex="-1" role="dialog" aria-labelledby="project-1-label" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="modal_overview">

		</div>
	</div>
</div>
<!-- Modal end -->

<script type="text/javascript">
	function opens(id,token) {	
		var post_data = {
	        'id': id,
	        '__token': token,
	        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
	    }; 
		$(document).ready(function() {
			$.ajax({
				url : "<?php echo site_url('front/course/open_course')?>",
				data: post_data,
				type: "POST",
				dataType: "json",
				beforeSend: function(){
				        $('.loading').show();
				    },
				complete: function(){
				        $('.loading').hide();
				    },	
				success: function(data)
				{
					$('#modal_overview').html(data);
					$('#project-1').modal('show');                
				},
				error: function (xhr, textStatus, errorThrown)
				{
					alert(xhr.responseText);
				}
			});
		});
	}
</script>