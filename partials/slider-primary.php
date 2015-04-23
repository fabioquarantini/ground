<?php

// Name of the thumbnails set in add_image_size
$thumbnail = 'thumb-slider-primary';

$args = array(
	'post_type' => 'ground_slider',
	'posts_per_page' => '10',
	'slide-category' => ''
);

$slider_posts = new WP_Query( $args );

if( $slider_posts->have_posts() ) { ?>

	<div class="slider slider--primary">

		<?php while( $slider_posts->have_posts() ) : $slider_posts->the_post() ?>

			<div class="slider__item">
				<?php the_post_thumbnail( $thumbnail, array( 'class' => 'slider__img') ); ?>
				<?php if( $post->post_content != "" ) {
					echo '<div class="slider__caption">';
					the_content();
					echo '</div><!-- End .slider__caption -->';
				} ?>
			</div><!-- End .slider__item -->

		<?php endwhile ?>

	</div><!-- End .slider- -primary -->

<?php }

wp_reset_postdata();

?>
