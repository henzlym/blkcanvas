<div <?php post_class('list-item row align-items-start g-3'); ?>>

	<?php the_post_thumbnail('medium', array('class' => 'col-sm-5 img-fluid aspect-ratio-widescreen object-fit-cover')); ?>

	<div class="post-body <?php echo (has_post_thumbnail()) ? 'col-sm-7' : ''; ?>">

		<?php the_category(' '); ?>

		<?php
		the_title(
			sprintf('<h2 class="post-title h3"><a href="%s" rel="bookmark">', esc_attr(esc_url(get_permalink()))),
			'</a></h2>'
		);
		?>

		<div class="post-meta d-flex gap-2 text-body-tertiary small mb-3">
			<?php get_template_part('template-parts/partials/article/meta/meta'); ?>
		</div>

		<?php the_excerpt(); ?>

	</div>
</div>
