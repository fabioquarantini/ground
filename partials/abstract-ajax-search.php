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

			<div class="col-span-6 md:col-span-3 lg:col-span-2 mb-12 lg:mb-24">
				<a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?php echo esc_url( post_permalink() ); ?>">

					<?php if ( has_post_thumbnail() ) { ?>
						<img class="rounded-theme attachment-woocommerce_thumbnail size-woocommerce_thumbnail object-cover" src="<?php the_post_thumbnail_url( 'medium' ); ?>" loading="lazy"/>
					<?php } else { ?>
						<img class="rounded-theme attachment-woocommerce_thumbnail size-woocommerce_thumbnail object-cover" src="<?php echo GROUND_NO_IMAGE_URL; ?>" loading="lazy">
					<?php } ?>


					<h5 class="woocommerce-loop-product__title">
						<?php the_title(); ?>
					</h5>

					<div class="woocommerce-loop-product__description "><p><?php ground_excerpt( 100 ); ?></p> </div>

					<?php
					global $woocommerce;
					$currency = get_woocommerce_currency_symbol();
					$price    = get_post_meta( get_the_ID(), '_regular_price', true );
					$sale     = get_post_meta( get_the_ID(), '_sale_price', true );
					?>

					<?php if ( $sale ) : ?>
						<span class="price">
							<del>
								<span class="woocommerce-Price-amount amount"><?php echo $price; ?><span class="woocommerce-Price-currencySymbol"><?php echo $currency; ?></span></span>
							</del>
							<ins>
								<span class="woocommerce-Price-amount amount"><?php echo $sale; ?><span class="woocommerce-Price-currencySymbol"><?php echo $currency; ?></span></span>
							</ins>
						</span>
					<?php elseif ( $price ) : ?>
						<span class="price">
							<span class="woocommerce-Price-amount amount"><?php echo $price; ?><span class="woocommerce-Price-currencySymbol"><?php echo $currency; ?></span></span>
						</span>
					<?php endif; ?>
				</a>
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
