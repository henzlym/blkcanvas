<div <?php post_class('card list-item list-item--article flex-column flex-sm-row'); ?>>

	<div class="card-body">

		<?php the_category(' '); ?>

		<h4 class="card-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>

		<p class="card-text"><?php echo get_the_excerpt(); ?></p>

	</div>
</div>
