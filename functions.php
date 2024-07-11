<?php
require_once __DIR__ . '/wp.config.php';
require_once __DIR__ . '/src/site.php';
require_once __DIR__ . '/inc/widgets.php';
require_once __DIR__ . '/inc/taxonomies.php';
require_once __DIR__ . '/inc/navigation.php';
require_once __DIR__ . '/inc/post.php';
require_once __DIR__ . '/inc/post-types.php';
require_once __DIR__ . '/inc/media.php';


function _theme_paginate_links_output(string $r, array $args): string
{

	$r = str_replace('ul class=\'page-numbers\'', 'ul class=\'pagination\'', $r);
	$r = str_replace('page-numbers', 'page-numbers page-link', $r);
	$r = str_replace('current', 'current active', $r);
	$r = str_replace('dots', 'dots disabled', $r);
	$r = str_replace('<li>', '<li class="page-item">', $r);

	return $r;
}
add_filter('paginate_links_output', '_theme_paginate_links_output', 10, 2);
