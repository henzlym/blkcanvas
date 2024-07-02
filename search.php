<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sandbox
 */
?>

<?php get_header(); ?>
<main>
	<section class="container-lg my-5">
		<h1>
			<?php
			/* translators: Search query. */
			printf(__('Search Results for: %s', 'twentyseventeen'), '<span>' . get_search_query() . '</span>');
			?>
		</h1>
		<?php get_template_part('template-parts/components/list/list', '', array(
			'title' => false
		)); ?>
	</section>
</main>
<?php get_footer(); ?>
