<?php

/**
 * Filter the CSS class for a nav menu based on a condition.
 *
 * @param array  $classes The CSS classes that are applied to the menu item's <li> element.
 * @param object $item    The current menu item.
 * @return array (maybe) modified nav menu class.
 */
function add_nav_menu_css_class($classes, $item)
{
	$classes[] = "nav-item";

	if (in_array('menu-item-has-children', $item->classes)) {

		if ($item->post_parent > 0) {
			$classes[] = 'dropend';
		} else {
			$classes[] = 'dropdown';
		}
	}

	return $classes;
}
add_filter('nav_menu_css_class', 'add_nav_menu_css_class', 10, 2);

/**
 * Filters the HTML attributes applied to a menu item's anchor element.
 *
 * @since 3.6.0
 * @since 4.1.0 The `$depth` parameter was added.
 *
 * @param array $atts {
 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
 *
 *     @type string $title        Title attribute.
 *     @type string $target       Target attribute.
 *     @type string $rel          The rel attribute.
 *     @type string $href         The href attribute.
 *     @type string $aria-current The aria-current attribute.
 * }
 * @param WP_Post  $menu_item The current menu item object.
 * @param stdClass $args      An object of wp_nav_menu() arguments.
 * @param int      $depth     Depth of menu item. Used for padding.
 */
function add_nav_menu_link_attributes($atts, $item, $args, $depth)
{
	if (isset($args->link_class)) {
		$atts['class'] = $args->link_class;

		if (in_array('menu-item-has-children', $item->classes)) {
			$atts['class'] .= ' dropdown-toggle';
			$atts['role'] = 'button';
			$atts['data-bs-toggle'] = "dropdown";
			$atts['data-bs-auto-close'] = "outside";
			$atts['data-bs-offset'] = "10,20";
			$atts['aria-expanded'] = "false";
		}

		if ($depth !== 0) {
			$atts['class'] .= ' dropdown-item';
		} else {
			$atts['class'] .= " nav-link";
		}
	}


	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_nav_menu_link_attributes', 1, 4);

/**
 * Filters the CSS class(es) applied to a menu list element.
 *
 * @since 4.8.0
 *
 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
 * @param int      $depth   Depth of menu item. Used for padding.
 */
function add_nav_menu_submenu_css_class($classes, $args, $depth): array
{
	$classes[] = 'dropdown-menu';
	return $classes;
}
add_filter('nav_menu_submenu_css_class', 'add_nav_menu_submenu_css_class', 10, 3);
