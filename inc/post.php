<?php

remove_filter('the_content', 'wpautop');

function _theme_post_thumbnail_html($html)
{
	if (is_admin()) return;

	if (is_singular() && !is_front_page() && in_the_loop() && $html) {

		$html = '
		<figure class="figure d-block">
			<div class="figure-img">
				' . $html . '
			</div>
			<figcaption class="figure-caption">' . get_the_post_thumbnail_caption() . '</figcaption>
		</figure>';
	}

	return $html;
}
// add_filter('post_thumbnail_html', '_theme_post_thumbnail_html');

/**
 * Filters the link to the author page of the author of the current post.
 *
 * @since 2.9.0
 *
 * @param string $link HTML link.
 */
function __theme_the_author_posts_link(string $link): string
{

	if (is_page_template('page-projects.php')) {
		return '';
	}

	return '<address class="author text-capitalize mb-0"> <span>By </span>' . $link . '</address>';
}
add_filter('the_author_posts_link', '__theme_the_author_posts_link', 10);

function _theme_the_date(string $the_date, string $format, string $before, string $after): string
{

	$time_string = '<time class="date published updated" datetime="%1$s"><a href="%3$s">%2$s</a></time>';

	if (get_the_time($format) !== get_the_modified_time($format) && is_singular()) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">Updated: %4$s</time>';
		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html($the_date),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);
	}

	$time_string = sprintf(
		$time_string,
		esc_attr(get_the_date(DATE_W3C)),
		esc_html($the_date),
		esc_attr(get_the_permalink())
	);

	return sprintf(
		/* translators: %s: post date. */
		esc_html_x('%s', 'post date', 'blkcanvas'),
		$time_string
	);
}
add_filter('the_date', '_theme_the_date', 10, 4);

function _theme_list_item_the_date(string $the_date, string $format, string $before, string $after): string
{
	if (is_page_template('page-projects.php')) {
		return '';
	}

	return $the_date;
}
add_filter('the_date', '_theme_list_item_the_date', 10, 4);

function _theme_list_item_post_thumbnail_html($html)
{

	if (!$html) {
		return $html;
	}
	return $html;
}
add_filter('post_thumbnail_html', '_theme_list_item_post_thumbnail_html');

function _theme_list_item_the_excerpt($the_excerpt)
{
	$read_more = '<a class="text-uppercase small" href="' . get_the_permalink() . '" rel="nofollow">View Website</a>';
	$the_excerpt = '<p class="post-text">' . $the_excerpt . '</p>';

	if (!is_single()) {
		$the_excerpt .= $read_more;
	}

	return $the_excerpt;
}

function _theme_single_the_excerpt($the_excerpt)
{
	if (is_single()) {
		$the_excerpt = '<p class="lead">' . $the_excerpt . '</p>';
	}

	return $the_excerpt;
}
add_filter('get_the_excerpt', '_theme_single_the_excerpt', 10);

function _theme_list_item_the_category(string $thelist, string $separator, string $parents): string
{

	if (is_page_template('page-projects.php')) {
		return '';
	}

	if (is_single()) {
		$thelist = sprintf(
			'<nav class="post-categories text-uppercase mb-3">%s</nav>',
			$thelist
		);
	} else {
		$thelist = sprintf(
			'<nav class="post-categories text-uppercase mb-3 small">%s</nav>',
			$thelist
		);
	}

	return $thelist;
}
add_filter('the_category', '_theme_list_item_the_category', 10, 3);

function _theme_get_template_part($slug, $name, $args)
{
	do_action('qm/debug', [get_query_var('list_item_read_more')]);
	if (get_query_var('list_item_read_more')) {
		add_filter('get_the_excerpt', '_theme_list_item_the_excerpt', 10);
	}
}
add_action('get_template_part_template-parts/components/list/list', '_theme_get_template_part', 10, 3);

function _theme_set_the_search_query($search_query)
{
	if (is_search()) {
		$search_query = sprintf(
			'<h1 class="mb-3">%s</h1>',
			$search_query
		);
	}
	return $search_query;
}
add_filter('the_search_query', '_theme_set_the_search_query', 10, 2);
