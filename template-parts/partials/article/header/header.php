<div class="page-header">

	<p class="page-category-wrapper">
		<?php the_category(' '); ?>
	</p>

	<h1 class="page-title"><?php echo get_the_title(); ?></h1>

	<p class="lead"><?php echo get_the_excerpt(); ?></p>

	<div class="page-meta-wrapper">
		<?php get_template_part('template-parts/partials/article/meta/meta'); ?>
	</div>

</div>
