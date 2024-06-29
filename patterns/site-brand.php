<?php

/**
 * Title: Site Brand
 * Slug: blkcanvas/site-brand
 * Inserter: no
 *
 * @package blkcanvas
 * @since 1.0.0
 */
?>
<!-- wp:group {"layout":{"type":"flex"}} -->
<div class="wp-block-group">
	<?php if (has_custom_logo()) : ?>
		<!-- wp:site-logo {"width":200} /-->
	<?php else : ?>
		<!-- wp:site-title {"level":0} /-->
	<?php endif; ?>


</div>
<!-- /wp:group -->
