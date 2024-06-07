<?php
$body_args = array(
	'classes' => 'mw-container-lg mx-auto'
);
?>
<?php get_header(); ?>
<main class="container py-5">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : ?>
			<?php the_post(); ?>
			<article>
				<?php get_template_part('template-parts/partials/article/header/header'); ?>
				<?php echo get_the_post_thumbnail(null, 'medium', array('class' => 'img-fluid aspect-ratio-widescreen w-100 object-fit-cover')); ?>
				<?php get_template_part('template-parts/partials/article/body/body', '', $body_args); ?>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
