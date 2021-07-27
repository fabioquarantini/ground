<?php // Slider primary (Register block here: "inc/gutenberg.php")
$repeater = get_field('repeater');
?>

<?php if ($repeater) : ?>

	<div class="container">
		<div class="row">
			<div class="gr-12">

				<div class="slider slider--primary slider--cursor-navigation swiper-container js-slider-primary">
					<div class="swiper-wrapper">

						<?php foreach ($repeater as $row) :

							// Vars
							$image = $row['image'];
							$size = 'full'; // (thumbnail, medium, large, full or custom size)
							$title = $row['title'];
							$content = $row['content'];
							$button = $row['button']; ?>

							<div class="slider__item swiper-slide">

								<?php if ($image) : ?>
									<?php echo wp_get_attachment_image($image, $size, "", ["class" => "slider__img cover"]); ?>
								<?php endif; ?>

								<div class="slider__body centered text-center">

									<?php if ($title) : ?>
										<h3 class="slider__title"><?php echo $title; ?></h3>
									<?php endif; ?>

									<?php if ($content) : ?>
										<p class="slider__text"><?php echo $content; ?></p>
									<?php endif; ?>

									<?php if ($button) : ?>
										<a class="slider__button button button" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
									<?php endif; ?>

								</div>
							</div>

						<?php endforeach; ?>

					</div> <!-- End .swiper-wrapper -->

					<div class="slider__pagination swiper-pagination js-slider-primary-pagination"></div>
					<div class="slider__navigation slider__navigation--prev swiper-button-prev js-slider-primary-navigation-prev"></div>
					<div class="slider__navigation slider__navigation--next swiper-button-next js-slider-primary-navigation-next"></div>
				</div> <!-- End .slider -->

			</div>
		</div>
	</div>

<?php endif; ?>