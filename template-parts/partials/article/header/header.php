<?php the_category(' '); ?>

<?php the_title('<h1 class="display-3 fw-medium">', '</h1>'); ?>

<?php the_excerpt(); ?>

<section class="page-meta small text-body-tertiary d-flex gap-2">
	<?php the_author_posts_link() ?>
	<?php the_date(); ?>
</section>
