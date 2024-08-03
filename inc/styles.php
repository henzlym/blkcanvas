<?php
function bca_critical_css()
{
	$css = file_get_contents(get_template_directory() . '/dist/critical/critical.css');
	$css = apply_filters('bca_critical_base_css', $css);
?>
	<style id="bca-critical-css">
		<?php echo $css; ?>
	</style>
<?php
}

add_action('wp_head', 'bca_critical_css', 1);
