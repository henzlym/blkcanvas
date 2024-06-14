<?php
$query_args = isset($args['query']) && !empty($args['query']) ? $args['query'] : [];
$query_args = wp_parse_args($query_args, ['post_type' => 'post']);
$the_query = new WP_Query($query_args);
?>


<?php if (isset($args['title'])) : ?>
	<h2 class="list-group-title list-group--article-group-title"><?php echo $args['title']; ?></h2>
<?php endif; ?>


<?php if ($the_query->have_posts()) : ?>

	<ul class="list-group list-group--article-group row-gap-5 mb-5">

		<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

			<li class="list-group-item  article-group-item">
				<?php get_template_part('template-parts/components/list-item/list-item'); ?>
			</li>

		<?php endwhile; ?>

	</ul>

	<nav aria-label="Page navigation example">
		<?php the_posts_pagination(array('type' => 'list')); ?>
	</nav>

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<h2>No results were found</h2>
<?php endif; ?>
