<?php

/**
 * Title: Footer
 * Slug: blkcanvas/hidden-footer
 * Inserter: no
 *
 * @package blkcanvas
 * @since 1.0.0
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:site-title {"level":0,"isLink":false,"fontSize":"small"} /-->
	<!-- wp:paragraph {"fontSize":"small"} -->
	<p class="has-small-font-size"><?php echo esc_html__('Copyright', 'blkcanvas') . ' ' . date_i18n(_x('Y', 'copyright date format', 'blkcanvas')); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
