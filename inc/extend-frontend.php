<?php

/*  ==========================================================================
	
	1 - Tag related post
	2 - Pagination
	3 - Excerpt
	4 - Title lenght
	5 - Extend wp list page for page children
	6 - Custom category list menu

	==========================================================================  */


/*  ==========================================================================
	1 - Tag related post: ground_tag_related_posts();
	==========================================================================  */

function ground_tag_related_posts() {
	
	echo '<ul class="related-post">';
	global $post;
	$tags = wp_get_post_tags($post->ID);
	
	if($tags) {
		foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5,
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts($args);
		if($related_posts) {
			foreach ($related_posts as $post) : setup_postdata($post); ?>
				<li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li>' . _e('No related post','groundtheme') . '</li>'; ?>
		<?php }
	}
	wp_reset_query();
	echo '</ul>';
	
}


/*  ==========================================================================
	2 - Pagination
	==========================================================================  */

/* Numeric pagination: ground_numeric_pagination( __('&laquo; Previuos', "groundtheme") , __('Next &raquo;', "groundtheme") ); */

function ground_numeric_pagination($next, $prev) {
	
	global $wp_query;
	$format = '?paged=%#%';
	if ( get_option('permalink_structure') ) {
		$format = '/page/%#%';
	}
	$total_pages = $wp_query->max_num_pages;

	if ($total_pages > 1){
		$current_page = max(1, get_query_var('paged'));
		$args = array(
			//'base'			=> get_pagenum_link(1) . '%_%',
			'base'         => home_url() . '%_%',
			'format'		=> $format,
			'current'		=> $current_page,
			'total'			=> $total_pages,
			'type'			=> 'list',
			'prev_text'		=> $prev,
			'next_text'		=> $next,
		);
		echo paginate_links($args);
	}
	
}


/* Basic pagination: ground_basic_pagination( __('&laquo; Previuos', "groundtheme") , __('Next &raquo;', "groundtheme") ); */

function ground_basic_pagination($next, $prev) {
	
	global $wp_query;
	$total_pages = $wp_query->max_num_pages;

	if ($total_pages > 1) : ?>

		<ul class="pagination">
		<?php if (get_next_posts_link()) { ?>
			<li class="pagination-next"><?php next_posts_link($next); ?></li>
		<?php } ?>
		<?php if (get_previous_posts_link()) { ?>
			<li class="pagination-previuos"><?php previous_posts_link($prev); ?></li>
		<?php } ?>
		</ul>

	<?php endif;
	
}


/* Next & prev post pagination with thumbnails: ground_thumb_post_pagination( __("Next article &raquo;", "groundtheme") , __("&laquo; Previus article", "groundtheme") ); */

function ground_thumb_post_pagination($next, $prev) {
	
	global $post;
	$nextPost = get_next_post(true);
	$prevPost = get_previous_post(true);
	
	echo '<ul class="prev-next-thumb">';

	if($prevPost) {

		$args = array(
			'posts_per_page' => 1,
			'include' => $prevPost->ID
		);

		$prevPost = get_posts($args);

		foreach ($prevPost as $post) {
			setup_postdata($post); ?>

			<li class="post-prev-thumb">
				<a href="<?php the_permalink(); ?>"> <span class="title-link"><?php echo $prev ?></span> <?php the_post_thumbnail('thumbnail'); ?>	<span class="title-thumb"><?php the_title(); ?></span></a>
			</li>

			<?php wp_reset_postdata();
		}

	}
	
	if($nextPost) {

		$args = array(
			'posts_per_page' => 1,
			'include' => $nextPost->ID
		);

		$nextPost = get_posts($args);

		foreach ($nextPost as $post) {
			setup_postdata($post); ?>

			<li class="post-next-thumb">
				<a href="<?php the_permalink(); ?>"> <span class="title-link"><?php echo $next; ?></span> <?php the_post_thumbnail('thumbnail'); ?> <span class="title-thumb"> <?php the_title(); ?></span></a>
			</li>

			<?php wp_reset_postdata();
		}

	}

	echo '</ul>';

}


/*  ==========================================================================
	3 - Excerpt : ground_excerpt( 100, __('Read more', 'groundtheme') );
	==========================================================================  */

/* Customize excerpt lenght */

function ground_excerpt($charlength, $word) {

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
		echo ' ... <a href="'. get_permalink($post->ID) .'" title="'. $word .' '.get_the_title($post->ID).'">'. $word .'</a>';

	} else {

		echo $excerpt;

	}

}


/*  ==========================================================================
	4 - Title lenght : ground_trim_title(5, '...');
	==========================================================================  */

function ground_trim_title( $length, $after = '') {

	$mytitle = get_the_title();

	if ( strlen($mytitle) > $length ) {
		$mytitle = substr($mytitle,0,$length);
		echo $mytitle . $after;
	} else {
		echo $mytitle;
	}

}


/*  ==========================================================================
	5 - Extend wp list page for page children
	==========================================================================  */

/*

@package Razorback
@subpackage Walker
@author Michael Fields <michael@mfields.org>
@copyright Copyright (c) 2010, Michael Fields
@license http://opensource.org/licenses/gpl-license.php GNU Public License

@uses Walker_Page

@since 2010-05-28
@alter 2010-10-09

*/
class Ground_Page_Children extends Walker_Page {
    /**
     * Walk the Page Tree.
     *
     * @global stdClass WordPress post object.
     * @uses Walker_Page::$db_fields
     * @uses Walker_Page::display_element()
     *
     * @since 2010-05-28
     * @alter 2010-10-09
     */
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


function ground_child_menu() {

	global $post;

	$parent = array_reverse(get_post_ancestors($post->ID));
	$child_ID = $post->ID;
	if( count($parent) > 0 ) {
		$first_parent = get_page($parent[0]);
		$child_ID = $first_parent->ID;
	}
	
	$walker = new Ground_Page_Children();

	$args = array(
		'depth'			=> 0,
		'show_date'		=> '',
		'date_format'	=> get_option('date_format'),
		'child_of'		=> $child_ID,
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

	echo '<ul>';
	wp_list_pages($args);
	echo '</ul>';

}
	

/*  ==========================================================================
	6 - Custom category list menu : ground_custom_category_menu('nameofcustomcategory');
	==========================================================================  */

function ground_custom_category_menu( $customCategory ='custom_catalog_category' ) {

	global $post;

	$terms = get_the_terms( $post->ID , $customCategory );
	$termId = 0;
	$postType = $post->post_type;

	//$parent = array_reverse(get_post_ancestors($post->ID));
	//$first_parent = get_page($parent[0]);
	//$child_ID = $first_parent->ID;

	if( is_single() && $postType == get_post_type() ) {
		foreach ( $terms as $term ) {
			$termId =  $term->term_id;
			//echo  $term->term_id;
		}
	}	

	//echo $termId;
			
	$args = array(
		'orderby'			=> 'name',
		'show_count'		=> 0,
		'pad_counts'		=> 0,
		//'child_of'		=> $child_ID,
		'hide_empty'		=> 1,
		'hierarchical'		=> 1,
		'taxonomy'			=> $customCategory,
		'current_category'	=> $termId,
		'title_li'			=> ''
	);

	echo '<ul>';
	wp_list_categories( $args );
	echo '</ul>';

}

?>