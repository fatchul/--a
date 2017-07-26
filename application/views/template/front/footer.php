<footer>

<div class="footer" style="background-image: url('<?= base_url() ?>asset/images/footer_back.png');background-size: cover;background-color: #e6e6e6;background-repeat: no-repeat;">

	<div class="container">
		<div class="footer-agileitsrow" style="margin-bottom: 15px">
			<div class="col-md-12" style="height:20px"></div>
			<div class="col-md-4 footer-grid">
				<h3>Arkademy</h3>

				<?php echo $meta_desc ?>
				<br><br>
				<p>Arkademy adalah platform belajar Internet of Things yang mempunyai misi untuk mendidik pelajar SMK dan mahasiswa agar menjadi ahli Internet of Things (IoT) di masa depan.</p>
				<h5>Social Media</h5>
				<?php if ($socmed<>0): ?>
					<?php foreach ($socmed as $key => $value): ?>
						<a href="<?php echo $value->the_value_is ?>" class="social-icon si-rounded <?php echo $value->add_ico ?>" title="<?php echo $value->sosmed ?>">
							<i class="<?php echo $value->favicon ?>"></i>
							<i class="<?php echo $value->favicon ?>"></i>
						</a>		
					<?php endforeach ?>
				<?php endif ?>
			</div>
			
			<div class="col-md-3 hidden-xs footer-grid">
				<h3>Hubungi kami</h3>
				<p>Arkademy IoT Learning Platform<br> Menara Multimedia, Lt.6 Jl. Kebon Sirih No.12 Jakarta, Indonesia  Email: <a class="email-link" href="mailto:hello@arkademy.com">hello@arkademy.com</a></p>
				<div class="footer-grid-address">
					<p>Butuh bantuan?</p>
					<p>Telp:+62 812 6037 6789 (Alfa)</p>
				</div>
			</div>

			<div class="clearfix"></div>
			<div class="col-xs-12 hidden-md hidden-lg hidden-sm footer-grid" style="margin-top: 20px">
				<hr style="border-color: #000">
				<h3>Hubungi kami</h3>
				<p>Arkademy IoT Learning Platform<br> Menara Multimedia, Lt.6 Jl. Kebon Sirih No.12 Jakarta, Indonesia  Email: <a class="email-link" href="mailto:hello@arkademy.com">hello@arkademy.com</a></p>
				<div class="footer-grid-address">
					<p>Butuh bantuan?</p>
					<p>Telp:+62 812 6037 6789 (Alfa)</p>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div> 
<!-- .footer end -->

<!-- .subfooter start -->
<!-- ================ -->
<div class="subfooter" style="background-color: #808080">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="text-center" style="color: #fff">Copyright © 2017 by <a target="_blank" href="">Arkana IoT Platform</a>.</p>
			</div>
		</div>
	</div>
</div>
<!-- .subfooter end -->

</footer>