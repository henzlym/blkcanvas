<?php
require_once __DIR__ . '/wp.config.php';
require_once __DIR__ . '/src/StarterSite.php';
require_once __DIR__ . '/inc/templates.php';
require_once __DIR__ . '/inc/widgets.php';

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
		$classes[] = 'dropdown';
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
function add_nav_menu_link_attributes($atts, $item, $args)
{
	if (isset($args->link_class)) {
		$atts['class'] = $args->link_class;

		if (in_array('menu-item-has-children', $item->classes)) {
			$atts['class'] .= ' dropdown-toggle';
		}
	}


	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_nav_menu_link_attributes', 1, 3);

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


/**
 * Filters the link to the author page of the author of the current post.
 *
 * @since 2.9.0
 *
 * @param string $link HTML link.
 */
function the_author_posts_link_add_byline_prefix($link): string
{
	return '<span>By</span> ' . $link;
}
add_filter('the_author_posts_link', 'the_author_posts_link_add_byline_prefix', 10, 1);


// function _theme_set_template_vars(): Returntype
// {
// 	$template_vars = array(
// 		'post' => array(),
// 		'page' => array()
// 	);

// 	$args = wp_parse_args($args, $template_vars);
// }
