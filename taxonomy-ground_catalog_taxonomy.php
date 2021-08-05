<?php

/**
 * Taxonomy ground_catalog_taxonomy
 *
 * @package Ground
 */

get_template_part('partials/header');
?>

<div class="container">

	<?php get_template_part('partials/breadcrumbs'); ?>

	<div class="lg:flex lg:flex-wrap">

		<div class="lg:w-3/12 lg:pr-8">
			<?php get_template_part('partials/sidebar', 'secondary'); ?>
		</div>

		<div class="lg:w-9/12">

			<section class="page page--catalog-archive">

				<header class="page__header">
					<h1 class="page__title"><?php single_cat_title(); ?></h1>
				</header>

				<div class="page__body">

					<?php
					the_archive_description();

					$queried_object = get_queried_object();
					$term_id        = $queried_object->term_id;

					$args = array(
						'child_of'     => $term_id,
						'hide_empty'   => 1,
						'hierarchical' => 0,
						'parent'       => $term_id,
						'taxonomy'     => 'ground_catalog_taxonomy',
					);

					$catalog_taxonomies = get_categories($args);

					// Categories.
					if (!empty($catalog_taxonomies) && !is_wp_error($catalog_taxonomies)) :
					?>

						<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
							<?php
							foreach ($catalog_taxonomies as $catalog_taxonomy) :
							?>
								<?php
								$args = array(
									'slug'        => $catalog_taxonomy->slug,
									'name'        => $catalog_taxonomy->name,
									'description' => $catalog_taxonomy->description,
								);
								get_template_part('partials/abstract', 'taxonomy-ground_catalog', $args);
								?>
							<?php endforeach ?>
							<!-- End .row -->
						</div>

						<?php
					else : // Products.

						if (have_posts()) :
						?>
							<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
								<?php
								while (have_posts()) :
									the_post();
								?>
									<?php get_template_part('partials/abstract', 'ground_catalog'); ?>
								<?php endwhile; ?>
							</div> <!-- End .row -->
					<?php
							get_template_part('partials/pagination');
						endif;

					endif;
					?>

				</div> <!-- End .page__body -->

			</section> <!-- End .page -->

		</div>

	</div> <!-- End .row -->
</div> <!-- End .container -->

<?php
get_template_part('partials/footer');
