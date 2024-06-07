<div class="author <?php echo isset($args['author']['classes']) ? $args['author']['classes'] : ''; ?>">
	<?php
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x('By %s', 'post author', 'blkcanvas'),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . get_the_author() . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	?>
</div>
