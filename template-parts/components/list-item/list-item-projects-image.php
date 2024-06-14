<div <?php post_class('list-item row g-3'); ?>>

	<?php the_post_thumbnail('medium', array('class' => 'img-fluid aspect-ratio-widescreen object-fit-cover w-100')); ?>

	<div class="list-item-body <?php echo has_post_thumbnail() ? 'col-sm-7' : ''; ?>">

		<?php the_category(' '); ?>

		<h3 class="list-item-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>

		<div class="list-item-meta d-flex gap-2 text-body-tertiary small mb-3">
			<?php get_template_part('template-parts/partials/article/meta/meta'); ?>
		</div>

		<?php the_excerpt(); ?>

	</div>
</div>
