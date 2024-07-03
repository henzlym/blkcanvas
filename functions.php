<?php
require_once __DIR__ . '/wp.config.php';
require_once __DIR__ . '/src/site.php';
require_once __DIR__ . '/inc/widgets.php';
require_once __DIR__ . '/inc/taxonomies.php';
require_once __DIR__ . '/inc/navigation.php';
require_once __DIR__ . '/inc/post.php';
require_once __DIR__ . '/blocks/blocks.php';


/**
 * Enqueue block stylesheets.
 */

if (!function_exists('_theme_core_block_stylesheets')) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function _theme_core_block_stylesheets()
	{
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/post-author',
			array(
				'handle' => '--theme-post-author',
				'src'    => get_parent_theme_file_uri('assets/css/post-author.css'),
				'ver'    => wp_get_theme(get_template())->get('Version'),
				'path'   => get_parent_theme_file_path('assets/css/post-author.css'),
			)
		);
	}
endif;

add_action('init', '_theme_core_block_stylesheets');

function _theme_wp_head()
{
?>
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Libre+Barcode+39+Text&display=swap" rel="stylesheet" />
	<!-- END: Google Fonts -->
<?php
}
add_action('wp_head', '_theme_wp_head');
