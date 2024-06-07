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
		<h1 class="text-uppercase mb-5"><?php echo single_cat_title('', false); ?></h1>
		<?php get_template_part('template-parts/components/list/list', '', array(
			'list-item-type' => 'image',
			'title' => false
		)); ?>
	</section>
</main>
<?php get_footer(); ?>
