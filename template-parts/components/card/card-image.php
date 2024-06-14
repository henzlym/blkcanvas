<div class="card card-image">

	<div class="card-categories">
		<?php the_category(' '); ?>
	</div>

	<?php if (has_post_thumbnail()) : ?>
		<div class="card-thumbnail">
			<?php echo get_the_post_thumbnail(null, 'medium', array('class' => 'img-fluid aspect-ratio-widescreen w-100 object-fit-cover')); ?>
		</div>
	<?php endif; ?>

	<div class="card-body">

		<h4 class="card-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>

		<div class="card-author text-body-tertiary">
			<p class="author">
				<?php the_author_posts_link(); ?>
			</p>
		</div>

		<p class="card-text"><?php echo get_the_excerpt(); ?></p>

	</div>
</div>
