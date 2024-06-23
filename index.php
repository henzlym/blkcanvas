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
		<h1 class="text-uppercase mb-5"><?php single_cat_title('', true); ?></h1>
		<?php get_template_part('template-parts/list', '', array(
			'title' => false
		)); ?>
	</section>
</main>
<?php get_footer(); ?>
