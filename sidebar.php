<div class="sidebar">

	<?php get_search_form(); ?>

	<nav class="navigation-cpt-category" role="navigation">
		<?php get_template_part( 'partials/menu', 'cpt-category' ); ?>
	</nav> <!-- End .navigation-cpt-category -->

	<nav class="navigation-hierarchy" role="navigation">
		<?php get_template_part( 'partials/menu', 'page-hierarchy' ); ?>
	</nav> <!-- End .navigation-hierarchy -->

	<?php if ( is_active_sidebar( 'sidebar-primary' ) ) { ?>

		<div class="sidebar-primary" role="complementary">
			<?php dynamic_sidebar( 'sidebar-primary' ); ?>
		</div>

	<?php }

	if ( is_active_sidebar( 'sidebar-secondary' ) ) { ?>

		<div class="sidebar-secondary" role="complementary">
			<?php dynamic_sidebar( 'sidebar-secondary' ); ?>
		</div>

	<?php } ?>

</div> <!-- End .sidebar -->