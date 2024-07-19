<?php
$prock_styles_to_move = ['elementor-common', 'elementor-icons', 'e-theme-ui-light', 'elementor-pro-notes-frontend', 'prac-phone-widget', 'wordfenceAJAXcss', 'ivory-search-styles', 'hello-elementor', 'hello-elementor-theme-style', 'plymouth', 'hello-elementor-header-footer', 'elementor-frontend', 'swiper', 'elementor-post-8', 'elementor-pro', 'uael-frontend', 'font-awesome-5-all', 'font-awesome-4-shim', 'ecs-styles', 'elementor-icons-shared-0', 'elementor-icons-fa-solid', 'elementor-icons-fa-regular'];
$prock_footer_styles = [];

function bca_dequeue_styles()
{
	global $prock_footer_styles, $prock_styles_to_move;

	$wp_styles = wp_styles();
	$registered_site_styles = $wp_styles->registered;
	$queued_site_styles = $wp_styles->queue;

	do_action('qm/debug', $queued_site_styles);


	foreach ($registered_site_styles as $key => $style) {

		if (in_array($key, $prock_styles_to_move)) {
			do_action('qm/debug', $key);
			$prock_footer_styles[$key] = $registered_site_styles[$key];
			wp_deregister_style($key);
			wp_dequeue_style($key);

			// [
			// 	"handle" => "site-main",
			// 	"src" => "http://localhost:8881/wp-content/themes/blkcanvas/frontend/src/public/css/site.css",
			// 	"deps" => [],
			// 	"ver" => "1.0.0",
			// 	"args" => "all",
			// 	"extra" => [],
			// 	"textdomain" => "",
			// 	"translations_path" => ""
			// ];
		}
	}
}
//add_action('wp_enqueue_scripts', 'bca_dequeue_styles', 100);

function bca_load_footer_styles()
{
	global $prock_footer_styles;

	do_action('qm/debug', $prock_footer_styles);
	foreach ($prock_footer_styles as $key => $style) {
		do_action('qm/debug', $key);
		wp_enqueue_style($key, $style->src, $style->deps, $style->ver);
	}
}
//add_action('wp_footer', 'bca_load_footer_styles', 10);

function bca_critical_css()
{

	$file = get_stylesheet_directory() . '/build/css/header/all.css';
	// get_stylesheet_directory()
	$template_css = file_get_contents($file);

?>
	<style id="prock-critical-css">
		<?php echo $template_css; ?>
	</style>
<?php
}

//add_action('wp_head', 'bca_critical_css');
