<?php

/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
$options = get_option('infotech_theme_option'); // unique id of the framework


?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-12 col-xl-3">
				<div class="row">
					<div class="col-12 col-sm-9 col-md-9 col-lg-8 col-xl-12">
						<div class="footer-info">
							<a class="d-flex mb-1" href="<?php echo home_url(); ?>">
								<img src=<?php echo $options['footer-logo']; ?> alt="footer logo">
							</a>
							<p class="page-para">
								<?php echo $options['footer-text']; ?>
							</p>
						</div>
					</div>
					<div class="col-12 col-sm-3 col-md-3 col-lg-4 col-xl-12">
						<div class="contact-info">
							<h6 class="footer-sub-heading">
								Fellow Us —
							</h6>
							<div class="social-media">
								<ul class="d-flex align-content-center align-items-center">
									<li>
										<a href="<?php echo $options['fellow-us-tab']['facebook-social-url']; ?>">
											<img src="<?php echo $options['fellow-us-tab']['facebook-social']; ?>">
										</a>
									</li>
									<li>
										<a href="<?php echo $options['fellow-us-tab']['twitter-social-url']; ?>">
											<img src="<?php echo $options['fellow-us-tab']['twitter-social']; ?>">
										</a>
									</li>
									<li>
										<a href="<?php echo $options['fellow-us-tab']['linkedin-social-url']; ?>">
											<img src="<?php echo $options['fellow-us-tab']['linkedin-social']; ?>">
										</a>
									</li>
									<li>
										<a href="<?php echo $options['fellow-us-tab']['youtube-social-url']; ?>">
											<img src="<?php echo $options['fellow-us-tab']['youtube-social']; ?>">
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-12 col-xl-9 mt-sm-4 mt-md-4 mt-xl-0">
				<div class="our-offices">
					<div class="contact-info">
						<h4 class="footer-heading">
							Our Offices —
						</h4>
						<div class="office-addresses">
							<div class="row">
								<div class="col-12 col-sm-12 col-md-6">
									<div class="office-address-item">
										<h6 class="footer-sub-heading">
											<?php echo $options['our-offices-tab']['office-1-name']; ?>
										</h6>
										<p class="page-para">
											<?php echo $options['our-offices-tab']['office-1-address']; ?>
										</p>
										<ul class="office-address-item-contact mt-2 d-flex justify-content-xl-between">
											<?php if ($options['our-offices-tab']['office-1-phone'] !== '') {
											?>
												<li>
													<img src="<?php echo get_template_directory_uri() ?>/assets/images/phone.svg">
													<span class="p-number">
														<?php echo $options['our-offices-tab']['office-1-phone']; ?>
													</span>
												</li>
											<?php
											} ?>
											<?php if ($options['our-offices-tab']['office-1-fax'] !== '') {
											?>
												<li>
													<img src="<?php echo get_template_directory_uri() ?>/assets/images/print.svg">
													<span class="p-number">
														<?php echo $options['our-offices-tab']['office-1-fax']; ?>
													</span>
												</li>
											<?php
											} ?>
										</ul>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-6">
									<div class="office-address-item">
										<h6 class="footer-sub-heading">
											<?php echo $options['our-offices-tab']['office-2-name']; ?>
										</h6>
										<p class="page-para">
											<?php echo $options['our-offices-tab']['office-2-address']; ?>
										</p>
										<ul class="office-address-item-contact mt-2 d-flex justify-content-xl-between">
											<?php if ($options['our-offices-tab']['office-2-phone'] !== '') {
											?>
												<li>
													<img src="<?php echo get_template_directory_uri() ?>/assets/images/phone.svg">
													<span class="p-number">
														<?php echo $options['our-offices-tab']['office-2-phone']; ?>
													</span>
												</li>
											<?php
											} ?>
											<?php if ($options['our-offices-tab']['office-2-fax'] !== '') {
											?>
												<li>
													<img src="<?php echo get_template_directory_uri() ?>/assets/images/print.svg">
													<span class="p-number">
														<?php echo $options['our-offices-tab']['office-2-fax']; ?>
													</span>
												</li>
											<?php
											} ?>
										</ul>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-6">
									<div class="office-address-item">
										<h6 class="footer-sub-heading">
											<?php echo $options['our-offices-tab']['office-3-name']; ?>
										</h6>
										<p class="page-para">
											<?php echo $options['our-offices-tab']['office-3-address']; ?>
										</p>
										<ul class="office-address-item-contact mt-2 d-flex justify-content-xl-between">
											<?php if ($options['our-offices-tab']['office-3-phone'] !== '') {
											?>
												<li>
													<img src="<?php echo get_template_directory_uri() ?>/assets/images/phone.svg">
													<span class="p-number">
														<?php echo $options['our-offices-tab']['office-3-phone']; ?>
													</span>
												</li>
											<?php
											} ?>
											<?php if ($options['our-offices-tab']['office-3-fax'] !== '') {
											?>
												<li>
													<img src="<?php echo get_template_directory_uri() ?>/assets/images/print.svg">
													<span class="p-number">
														<?php echo $options['our-offices-tab']['office-3-fax']; ?>
													</span>
												</li>
											<?php
											} ?>
										</ul>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-6">
									<div class="row">
										<div class="col-6">
											<div class="contact-info">
												<h6 class="footer-sub-heading">
													Useful links —
												</h6>
												<div class="list usefull-link">
													<?php wp_nav_menu(array(
														'theme_location' => 'footer_menu',
														'menu_class'        => 'd-flex flex-column',
													)); ?>
												</div>

											</div>
										</div>
										<div class="col-6">
											<div class="contact-info">
												<h6 class="footer-sub-heading">
													Email Us —
												</h6>
												<p class="page-para"><?php echo $options['footer-email-us']; ?></p>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
				<p class="copyright text-center"><?php echo $options['opt-copyright']; ?> <span id="copyright-year"></span>. All rights reserved.</p>
			</div>
		</div>
	</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/slick.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.news-events-slider').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3,
			autoplay: true,
			autoplaySpeed: 3000,
			dots: true,
			prevArrow: "<button class='a-left control-c prev slick-prev' ><img src='<?php echo get_template_directory_uri() ?>/assets/images/right-arrow.svg'></button>",
			nextArrow: "<button class='a-right control-c next slick-next'><img src='<?php echo get_template_directory_uri() ?>/assets/images/right-arrow.svg'></button>",
			responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});

		$('.clients-images').slick({
			infinite: true,
			slidesToShow: 6,
			slidesToScroll: 6,
			autoplay: true,
			autoplaySpeed: 3000,
			dots: true,
			prevArrow: "<button class='a-left control-c prev slick-prev' ><img src='<?php echo get_template_directory_uri() ?>/assets/images/right-arrow.svg'></button>",
			nextArrow: "<button class='a-right control-c next slick-next'><img src='<?php echo get_template_directory_uri() ?>/assets/images/right-arrow.svg'></button>",
			responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 6,
						slidesToScroll: 6,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
	});

	//copyright year display
	var copyrightElementId = document.getElementById("copyright-year");
	copyrightElementId.innerText = new Date().getFullYear();


	function openModal() {
		document.getElementById("myModal").style.display = "flex";
	}

	function closeModal() {
		document.getElementById("myModal").style.display = "none";
	}

	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	function currentSlide(n) {
		showSlides(slideIndex = n);
	}

	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("slider-item");
		var dots = document.getElementsByClassName("demo");
		var captionText = document.getElementById("caption");
		if (n > slides.length) {
			slideIndex = 1
		}
		if (n < 1) {
			slideIndex = slides.length
		}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex - 1].style.display = "block";
		dots[slideIndex - 1].className += " active";
		captionText.innerHTML = dots[slideIndex - 1].alt;
	}
</script>
<?php wp_footer(); ?>

</body>

</html>