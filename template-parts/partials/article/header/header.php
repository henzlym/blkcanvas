<div class="page-header mb-5">

	<div class="page-categories">
		<?php the_category(' '); ?>
	</div>

	<h1 class="display-3 fw-bolder"><?php echo get_the_title(); ?></h1>

	<p class="lead"><?php echo get_the_excerpt(); ?></p>

	<div class="page-meta small text-body-tertiary d-flex gap-2">
		<?php get_template_part('template-parts/partials/article/meta/meta'); ?>
	</div>

</div>
