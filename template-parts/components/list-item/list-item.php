<article <?php post_class('list-item row align-items-start g-3'); ?>>

	<?php the_post_thumbnail('medium', array('class' => 'col-sm-5 img-fluid aspect-ratio-widescreen object-fit-cover')); ?>

	<header <?php echo (has_post_thumbnail()) ? 'class="col-sm-7"' : ''; ?>>

		<?php the_category(' '); ?>

		<?php
		the_title(
			sprintf('<h2 class="h3"><a href="%s" rel="bookmark">', esc_attr(esc_url(get_permalink()))),
			'</a></h2>'
		);
		?>

		<section class="page-meta small text-body-tertiary d-flex gap-2 mb-3" aria-label="Author byline and Published date">
			<?php the_author_posts_link() ?>
			<?php the_date(); ?>
		</section>

		<?php the_excerpt(); ?>

	</header>
</article>
