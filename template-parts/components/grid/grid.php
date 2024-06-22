<div class="grid-container">

	<?php if (isset($args['title'])) : ?>
		<div class="row">
			<div class="col-12">
				<h2 class="grid-container--title"><?php echo $args['title']; ?></h2>
			</div>
		</div>
	<?php endif; ?>

	<?php if (have_posts()) : ?>

		<div class="row row-cols-1 row-cols-md-2">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/components/card/card'); ?>
			<?php endwhile; ?>
		</div>

		<nav aria-label="Page navigation example">
			<?php the_posts_pagination(array('type' => 'list')); ?>
		</nav>
	<?php else : ?>
		<h2>No results were found</h2>
	<?php endif; ?>

</div>
