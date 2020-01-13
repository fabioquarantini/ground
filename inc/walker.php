<?php

/*  ==========================================================================

	1 - Wp nav menu BEM
	2 - Wp list pages BEM
	3 - Wp list categories BEM

	========================================================================== */


/*  ==========================================================================
	1 - Wp nav menu BEM
	========================================================================== */

class Ground_Wp_Nav_Menu_Bem extends Walker_Nav_Menu {

	/**
	* Starts the list before the elements are added.
	*
	* @since 3.0.0
	*
	* @see Walker::start_lvl()
	*
	* @param string   $output Passed by reference. Used to append additional content.
	* @param int      $depth  Depth of menu item. Used for padding.
	* @param stdClass $args   An object of wp_nav_menu() arguments.
	*/
	public function start_lvl( &$output, $depth = 0, $args = array() ) {

		$block = isset( $args->block ) ? $args->block : explode(' ', $args->menu_class);
		$block = is_array( $block ) ? $block[0] : $block;

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		// Default class.
		$classes = array( 'navigation__sub-menu' );

		/**
		* Filters the CSS class(es) applied to a menu list element.
		*
		* @since 4.8.0
		*
		* @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
		* @param stdClass $args    An object of `wp_nav_menu()` arguments.
		* @param int      $depth   Depth of menu item. Used for padding.
		*/
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= "{$n}{$indent}<ul $class_names>{$n}";
	}

	/**
	* Starts the element output.
	*
	* @since 3.0.0
	* @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
	*
	* @see Walker::start_el()
	*
	* @param string   $output Passed by reference. Used to append additional content.
	* @param WP_Post  $item   Menu item data object.
	* @param int      $depth  Depth of menu item. Used for padding.
	* @param stdClass $args   An object of wp_nav_menu() arguments.
	* @param int      $id     Current item ID.
	*/
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$custom_class = $item->classes[0];

		$this->prepare_el_classes( $item, $args, $depth );

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$classes[] = $custom_class;
		//$classes[] = 'navigation__item--' . $item->ID;

		/**
		* Filters the arguments for a single nav menu item.
		*
		* @since 4.4.0
		*
		* @param stdClass $args  An object of wp_nav_menu() arguments.
		* @param WP_Post  $item  Menu item data object.
		* @param int      $depth Depth of menu item. Used for padding.
		*/
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		* Filters the CSS class(es) applied to a menu item's list item element.
		*
		* @since 3.0.0
		* @since 4.1.0 The `$depth` parameter was added.
		*
		* @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
		* @param WP_Post  $item    The current menu item.
		* @param stdClass $args    An object of wp_nav_menu() arguments.
		* @param int      $depth   Depth of menu item. Used for padding.
		*/
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		* Filters the ID applied to a menu item's list item element.
		*
		* @since 3.0.1
		* @since 4.1.0 The `$depth` parameter was added.
		*
		* @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
		* @param WP_Post  $item    The current menu item.
		* @param stdClass $args    An object of wp_nav_menu() arguments.
		* @param int      $depth   Depth of menu item. Used for padding.
		*/

		$output .= $indent . '<li' . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		* Filters the HTML attributes applied to a menu item's anchor element.
		*
		* @since 3.6.0
		* @since 4.1.0 The `$depth` parameter was added.
		*
		* @param array $atts {
		*     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		*
		*     @type string $title  Title attribute.
		*     @type string $target Target attribute.
		*     @type string $rel    The rel attribute.
		*     @type string $href   The href attribute.
		* }
		* @param WP_Post  $item  The current menu item.
		* @param stdClass $args  An object of wp_nav_menu() arguments.
		* @param int      $depth Depth of menu item. Used for padding.
		*/
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php*/
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		* Filters a menu item's title.
		*
		* @since 4.4.0
		*
		* @param string   $title The menu item's title.
		* @param WP_Post  $item  The current menu item.
		* @param stdClass $args  An object of wp_nav_menu() arguments.
		* @param int      $depth Depth of menu item. Used for padding.
		*/
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;
		$item_output .= '<a class="navigation__link" '. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		* Filters a menu item's starting output.
		*
		* The menu item's starting output only includes `$args->before`, the opening `<a>`,
		* the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		* no filter for modifying the opening and closing `<li>` for a menu item.
		*
		* @since 3.0.0
		*
		* @param string   $item_output The menu item's starting HTML output.
		* @param WP_Post  $item        Menu item data object.
		* @param int      $depth       Depth of menu item. Used for padding.
		* @param stdClass $args        An object of wp_nav_menu() arguments.
		*/
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}


	public function prepare_el_classes( &$item, $args = array(), $depth = 0 ) {

		$block = isset( $args->block ) ? $args->block : explode(' ', $args->menu_class);
		$block = is_array( $block ) ? $block[0] : $block;
		$classes = array( 'navigation__item' );

		if ( $item->current ) {
			$classes[] = 'is-active';
		}

		if ( $item->current_item_ancestor ) {
			$classes[] = 'navigation__item--ancestor';
		}

		if ( $item->current_item_parent ) {
			$classes[] = 'navigation__item--parent';
		}

		if ( in_array( 'menu-item-has-children', (array) $item->classes ) ) {
			$classes[] = 'navigation__item--has-children';
		}

		if ( $depth ) {
			$classes[] = 'navigation__item--child';
		}

		$item->classes = $classes;

	}


}


/*  ==========================================================================
	2 - Wp list pages BEM
	========================================================================== */

class Ground_Wp_List_Pages_Bem extends Walker_Page {

	/**
	* Outputs the beginning of the current level in the tree before elements are output.
	*
	* @since 2.1.0
	* @access public
	*
	* @see Walker::start_lvl()
	*
	* @param string $output Passed by reference. Used to append additional content.
	* @param int    $depth  Optional. Depth of page. Used for padding. Default 0.
	* @param array  $args   Optional. Arguments for outputting the next level.
	*                       Default empty array.
	*/
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
			$t = "\t";
			$n = "\n";
		} else {
			$t = '';
			$n = '';
		}
		$indent = str_repeat( $t, $depth );
		$output .= "{$n}{$indent}<ul class='navigation__sub-menu'>{$n}";
	}

	/**
	* Outputs the beginning of the current element in the tree.
	*
	* @see Walker::start_el()
	* @since 2.1.0
	* @access public
	*
	* @param string  $output       Used to append additional content. Passed by reference.
	* @param WP_Post $page         Page data object.
	* @param int     $depth        Optional. Depth of page. Used for padding. Default 0.
	* @param array   $args         Optional. Array of arguments. Default empty array.
	* @param int     $current_page Optional. Page ID. Default 0.
	*/
	public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
		if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
			$t = "\t";
			$n = "\n";
		} else {
			$t = '';
			$n = '';
		}
		if ( $depth ) {
			$indent = str_repeat( $t, $depth );
		} else {
			$indent = '';
		}

		$css_class = array( 'navigation__item' );

		if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
			$css_class[] = 'navigation__item--has-children';
		}

		if ( ! empty( $current_page ) ) {
			$_current_page = get_post( $current_page );
			if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
				$css_class[] = 'navigation__item--ancestor';
			}
			if ( $page->ID == $current_page ) {
				$css_class[] = 'is-active';
			} elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
				$css_class[] = 'navigation__item--parent';
			}
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'navigation__item--parent';
		}

		/**
		* Filters the list of CSS classes to include with each page item in the list.
		*
		* @since 2.8.0
		*
		* @see wp_list_pages()
		*
		* @param array   $css_class    An array of CSS classes to be applied
		*                              to each list item.
		* @param WP_Post $page         Page data object.
		* @param int     $depth        Depth of page, used for padding.
		* @param array   $args         An array of arguments.
		* @param int     $current_page ID of the current page.
		*/
		$css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		if ( '' === $page->post_title ) {
			/* translators: %d: ID of a post*/
			$page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
		}

		$args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
		$args['link_after'] = empty( $args['link_after'] ) ? '' : $args['link_after'];

		$atts = array();
		$atts['href'] = get_permalink( $page->ID );

		/**
		* Filters the HTML attributes applied to a page menu item's anchor element.
		*
		* @since 4.8.0
		*
		* @param array $atts {
		*     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		*
		*     @type string $href The href attribute.
		* }
		* @param WP_Post $page         Page data object.
		* @param int     $depth        Depth of page, used for padding.
		* @param array   $args         An array of arguments.
		* @param int     $current_page ID of the current page.
		*/
		$atts = apply_filters( 'page_menu_link_attributes', $atts, $page, $depth, $args, $current_page );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$output .= $indent . sprintf(
			'<li class="%s"><a class="navigation__link" %s>%s%s%s</a>',
			$css_classes,
			$attributes,
			$args['link_before'],
			/** This filter is documented in wp-includes/post-template.php*/
			apply_filters( 'the_title', $page->post_title, $page->ID ),
			$args['link_after']
		);

		if ( ! empty( $args['show_date'] ) ) {
			if ( 'modified' == $args['show_date'] ) {
				$time = $page->post_modified;
			} else {
				$time = $page->post_date;
			}

			$date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
			$output .= " " . mysql2date( $date_format, $time );
		}
	}



	function walk( $elements, $max_depth, ...$args ) {

		$args = array_slice( func_get_args(), 2 );

		if ( $args['0']['current_submenu'] ) {

			//show only current child pages

			global $post;
			$output = '';

			// invalid parameter
			if ( $max_depth < -1 ) {
				return $output;
			}

			// Nothing to walk
			if ( empty( $elements ) ) {
				return $output;
			}

			// Set up variables
			$top_level_elements = array();
			$children_elements  = array();
			$parent_field = $this->db_fields['parent'];
			$child_of = ( isset( $args[0]['child_of'] ) ) ? (int) $args[0]['child_of'] : 0;

			// Loop elements
			foreach ( (array) $elements as $e ) {

				$parent_id = $e->$parent_field;

				if ( isset( $parent_id ) ) {

					// Top level pages
					if( $child_of === $parent_id ) {
						$top_level_elements[] = $e;
					}
					// Only display children of the current hierarchy
					else if ( ( isset( $post->ID ) && $parent_id == $post->ID ) || ( isset( $post->post_parent ) && $parent_id == $post->post_parent ) || ( isset( $post->ancestors ) && in_array( $parent_id, (array) $post->ancestors ) ) ) {
						$children_elements[ $e->$parent_field ][] = $e;
					}

				}

			}

			// Define output
			foreach ( $top_level_elements as $e ) {
				$this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );
			}

			return $output;

		} else {

			// Default walk

			$args = array_slice(func_get_args(), 2);
			$output = '';

			//invalid parameter or nothing to walk
			if ( $max_depth < -1 || empty( $elements ) ) {
				return $output;
			}

			$parent_field = $this->db_fields['parent'];

			// flat display
			if ( -1 == $max_depth ) {
				$empty_array = array();
				foreach ( $elements as $e )
					$this->display_element( $e, $empty_array, 1, 0, $args, $output );
				return $output;
			}

			/*
			* Need to display in hierarchical order.
			* Separate elements into two buckets: top level and children elements.
			* Children_elements is two dimensional array, eg.
			* Children_elements[10][] contains all sub-elements whose parent is 10.
			*/
			$top_level_elements = array();
			$children_elements  = array();
			foreach ( $elements as $e) {
				if ( empty( $e->$parent_field ) )
					$top_level_elements[] = $e;
				else
					$children_elements[ $e->$parent_field ][] = $e;
			}

			/*
			* When none of the elements is top level.
			* Assume the first one must be root of the sub elements.
			*/
			if ( empty($top_level_elements) ) {

				$first = array_slice( $elements, 0, 1 );
				$root = $first[0];

				$top_level_elements = array();
				$children_elements  = array();
				foreach ( $elements as $e) {
					if ( $root->$parent_field == $e->$parent_field )
						$top_level_elements[] = $e;
					else
						$children_elements[ $e->$parent_field ][] = $e;
				}
			}

			foreach ( $top_level_elements as $e )
				$this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );

			/*
			* If we are displaying all levels, and remaining children_elements is not empty,
			* then we got orphans, which should be displayed regardless.
			*/
			if ( ( $max_depth == 0 ) && count( $children_elements ) > 0 ) {
				$empty_array = array();
				foreach ( $children_elements as $orphans )
					foreach ( $orphans as $op )
						$this->display_element( $op, $empty_array, 1, 0, $args, $output );
			}

			return $output;

		}


	}

}

/*  ==========================================================================
	3 - Wp list categories BEM
	========================================================================== */

class Ground_Wp_List_Categories_Bem extends Walker_Category {

	/**
	* What the class handles.
	*
	* @since 2.1.0
	* @var string
	*
	* @see Walker::$tree_type
	*/
	public $tree_type = 'category';

	/**
	* Database fields to use.
	*
	* @since 2.1.0
	* @var array
	*
	* @see Walker::$db_fields
	* @todo Decouple this
	*/
	public $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

	/**
	* Starts the list before the elements are added.
	*
	* @since 2.1.0
	*
	* @see Walker::start_lvl()
	*
	* @param string $output Used to append additional content. Passed by reference.
	* @param int    $depth  Optional. Depth of category. Used for tab indentation. Default 0.
	* @param array  $args   Optional. An array of arguments. Will only append content if style argument
	*                       value is 'list'. See wp_list_categories(). Default empty array.
	*/
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( 'list' != $args['style'] )
			return;

		$indent = str_repeat("\t", $depth);
		$output .= "$indent<ul class='navigation__sub-menu'>\n";
	}

	/**
	* Ends the list of after the elements are added.
	*
	* @since 2.1.0
	*
	* @see Walker::end_lvl()
	*
	* @param string $output Used to append additional content. Passed by reference.
	* @param int    $depth  Optional. Depth of category. Used for tab indentation. Default 0.
	* @param array  $args   Optional. An array of arguments. Will only append content if style argument
	*                       value is 'list'. See wp_list_categories(). Default empty array.
	*/
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( 'list' != $args['style'] )
			return;

		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	/**
	* Starts the element output.
	*
	* @since 2.1.0
	*
	* @see Walker::start_el()
	*
	* @param string $output   Used to append additional content (passed by reference).
	* @param object $category Category data object.
	* @param int    $depth    Optional. Depth of category in reference to parents. Default 0.
	* @param array  $args     Optional. An array of arguments. See wp_list_categories(). Default empty array.
	* @param int    $id       Optional. ID of the current category. Default 0.
	*/
	public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		/** This filter is documented in wp-includes/category-template.php*/
		$cat_name = apply_filters(
			'list_cats',
			esc_attr( $category->name ),
			$category
		);

		// Don't generate an element if the category name is empty.
		if ( ! $cat_name ) {
			return;
		}

		$link = '<a class="navigation__link" href="' . esc_url( get_term_link( $category ) ) . '" ';
		if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
			/**
			* Filters the category description for display.
			*
			* @since 1.2.0
			*
			* @param string $description Category description.
			* @param object $category    Category object.
			*/
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		}

		$link .= '>';
		$link .= $cat_name . '</a>';

		if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
			$link .= ' ';

			if ( empty( $args['feed_image'] ) ) {
				$link .= '(';
			}

			$link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';

			if ( empty( $args['feed'] ) ) {
				$alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
			} else {
				$alt = ' alt="' . $args['feed'] . '"';
				$name = $args['feed'];
				$link .= empty( $args['title'] ) ? '' : $args['title'];
			}

			$link .= '>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= $name;
			} else {
				$link .= "<img src='" . $args['feed_image'] . "'$alt" . ' />';
			}
			$link .= '</a>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= ')';
			}
		}

		if ( ! empty( $args['show_count'] ) ) {
			$link .= ' (' . number_format_i18n( $category->count ) . ')';
		}
		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$css_classes = array(
				'navigation__item',
				'navigation__item--' . $category->term_id,
			);

			if ( ! empty( $args['current_category'] ) ) {
				// 'current_category' can be an array, so we use `get_terms()`.
				$_current_terms = get_terms( $category->taxonomy, array(
					'include' => $args['current_category'],
					'hide_empty' => false,
				) );

				foreach ( $_current_terms as $_current_term ) {
					if ( $category->term_id == $_current_term->term_id ) {
						$css_classes[] = 'is-active';
					} elseif ( $category->term_id == $_current_term->parent ) {
						$css_classes[] = 'navigation__item--parent';
					}
					while ( $_current_term->parent ) {
						if ( $category->term_id == $_current_term->parent ) {
							$css_classes[] =  'navigation__item--ancestor';
							break;
						}
						$_current_term = get_term( $_current_term->parent, $category->taxonomy );
					}
				}
			}

			/**
			* Filters the list of CSS classes to include with each category in the list.
			*
			* @since 4.2.0
			*
			* @see wp_list_categories()
			*
			* @param array  $css_classes An array of CSS classes to be applied to each list item.
			* @param object $category    Category data object.
			* @param int    $depth       Depth of page, used for padding.
			* @param array  $args        An array of wp_list_categories() arguments.
			*/
			$css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );

			$output .=  ' class="' . $css_classes . '"';
			$output .= ">$link\n";
		} elseif ( isset( $args['separator'] ) ) {
			$output .= "\t$link" . $args['separator'] . "\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}

	/**
	* Ends the element output, if needed.
	*
	* @since 2.1.0
	*
	* @see Walker::end_el()
	*
	* @param string $output Used to append additional content (passed by reference).
	* @param object $page   Not used.
	* @param int    $depth  Optional. Depth of category. Not used.
	* @param array  $args   Optional. An array of arguments. Only uses 'list' for whether should append
	*                       to output. See wp_list_categories(). Default empty array.
	*/
	public function end_el( &$output, $page, $depth = 0, $args = array() ) {
		if ( 'list' != $args['style'] )
			return;

		$output .= "</li>\n";
	}

}
