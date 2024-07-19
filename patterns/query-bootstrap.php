<?php

/**
 * Title: Query - Bootstrap
 * Slug: blkcanvas/query-bootstrap
 * Categories: posts
 * Block Types: core/post-conent, core/query, core/post-title
 *
 * @package blkcanvas
 * @since 1.0.0
 */
?>
<!-- wp:bca/bootstrap-container -->
<div class="wp-block-bca-bootstrap-container container" style="background-color:transparent;color:inherit"><!-- wp:heading {"level":1} -->
	<h1 class="wp-block-heading">Latest posts</h1>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
	<div class="wp-block-query"><!-- wp:post-template -->
		<!-- wp:bca/bootstrap-row -->
		<div class="wp-block-bca-bootstrap-row row"><!-- wp:bca/bootstrap-column {"columnSizeLg":5} -->
			<div class="wp-block-bca-bootstrap-column col col-lg-5"><!-- wp:post-featured-image /--></div>
			<!-- /wp:bca/bootstrap-column -->

			<!-- wp:bca/bootstrap-column {"columnSizeLg":7} -->
			<div class="wp-block-bca-bootstrap-column col col-lg-7"><!-- wp:post-title /-->

				<!-- wp:post-date /-->
			</div>
			<!-- /wp:bca/bootstrap-column -->
		</div>
		<!-- /wp:bca/bootstrap-row -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination -->
		<!-- wp:query-pagination-previous /-->

		<!-- wp:query-pagination-numbers /-->

		<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->

		<!-- wp:query-no-results -->
		<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
		<p></p>
		<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:bca/bootstrap-container -->
