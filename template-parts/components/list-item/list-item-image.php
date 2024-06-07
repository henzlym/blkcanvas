<div <?php post_class('card list-item list-item--article flex-column flex-sm-row'); ?>>

	<?php if (has_post_thumbnail()) : ?>
		<div class="card-thumbnail col-sm-4">
			<?php echo get_the_post_thumbnail(null, 'medium', array('class' => 'img-fluid aspect-ratio-widescreen w-100 object-fit-cover')); ?>
		</div>
	<?php endif; ?>

	<div class="card-body col-sm-8">

		<?php the_category(' '); ?>

		<h4 class="card-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>

		<p class="card-text d-sm-none d-lg-block"><?php echo get_the_excerpt(); ?></p>

	</div>
</div>
