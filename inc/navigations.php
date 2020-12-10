<?php
/**
 * Navigations
 *
 * @package Ground
 */

/**
 * Filters the CSS classes applied to a wp_nav_menu item's list item element.
 *
 * @link https://github.com/samikeijonen/bemit
 * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
 * @param WP_Post  $item    The current menu item.
 * @param stdClass $args    An object of wp_nav_menu() arguments.
 * @param int      $depth   Depth of menu item. Used for padding.
 */
function ground_nav_menu_css_class( $classes, $item, $args, $depth ) {
	// Get theme location, fallback for `default`.
	$theme_location = $args->theme_location ? $args->theme_location : 'default';

	// Reset all default classes and start adding custom classes to array.
	$_classes = array( 'navigation__item' );

	$_classes[] = 'navigation__item--' . $theme_location;

	if ( in_array( 'menu-item-has-children', $classes, true ) ) {
		$_classes[] = 'has-children';
	}

	if ( in_array( 'current-page-ancestor', $classes, true ) || in_array( 'current-menu-ancestor', $classes, true ) ) {
		$_classes[] .= ' is-ancestor';
	}

	if ( in_array( 'current_page_parent', $classes, true ) || in_array( 'current-menu-parent', $classes, true ) ) {
		$_classes[] .= ' is-parent';
	}

	if ( 0 === $depth ) {
		$_classes[] = 'is-top-level';
	}

	return $_classes;
}

add_filter( 'nav_menu_css_class', 'ground_nav_menu_css_class', 10, 4 );

/**
 * Filters the wp_nav_menu link attributes.
 *
 * @link https://github.com/samikeijonen/bemit
 * @param array    $atts {
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
 * @return string  $attr
 */
function ground_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
	// Get theme location, fallback for `default`.
	$theme_location = $args->theme_location ? $args->theme_location : 'default';

	// Start adding custom classes.
	$atts['class'] = 'navigation__link navigation__link--' . $theme_location;

	// Add `is-active` class.
	if ( in_array( 'current-menu-item', $item->classes, true ) ) {
		$atts['class'] .= ' is-active';
	}

	// Add `is-top-level` example class using $depth parameter.
	if ( 0 === $depth ) {
		$atts['class'] .= ' is-top-level';
	}

	// Return custom classes.
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'ground_nav_menu_link_attributes', 10, 4 );

/**
 * Adds a custom class to the submenus in wp_nav_menu.
 *
 * @link https://github.com/samikeijonen/bemit
 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
 * @param int      $depth   Depth of menu item. Used for padding.
 */
function ground_nav_menu_submenu_css_class( $classes, $args, $depth ) {

	// Get theme location, fallback for `default`.
	$theme_location = $args->theme_location ? $args->theme_location : 'default';
	$classes        = array(
		'navigation__sub-menu navigation__sub-menu--' . $theme_location,
	);

	return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'ground_nav_menu_submenu_css_class', 10, 3 );

/**
 * Filters the HTML output of wp_list_pages().
 *
 * @param string  $output        HTML output of the pages list.
 * @param array   $parsed_args   An array of page-listing arguments.
 * @param WP_Post $pages         Array of the page objects.
 */
function ground_subpages_css_class( $output, $parsed_args, $pages ) {

	if ( isset( $parsed_args['bem_modifier'] ) ) {
		$search_classes  = array( 'children', 'page-item-' );
		$replace_classes = array( 'navigation__sub-menu navigation__sub-menu--' . $parsed_args['bem_modifier'], 'navigation__item--' );
		$output          = str_replace( $search_classes, $replace_classes, $output );
	}

	return $output;
}

add_filter( 'wp_list_pages', 'ground_subpages_css_class', 10, 3 );

/**
 * Filters the list of CSS classes to include with each page item in wp_list_pages().
 *
 * @param string[] $css_class    An array of CSS classes to be applied to each list item.
 * @param WP_Post  $page         Page data object.
 * @param int      $depth        Depth of page, used for padding.
 * @param array    $args         An array of arguments.
 * @param int      $current_page ID of the current page.
 */
function ground_subpages_list_css_class( $css_class, $page, $depth, $args, $current_page ) {

	if ( array_key_exists( 'bem_modifier', $args ) ) {

		$search  = array( 'page_item', 'page_item_has_children', 'current_page_ancestor', 'current_page_parent', 'current_page_item' );
		$repalce = array( 'navigation__item navigation__item--' . $args['bem_modifier'], 'has-children', 'is-ancestor', 'is-parent', 'is-active' );

		foreach ( $search as $search_item ) {
			$key = array_search( $search_item, $css_class, true );
			if ( false !== $key ) {
				$css_class[ $key ] = $repalce[ array_search( $search_item, $search, true ) ];
			}
		}

		if ( 0 === $depth ) {
			$css_class[] = 'is-top-level';
		}
	}

	return $css_class;
}

add_filter( 'page_css_class', 'ground_subpages_list_css_class', 10, 5 );

/**
 * Filters the HTML attributes applied to a page menu item’s anchor element wp_list_pages().
 *
 * @param array   $atts          The HTML attributes applied to the menu item's <a> element, empty strings are ignored.
 * @param WP_Post $page          Page data object.
 * @param int     $depth         Depth of page, used for padding.
 * @param array   $args          An array of arguments.
 * @param int     $current_page  ID of the current page.
 */
function ground_subpages_menu_link_attributes( $atts, $page, $depth, $args, $current_page ) {

	if ( array_key_exists( 'bem_modifier', $args ) ) {

		$atts['class'] = 'navigation__link navigation__link--' . $args['bem_modifier'];

		if ( $current_page === $page->ID ) {
			$atts['class'] .= ' is-active';
		}

		if ( $args['has_children'] ) {
			$atts['class'] .= ' has-children';
		}

		if ( 0 === $depth ) {
			$atts['class'] .= ' is-top-level';
		}
	}

	return $atts;
}

add_filter( 'page_menu_link_attributes', 'ground_subpages_menu_link_attributes', 10, 5 );

/**
 * Filters the HTML output of a taxonomy list.
 *
 * @param string $output HTML output.
 * @param array  $args   An array of taxonomy-listing arguments.
 */
function ground_subtaxonomies_menu_css_class( $output, $args ) {

	if ( isset( $args['bem_modifier'] ) ) {
		$search_classes  = array( 'children', 'cat-item-', 'cat-item', 'a href', 'a aria-current="page" href', 'current-cat-parent', 'current-cat-ancestor', 'current-cat' );
		$replace_classes = array( 'navigation__sub-menu navigation__sub-menu--' . $args['bem_modifier'], 'navigation__item--', 'navigation__item navigation__item--' . $args['bem_modifier'], 'a class="navigation__link navigation__link--' . $args['bem_modifier'] . '" href', 'a class="navigation__link is-active" aria-current="page" href', 'is-parent', 'is-ancestor', 'is-active' );
		$output          = str_replace( $search_classes, $replace_classes, $output );
	}

	return $output;
}

add_filter( 'wp_list_categories', 'ground_subtaxonomies_menu_css_class', 10, 2 );
