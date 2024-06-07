<?php if (isset($args['title'])) : ?>
	<h2 class="list-group-title list-group--article-group-title"><?php echo $args['title']; ?></h2>
<?php endif; ?>

<?php if (have_posts()) : ?>
	<ul class="list-group list-group--article-group row-gap-5">
		<?php while (have_posts()) : the_post(); ?>
			<?php if (isset($args['list-item-type']) && $args['list-item-type']) : ?>
				<li class="list-group-item  article-group-item">
					<?php get_template_part('template-parts/components/list-item/list-item', $args['list-item-type']); ?>
				</li>
			<?php else : ?>
				<li class="list-group-item  article-group-item">
					<?php get_template_part('template-parts/components/list-item/list-item', ''); ?>
				</li>
			<?php endif; ?>

		<?php endwhile; ?>
	</ul>
	<?php the_posts_pagination(); ?>
<?php else : ?>
	<h2>No results were found</h2>
<?php endif; ?>
