<div class="card card-image ">

	<div class="card-header fs-meta">
		<?php the_category(' '); ?>
	</div>
	<?php if (has_post_thumbnail()) : ?>
		<div class="card-thumbnail">
			<?php echo get_the_post_thumbnail(null, 'medium', array('class' => 'img-fluid aspect-ratio-widescreen w-100 object-fit-cover')); ?>
		</div>
	<?php endif; ?>
	<div class="card-body">

		<h4 class="card-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>

		<p class="card-text mb-2"><?php echo get_the_excerpt(); ?></p>

		<span class="card-author">
			<div class="author">
				<?php the_author_posts_link(); ?>
			</div>
		</span>

	</div>
</div>
