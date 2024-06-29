<?php

/**
 * Title: Query
 * Slug: blkcanvas/query
 * Categories: posts
 * Block Types: core/post-conent, core/query, core/post-title
 *
 * @package blkcanvas
 * @since 1.0.0
 */
?>
<!-- wp:query {"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
	<!-- wp:post-template -->
	<!-- wp:group {"tagName":"article","metadata":{"name":"Post - List Item"},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<article class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","width":"500px"} /-->

		<!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"60%"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group"><!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group"><!-- wp:post-author-name {"isLink":true} /-->

				<!-- wp:post-date /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-excerpt {"moreText":"Read more","excerptLength":19} /-->
		</div>
		<!-- /wp:group -->
	</article>
	<!-- /wp:group -->
	<!-- /wp:post-template -->
	<!-- wp:query-no-results -->
	<!-- wp:paragraph -->
	<p><?php esc_html_e('No results found.', 'blkcanvas'); ?></p><!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
	<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- wp:query-pagination-previous /-->
	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
