<?php
$prock_styles_to_move = ['site-main', 'bootstrap-533', 'bootstrap-523', 'bootstrap-513', 'bootstrap-502', 'bootstrap-462', 'bootstrap-453'];
$prock_footer_styles = [];

function bca_dequeue_styles()
{
	global $prock_footer_styles, $prock_styles_to_move;

	$wp_styles = wp_styles();
	$registered_site_styles = $wp_styles->registered;
	$queued_site_styles = $wp_styles->queue;

	foreach ($registered_site_styles as $key => $style) {

		if (in_array($key, $prock_styles_to_move)) {
			$prock_footer_styles[$key] = $registered_site_styles[$key];
			wp_deregister_style($key);
			wp_dequeue_style($key);
		}
	}
}
add_action('wp_enqueue_scripts', 'bca_dequeue_styles', 100);

function bca_load_footer_styles()
{
	global $prock_footer_styles;

	foreach ($prock_footer_styles as $key => $style) {
		wp_enqueue_style($key, $style->src, $style->deps, $style->ver);
	}
}
add_action('wp_footer', 'bca_load_footer_styles', 10);

function bca_critical_archive_css()
{

	if (!is_archive()) return;

	$archive_css = get_stylesheet_directory() . '/dist/critical/archive.css';
	$archive_css = file_get_contents($archive_css);

?>
	<style id="archive-critical-css">
		<?php echo $archive_css; ?>
	</style>
<?php
}

add_action('wp_head', 'bca_critical_archive_css');


function bca_critical_single_css()
{

	if (!is_single()) return;

	$single_css = get_stylesheet_directory() . '/dist/critical/single.css';
	$single_css = file_get_contents($single_css);

?>
	<style id="single-critical-css">
		<?php echo $single_css; ?>
	</style>
<?php
}

add_action('wp_head', 'bca_critical_single_css');
