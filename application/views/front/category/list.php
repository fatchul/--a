<div class="section">
	<div class="container">
		<div class="row object-non-visible" data-animation-effect="fadeIn">
			
			<div class="row-fluid top30 pagetitle">

				<div class="container">
					<div class="row">
					<div class="col-md-12"><h1><?php echo $seo ?></h1></div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<hr>
						<?php if ($article<>0): ?>
							<?php foreach ($article as $key => $value): ?>

								<div class="row">
									<div class="col-sm-4"><a href="" class=""><img src="<?php echo base_url() ?>upload/post/<?php echo $value->filepath ?>" class="img-responsive"></a>
									</div>
									<div class="col-sm-8">
										<h3 class="title"><a href="<?php echo site_url("read/".$this->uri->segment(1)."/".$value->slug) ?>"><?php echo $value->title_post ?></a></h3>
										<?php list($conclusion) = explode('.', $value->content); ?>
										<?php echo $conclusion ?>.

										<p class="text-muted">Posted : Administrator</a></p>

									</div>
								</div>
								<hr>
							<?php endforeach ?>
						<?php endif ?>
						
						


				</div>
			</div>
		</div>

		

	</div>
</div>
</div>


