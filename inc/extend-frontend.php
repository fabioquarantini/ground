<?php

/*  ==========================================================================

	1 - Excerpt custom lenght
	2 - Trim title length
	3 - Basic pagination
	4 - Numeric pagination
	5 - Thumb pagination
	6 - Selective page hierarchy for wp_list_pages()
	7 - Cpt list category

	==========================================================================  */


/*  ==========================================================================
	1 - Excerpt custom lenght : ground_excerpt( 100, __('Read more', 'groundtheme'), '...', );
	==========================================================================  */

function ground_excerpt( $charlength, $word, $continue = '...' ) {

	global $post;
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {

		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo $continue . '<a href="' . get_permalink($post->ID) . '" title="' . $word . ' ' . get_the_title($post->ID) . '">' . $word . '</a>';

	} else {
		echo $excerpt;
	}

}


/*  ==========================================================================
	2 - Trim title length : ground_trim_title(5, '...');
	==========================================================================  */

function ground_trim_title( $length, $after = '') {

	$title = get_the_title();

	if ( strlen($title) > $length ) {
		$title = substr($title,0,$length);
		echo $title . $after;
	} else {
		echo $title;
	}

}


/*  ==========================================================================
	3 - Basic pagination: ground_basic_pagination( __('&laquo; Previuos', "groundtheme") , __('Next &raquo;', "groundtheme") );
	==========================================================================  */

function ground_basic_pagination( $prev, $next ) {

	global $wp_query;
	$total_pages = $wp_query->max_num_pages;

	if ($total_pages > 1) : ?>

		<ul class="pagination">
		<?php if (get_previous_posts_link()) { ?>
			<li class="pagination-previuos"><?php previous_posts_link($prev); ?></li>
		<?php } ?>
		<?php if (get_next_posts_link()) { ?>
			<li class="pagination-next"><?php next_posts_link($next); ?></li>
		<?php } ?>
		</ul>

	<?php endif;

	wp_reset_query();

}


/*  ==========================================================================
	4 - Numeric pagination: ground_numeric_pagination( __('&laquo; Previuos', "groundtheme") , __('Next &raquo;', "groundtheme") );
	==========================================================================  */

function ground_numeric_pagination( $prev, $next ) {

	global $wp_query;
	$format = '?paged=%#%';

	if ( get_option('permalink_structure') ) {
		$format = 'page/%#%';
	}

	$total_pages = $wp_query->max_num_pages;

	if ( $total_pages > 1 ) {

		$current_page = max( 1, get_query_var('paged') );
		$args = array(
			'base'			=> get_pagenum_link(1) . '%_%',
			'format'		=> $format,
			'current'		=> $current_page,
			'total'			=> $total_pages,
			'type'			=> 'list',
			'prev_text'		=> $prev,
			'next_text'		=> $next,
		);

		echo paginate_links($args);

	}

	wp_reset_query();

}


/*  ==========================================================================
	5 - Thumb pagination: ground_thumb_pagination(  __("&laquo; Previus article", "groundtheme") , __("Next article &raquo;", "groundtheme") );
	==========================================================================  */

function ground_thumb_pagination( $prev, $next, $excerpt ) {

	global $post;

	$prev_post = get_previous_post(true);
	$next_post = get_next_post(true);

	if ( $prev_post || $next_post ) {

		echo '<ul class="thumb-pagination">';

		if( $prev_post ) {

			$args = array(
				'posts_per_page' => 1,
				'include' => $prev_post->ID
			);

			$prev_post = get_posts($args);

			foreach ( $prev_post as $post ) {
				setup_postdata($post); ?>

				<li class="post-prev">
					<a href="<?php the_permalink(); ?>">
						<span class="title-link"><?php echo $prev ?></span>
						<?php the_post_thumbnail('thumbnail'); ?>
						<span class="title-thumb"><?php the_title(); ?></span>
					</a>
				</li>

				<?php wp_reset_postdata();
			}

		}

		if( $next_post ) {

			$args = array(
				'posts_per_page' => 1,
				'include' => $next_post->ID
			);

			$next_post = get_posts($args);

			foreach ( $next_post as $post ) {
				setup_postdata($post); ?>

				<li class="post-next">
					<a href="<?php the_permalink(); ?>">
						<span class="title-link"><?php echo $next; ?></span>
						<?php the_post_thumbnail('thumbnail'); ?>
						<span class="title-thumb"><?php the_title(); ?></span>
					</a>
				</li>

				<?php wp_reset_postdata();
			}

		}

		echo '</ul>';
	}

}


/*  ==========================================================================
	6 - Selective page hierarchy for wp_list_pages(): ground_hierarchy_list_pages('css-class');
	==========================================================================  */

/* Extend Walker_Page */
/* http://wordpress.mfields.org/2010/selective-page-hierarchy-for-wp_list_pages/ */

class Ground_Selective_Page_Hierarchy extends Walker_Page {

	function walk( $elements, $max_depth ) {

		global $post;
		$args = array_slice( func_get_args(), 2 );
		$output = '';

		/* invalid parameter */
		if ( $max_depth < -1 ) {
			return $output;
		}

		/* Nothing to walk */
		if ( empty( $elements ) ) {
			return $output;
		}

		/* Set up variables. */
		$top_level_elements = array();
		$children_elements  = array();
		$parent_field = $this->db_fields['parent'];
		$child_of = ( isset( $args[0]['child_of'] ) ) ? (int) $args[0]['child_of'] : 0;

		/* Loop elements */
		foreach ( (array) $elements as $e ) {

			$parent_id = $e->$parent_field;

			if ( isset( $parent_id ) ) {

				/* Top level pages. */
				if( $child_of === $parent_id ) {
					$top_level_elements[] = $e;
				}
				/* Only display children of the current hierarchy. */
				else if (
					( isset( $post->ID ) && $parent_id == $post->ID ) ||
					( isset( $post->post_parent ) && $parent_id == $post->post_parent ) ||
					( isset( $post->ancestors ) && in_array( $parent_id, (array) $post->ancestors ) )
					) {
					$children_elements[ $e->$parent_field ][] = $e;
				}

			}

		}

		/* Define output. */
		foreach ( $top_level_elements as $e ) {
			$this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );
		}

		return $output;
	}
}


/* Selective page menu */

function ground_hierarchy_list_pages( $css_class = 'hierarchy-pages' ) {

	global $post;

	$parent = array_reverse( get_post_ancestors($post->ID) );
	$child_id = $post->ID;

	if( count($parent) > 0 ) {
		$first_parent = get_page($parent[0]);
		$child_id = $first_parent->ID;
	}

	$walker = new Ground_Selective_Page_Hierarchy();

	$args = array(
		'depth'			=> 0,
		'show_date'		=> '',
		'date_format'	=> get_option('date_format'),
		'child_of'		=> $child_id,
		'exclude'		=> '',
		'include'		=> '',
		'title_li'		=> '',
		'echo'			=> 1,
		'authors'		=> '',
		'sort_column'	=> 'menu_order, post_title',
		'link_before'	=> '',
		'link_after'	=> '',
		'walker'		=> $walker,
		'post_type'		=> 'page',
		'post_status'	=> 'publish'
	);

	if ( empty( $css_class )) {
		$container = '<ul>';
	} else {
		$container = '<ul class="' . $css_class . '">';
	}

	echo $container;
	wp_list_pages($args);
	echo '</ul> <!-- End .' . $css_class . ' -->';

}


/*  ==========================================================================
	7 - Cpt list category: ground_cpt_list_categories('nameofcustomposttype', nameofcustomcategory', 'css-class');
	==========================================================================  */

function ground_cpt_list_categories( $custom_postType = '', $custom_category ='', $css_class = 'category-nav' ) {

	if( is_page_template( 'template-' . $custom_postType . '.php' ) ||  $custom_postType == get_post_type() ) {

		global $post;
		$postType = $post->post_type;
		$terms = get_the_terms( $post->ID , $custom_category );
		$term_id = 0;

		//$parent = array_reverse(get_post_ancestors($post->ID));
		//$first_parent = get_page($parent[0]);
		//$child_id = $first_parent->ID;

		if( is_single() && $postType == get_post_type() ) {
			foreach ( $terms as $term ) {
				$term_id =  $term->term_id;
			}
		}

		$args = array(
			'orderby'			=> 'name',
			'show_count'		=> 0,
			'pad_counts'		=> 0,
			//'child_of'		=> $child_id,
			'hide_empty'		=> 1,
			'hierarchical'		=> 1,
			'taxonomy'			=> $custom_category,
			'current_category'	=> $term_id,
			'title_li'			=> ''
		);

		if ( empty($css_class)) {
			$container = '<ul>';
		} else {
			$container = '<ul class="' . $css_class . '">';
		}

		echo $container;
		wp_list_categories( $args );
		echo '</ul> <!-- End .' . $css_class . ' -->';

	}

}

?>