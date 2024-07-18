<?php

/**
 * Title: Two Column Layout
 * Slug: blkcanvas/two-column-layout
 * Categories: posts
 *
 * @package blkcanvas
 * @since 1.0.0
 */
?>

<!-- wp:bca/bootstrap-container {"tagName":"main"} -->
<main class="wp-block-bca-bootstrap-container container" style="background-color:transparent;color:inherit"><!-- wp:bca/bootstrap-row {"rowAlignment":"justify-content-center"} -->
	<div class="wp-block-bca-bootstrap-row row justify-content-center"><!-- wp:bca/bootstrap-column {"columnSizeMd":9} -->
		<div class="wp-block-bca-bootstrap-column col col-md-9"><!-- wp:group {"tagName":"article","metadata":{"name":"Article"},"style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"default"}} -->
			<article class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:group {"tagName":"header","metadata":{"name":"Post Header"},"align":"full","layout":{"type":"default"}} -->
				<header class="wp-block-group alignfull"><!-- wp:post-terms {"term":"category"} /-->

					<!-- wp:post-title {"level":1} /-->

					<!-- wp:post-excerpt /-->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group"><!-- wp:post-author-name {"isLink":true} /-->

						<!-- wp:post-date /-->
					</div>
					<!-- /wp:group -->
				</header>
				<!-- /wp:group -->

				<!-- wp:post-featured-image {"aspectRatio":"16/9","align":"wide"} /-->

				<!-- wp:post-content {"layout":{"type":"constrained"}} /-->

				<!-- wp:spacer {"height":"1rem"} -->
				<div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:group {"layout":{"type":"default"}} -->
				<div class="wp-block-group"><!-- wp:post-terms {"term":"post_tag","prefix":"Tags: "} /-->

					<!-- wp:separator {"backgroundColor":"secondary"} -->
					<hr class="wp-block-separator has-text-color has-secondary-color has-alpha-channel-opacity has-secondary-background-color has-background" />
					<!-- /wp:separator -->

					<!-- wp:spacer {"height":"1rem"} -->
					<div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"layout":{"type":"default"}} -->
				<div class="wp-block-group"><!-- wp:comments -->
					<div class="wp-block-comments"><!-- wp:heading -->
						<h2 class="wp-block-heading">Comments</h2>
						<!-- /wp:heading -->

						<!-- wp:comments-title /-->

						<!-- wp:comment-template -->
						<!-- wp:columns -->
						<div class="wp-block-columns"><!-- wp:column {"width":"40px"} -->
							<div class="wp-block-column" style="flex-basis:40px"><!-- wp:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /--></div>
							<!-- /wp:column -->

							<!-- wp:column -->
							<div class="wp-block-column"><!-- wp:comment-author-name {"fontSize":"small"} /-->

								<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex"}} -->
								<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:comment-date {"fontSize":"small"} /-->

									<!-- wp:comment-edit-link {"fontSize":"small"} /-->
								</div>
								<!-- /wp:group -->

								<!-- wp:comment-content /-->

								<!-- wp:comment-reply-link {"fontSize":"small"} /-->
							</div>
							<!-- /wp:column -->
						</div>
						<!-- /wp:columns -->
						<!-- /wp:comment-template -->

						<!-- wp:comments-pagination -->
						<!-- wp:comments-pagination-previous /-->

						<!-- wp:comments-pagination-numbers /-->

						<!-- wp:comments-pagination-next /-->
						<!-- /wp:comments-pagination -->

						<!-- wp:post-comments-form /-->
					</div>
					<!-- /wp:comments -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"layout":{"type":"default"}} -->
				<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
					<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:post-navigation-link {"type":"previous","showTitle":true,"linkLabel":true,"arrow":"arrow"} /-->

						<!-- wp:post-navigation-link {"showTitle":true,"linkLabel":true,"arrow":"arrow"} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->
		</div>
		<!-- /wp:bca/bootstrap-column -->

		<!-- wp:bca/bootstrap-column {"columnSizeMd":3} -->
		<div class="wp-block-bca-bootstrap-column col col-md-3"><!-- wp:latest-posts /--></div>
		<!-- /wp:bca/bootstrap-column -->
	</div>
	<!-- /wp:bca/bootstrap-row -->
</main>
<!-- /wp:bca/bootstrap-container -->