<div <?php post_class('card'); ?>>

	<?php the_category(' '); ?>

	<?php the_post_thumbnail('large', array('class' => 'img-fluid aspect-ratio-widescreen w-100 object-fit-cover')); ?>

	<div class="card-body">

		<?php
		the_title(
			sprintf('<h2 class="card-title h4"><a href="%s" rel="bookmark">', esc_attr(esc_url(get_permalink()))),
			'</a></h2>'
		);
		?>

		<div class="card-meta d-flex gap-2 text-body-tertiary small mb-3">
			<?php get_template_part('template-parts/partials/article/meta/meta'); ?>
		</div>

		<?php the_excerpt(); ?>

	</div>
</div>
