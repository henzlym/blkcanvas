<?php
$args = array(
	'author' => array(
		'classes' => 'text-uppercase'
	)
);
?>
<?php get_header(); ?>
<main class="container py-5 mw-container-lg">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : ?>
			<?php the_post(); ?>
			<article>
				<?php get_template_part('template-parts/partials/article/header/header',); ?>
				<?php echo get_the_post_thumbnail(null, 'medium', array('class' => 'img-fluid aspect-ratio-univisium w-100 object-fit-cover mb-5')); ?>
				<?php get_template_part('template-parts/partials/article/body/body', ''); ?>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
