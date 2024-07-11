<?php
function bca_wp_content_img_tag(string $filtered_image, string $context, int $attachment_id): string
{
	$filtered_image = replace_img_src_with_data_src($filtered_image);
	return $filtered_image;
}
add_filter('wp_content_img_tag', 'bca_wp_content_img_tag', 10, 3);

/**
 * Filters the list of attachment image attributes.
 *
 * @since 2.8.0
 *
 * @param string[]     $attr       Array of attribute values for the image markup, keyed by attribute name.
 *                                 See wp_get_attachment_image().
 * @param WP_Post      $attachment Image attachment post.
 * @param string|int[] $size       Requested image size. Can be any registered image size name, or
 *                                 an array of width and height values in pixels (in that order).
 */
function wpdocs_filter_gallery_img_atts($atts, $attachment, $size)
{
	$placeholder = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDI0IiB2aWV3Qm94PSIwIDAgMTAyNCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPjxyZWN0IHdpZHRoPSIxMDI0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2NjY2NjYyIgLz48L3N2Zz4=";
	if (!isset($atts['data-src'])) {
		$atts['data-src'] = $atts['src'];
		$atts['src'] = $placeholder;
	}
	return $atts;
}
add_filter('wp_get_attachment_image_attributes', 'wpdocs_filter_gallery_img_atts', 10, 3);

function replace_img_src_with_data_src($html)
{
	// Define the placeholder image
	$placeholder = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDI0IiB2aWV3Qm94PSIwIDAgMTAyNCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPjxyZWN0IHdpZHRoPSIxMDI0IiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2NjY2NjYyIgLz48L3N2Zz4=';

	// Regular expression to find <img> tags and capture the src attribute
	$pattern = '/<img([^>]*?)src=("|\')(.*?)\2([^>]*?)>/i';

	// Callback function to replace the src attribute and add data-src
	$callback = function ($matches) use ($placeholder) {
		$before = $matches[1];
		$src = $matches[3];
		$after = $matches[4];

		// Build the new img tag with the placeholder src and data-src
		$new_tag = '<img' . $before . 'src="' . $placeholder . '" data-src="' . $src . '"' . $after . '>';
		return $new_tag;
	};

	// Perform the replacement
	$new_html = preg_replace_callback($pattern, $callback, $html);

	return $new_html;
}

function bca_add_lazyload_styles()
{
?>
	<style>
		img[data-src] {
			aspect-ratio: 16/9;
			object-fit: cover
		}
	</style>
<?php
}
// add_action('wp_head', 'bca_add_lazyload_styles');

function bca_add_lazyload_scripts()
{
?>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			const lazyImages = document.querySelectorAll('img[data-src]');

			const imageObserver = new IntersectionObserver((entries, observer) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						const image = entry.target;
						if (image.classList.contains('wp-post-image')) {
							setTimeout(() => {
								image.src = image.dataset.src;
								imageObserver.unobserve(image);
							}, 3000);
						} else {
							image.src = image.dataset.src;
							imageObserver.unobserve(image);
						}


					}
				});
			});

			lazyImages.forEach((image) => {
				imageObserver.observe(image);
			});
		});
	</script>
<?php
}
add_action('wp_footer', 'bca_add_lazyload_scripts');
