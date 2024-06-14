<?php get_header(); ?>
<main class="container-lg py-5">
	<div class="row">
		<div class="col-md-9">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : ?>
					<?php the_post(); ?>
					<article>
						<?php get_template_part('template-parts/partials/article/header/header'); ?>
						<?php echo get_the_post_thumbnail(null, 'medium', array('class' => 'img-fluid aspect-ratio-widescreen w-100 object-fit-cover')); ?>
						<?php get_template_part('template-parts/partials/article/body/body', ''); ?>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
