<?php
$args = array(
	'post_type' => array( 'product' ),
	'posts_per_page' => 30,
	's' => esc_attr( $_POST['keyword'] )
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post(); ?>

			<div class="item item--small">
				<a class="item__link clear-fix" href="<?php echo esc_url( post_permalink() ); ?>">
					<figure class="item__media media">
						<?php if ( has_post_thumbnail() ) { ?>
							<img class="media__img lazyload" data-src="<?php the_post_thumbnail_url('medium'); ?>"/>
						<?php } else { ?>
							<img class="media__img lazyload" data-src="<?php echo TEMPLATE_URL ?>/img/no-image.svg">
						<?php } ?>
					</figure>

					<h5 class="item__title">
						<?php the_title();?>
					</h5>

					<p class="item__body"><?php ground_excerpt( 100 ); ?> </p>

					<?php
					global $woocommerce;
					$currency = get_woocommerce_currency_symbol();
					$price = get_post_meta( get_the_ID(), '_regular_price', true);
					$sale = get_post_meta( get_the_ID(), '_sale_price', true);
					?>

					<?php if($sale) : ?>
						<span class="price margin-0">
							<del>
								<span class="woocommerce-Price-amount amount"><?php echo $price ?><span class="woocommerce-Price-currencySymbol"><?php echo $currency; ?></span></span>
							</del>
							<ins>
								<span class="woocommerce-Price-amount amount"><?php echo $sale; ?><span class="woocommerce-Price-currencySymbol"><?php echo $currency; ?></span></span>
							</ins>
						</span>
					<?php elseif($price) : ?>
						<span class="price margin-0">
							<span class="woocommerce-Price-amount amount"><?php echo $price ?><span class="woocommerce-Price-currencySymbol"><?php echo $currency; ?></span></span>
						</span>
					<?php endif; ?>
				</a>
			</div>

	<?php }
} else { ?>
	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ground' ); ?></p>
<?php }

wp_reset_postdata();



die();
?>

