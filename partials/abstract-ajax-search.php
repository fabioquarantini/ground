<?php
$args = array(
	'post_type'      => array( 'product' ),
	'posts_per_page' => 30,
	'post_status'    => 'publish',
	'meta_query'     => array(
		array(
			'key'   => '_stock_status',
			'value' => 'instock',
		),
		array(
			'key'   => '_backorders',
			'value' => 'no',
		),
	),
	's'              => esc_attr( $_POST['keyword'] ),
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post(); ?>

			<div class="col-span-6 md:col-span-3 mb-12 lg:mb-24">
				<?php get_template_part( 'woocommerce/content-product' ); ?>
			</div>

		<?php
	}
} else {
	?>
	<p class="col-start-3 col-span-8 lg:col-start-4 lg:col-span-6 text-center text-2xl"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ground' ); ?></p>
	<?php
}

wp_reset_postdata();



die();
?>
