<?php
// Add this code to your theme's functions.php file

function _theme_single_post_template($single_template)
{

	$single_template = get_template_directory() . '/template-parts/single--two-column.php';

	return $single_template;
}
add_filter('single_template', '_theme_single_post_template');
