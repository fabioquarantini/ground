<div class="author-box">
	<h2>Author info</h2>
	<?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>
	<?php the_author_meta( "display_name" ); ?>
	<?php the_author_meta( "user_description" ); ?>
</div> <!-- End .author-box -->