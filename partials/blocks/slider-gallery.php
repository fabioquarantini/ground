<?php // Slider gallery (Register block here: "inc/gutenberg.php")
$gallery = get_field('gallery');
$image_size = '16-9-small';
?>

<?php if ($gallery) : ?>

	<div class="container">
		<div class="row">
			<div class="gr-12">

				<div class="slider slider--gallery slider--cursor-navigation swiper-container overflow-visible js-slider-gallery">
					<div class="swiper-wrapper">

						<?php foreach ($gallery as $image_id) : ?>

							<div class="slider__item swiper-slide">
								<div data-swiper-parallax="50%">
									<div class="position-relative">
										<?php echo wp_get_attachment_image($image_id, $image_size, "", ["class" => "slider__img cover"]); ?>
									</div>
								</div>
							</div>

						<?php endforeach; ?>

					</div> <!-- End .swiper-wrapper -->

					<!-- <div class="slider__pagination swiper-pagination js-slider-primary-pagination"></div> -->
					<div class="slider__navigation slider__navigation--prev swiper-button-prev js-slider-primary-navigation-prev js-cursor-left"></div>
					<div class="slider__navigation slider__navigation--next swiper-button-next js-slider-primary-navigation-next js-cursor-right"></div>

				</div> <!-- End .slider -->

			</div>
		</div>
	</div>

<?php endif; ?>