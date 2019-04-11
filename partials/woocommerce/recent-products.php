<?php if ( class_exists( 'WooCommerce' ) ) {

	woocommerce_product_loop_start();

	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 4,
		// 'product_cat' => 'your cat here',
		'orderby' => 'date',
		'order' => 'DESC'
	);

	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="gr-3@md gr-6@sm gr-12 margin-bottom-1">
				<?php wc_get_template_part( 'content', 'product' ); ?>
			</li>
		<?php endwhile;
	} else {
		echo __( 'No products found' );
	}

	wp_reset_postdata();
	woocommerce_product_loop_end();

} ?>