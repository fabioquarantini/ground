<?php

$thumbnail = 'thumb-slideshows';	// Name of the thumbnails set in add_image_size

$args = array(
	'post_type' => 'ground_slide',
	'posts_per_page' => '10',
	'slide-category' => ''
);

$slider_posts = new WP_Query($args);

if($slider_posts->have_posts()) { ?>

	<div class="flexslider slider">
		<ul class="slides">
			<?php while($slider_posts->have_posts()) : $slider_posts->the_post() ?>
			<li>
				<?php the_post_thumbnail( $thumbnail, array( 'class' => 'slide-image') ); ?>
				<?php if( $post->post_content != "" ) {
					echo '<div class="slide-caption">';
					the_content();
					echo '</div>';
				} ?>
			</li>
			<?php endwhile ?>
		</ul>
	</div> <!-- End .slider -->

<?php }

wp_reset_query();

?>