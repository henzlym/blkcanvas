<?php

/**
 * This file has been left empty on purpose.
 *
 * @link https://core.trac.wordpress.org/ticket/54272
 *
 * @package blkcanvas
 * @since 1.0.0
 */
?>

<?php get_header(); ?>
<main>
	<section class="container-lg my-5">
		<h1 class="text-uppercase mb-5"><?php single_cat_title('', true); ?></h1>
		<?php get_template_part('template-parts/components/list/list', '', array(
			'title' => false
		)); ?>
	</section>
</main>
<?php get_footer(); ?>
