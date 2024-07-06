<?php

/**
 * Plugin Name:       Bootstrap Navbar
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       bootstrap-navbar
 *
 * @package CreateBlock
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_bootstrap_navbar_block_init()
{
	register_block_type(__DIR__ . '/build', array(
		'render_callback' => 'render_bootstrap_navbar_block',
	));
}
add_action('init', 'create_block_bootstrap_navbar_block_init');

/**
 * Custom walker class for Bootstrap navigation.
 */
class WP_Bootstrap_Navwalker extends Walker_Nav_Menu
{

	// Start Level
	public function start_lvl(&$output, $depth = 0, $args = null)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}

	// Start Element
	public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'nav-item';
		if (in_array('menu-item-has-children', $classes)) {
			$classes[] = 'dropdown';
		}
		if ($depth && in_array('menu-item-has-children', $classes)) {
			$classes[] = 'dropdown-submenu';
		}

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$atts = array();
		$atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
		$atts['target'] = !empty($item->target)     ? $item->target     : '';
		$atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';

		if (in_array('menu-item-has-children', $classes) && $depth === 0) {
			$atts['href']          = '#';
			$atts['data-bs-toggle'] = 'dropdown';
			$atts['aria-haspopup'] = 'true';
			$atts['aria-expanded'] = 'false';
			$atts['class']         = 'nav-link dropdown-toggle';
		} else {
			$atts['href'] = !empty($item->url) ? $item->url : '';
			$atts['class'] = 'nav-link';
		}

		$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (!empty($value)) {
				$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	// End Element
	public function end_el(&$output, $item, $depth = 0, $args = null)
	{
		$output .= "</li>\n";
	}
}


function render_bootstrap_navbar_block($attributes)
{
	$navbarBrand = $attributes['navbarBrand'];
	$selectedMenu = $attributes['selectedMenu'];
	$enableSearch = $attributes['enableSearch'];
	$searchLabel = $attributes['searchLabel'];
	$searchPlaceholder = $attributes['searchPlaceholder'];
	$searchButtonText = $attributes['searchButtonText'];
	$navbarBrandMaxWidth = $attributes['navbarBrandMaxWidth'];
	$fullWidth = $attributes['fullWidth'];
	$backgroundColor = $attributes['backgroundColor'];
	$linkColor = $attributes['linkColor'];

	$site_title = get_bloginfo('name');

	ob_start();
?>

	<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: <?php echo esc_attr($backgroundColor); ?>; color: <?php echo esc_attr($linkColor); ?>;">
		<div class="<?php echo $fullWidth ? 'container-fluid' : 'container'; ?>">
			<?php if ($navbarBrand) : ?>
				<img src="<?php echo esc_url($navbarBrand); ?>" alt="<?php echo esc_attr($site_title); ?>" class="navbar-brand" style="max-width: <?php echo esc_attr($navbarBrandMaxWidth); ?>px;" />
			<?php else : ?>
				<a class="navbar-brand" href="#"><?php echo esc_html($site_title); ?></a>
			<?php endif; ?>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php if ($selectedMenu) : ?>
					<?php
					wp_nav_menu(array(
						'menu' => $selectedMenu,
						'container' => false,
						'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
						'fallback_cb' => '__return_false',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth' => 2,
						'walker' => new WP_Bootstrap_Navwalker(),
					));
					?>
				<?php endif; ?>
				<?php if ($enableSearch) : ?>
					<form class="d-flex" role="search">
						<label for="navbarSearch" class="visually-hidden"><?php echo esc_html($searchLabel); ?></label>
						<input class="form-control me-2" type="search" id="navbarSearch" placeholder="<?php echo esc_attr($searchPlaceholder); ?>" aria-label="<?php echo esc_attr($searchLabel); ?>" />
						<button class="btn btn-outline-success" type="submit"><?php echo esc_html($searchButtonText); ?></button>
					</form>
				<?php endif; ?>
			</div>
		</div>
	</nav>

<?php
	return ob_get_clean();
}
