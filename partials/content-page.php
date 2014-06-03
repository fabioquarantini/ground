<article id="main-content" <?php post_class(); ?> role="main">

	<h1><?php the_title(); ?></h1>

	<?php if ( has_post_thumbnail() ) {

		the_post_thumbnail( 'thumb-medium', array( 'class' => 'thumb-post' ) );

	} else {

		echo '<img src="'.MY_THEME_FOLDER.'/img/no-photo.jpg" class="thumb-post" alt="'. get_bloginfo('name') .'" />';

	} ?>

	<?php the_content(); ?>

	<?php if ( comments_open() || get_comments_number() ) {

		comments_template();

	} ?>

</article> <!-- End article -->