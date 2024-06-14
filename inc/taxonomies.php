<?php

/**
 * Retrieves the primary category for a post.
 *
 * The primary category is determined using the following priority:
 * 1. Yoast SEO primary category
 * 2. RankMath primary category
 * 3. First category
 *
 * @since 1.0.0
 *
 * @param int|null $post_id  The ID of the post. If not provided, the current post ID is used.
 * @param string   $taxonomy The taxonomy to use for the primary category. Default is 'category'.
 *
 * @return array An array with term information. If no primary category is found, an empty array is returned.
 */
function _theme_get_post_primary_category($post_id, $taxonomy = 'category', $categories = array())
{
	if (!isset($post_id)) {
		$post_id = get_the_ID();
	}

	if (empty($categories)) {
		$categories = get_the_category($post_id);
	}

	// check for Yoast SEO primary category
	$yoast_primary_category = get_post_meta($post_id, '_yoast_wpseo_primary_category', true);
	if ($yoast_primary_category) {
		$primary_term = get_category($yoast_primary_category);
	} else {
		// check for RankMath primary category
		$rank_math_primary_category = get_post_meta($post_id, 'rank_math_primary_category', true);
		if ($rank_math_primary_category) {
			$primary_term = get_term($rank_math_primary_category, $taxonomy);
		} else {
			// return the first category
			$primary_term = !is_wp_error($categories) && count($categories) > 0 ? $categories[0] : [];
		}
	}

	return $primary_term;
}

function _theme_the_category_list(array $categories, int|false $post_id): array
{

	if (empty($categories)) {
		return $categories;
	}

	return [_theme_get_post_primary_category($post_id, 'category', $categories)];
}
add_filter('the_category_list', '_theme_the_category_list', 10, 2);
