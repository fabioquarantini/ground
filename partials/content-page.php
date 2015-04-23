<article id="main-content" <?php post_class(); ?> role="main">

	<h1 class="page__title"><?php the_title(); ?></h1>

	<?php if ( has_post_thumbnail() ) {

			the_post_thumbnail( 'thumb-medium', array( 'class' => 'page__img' ) );

	} ?>

	<?php the_content(); ?>

	<?php if ( comments_open() || get_comments_number() ) {

		comments_template('/partials/comments.php');

	} ?>

</article> <!-- End .page -->
