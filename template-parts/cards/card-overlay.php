<article id="post-<?php the_ID(); ?>" <?php post_class('card card-overlay'); ?>>
	<header class="entry-header">
		<span class="entry-categories"><?php the_category( "&nbsp;&nbsp;" ); ?></span>
		
		<?php if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;?>

		<?php if( is_archive() ): ?>	
		<?php blkcanvas_content(); ?>
		<?php endif; ?>
		
		<?php if ( 'post' === get_post_type() ) :?>
		<div class="entry-meta">
			<?php
			blkcanvas_posted_by();
			blkcanvas_posted_on();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php blkcanvas_post_thumbnail(); ?>
	
	<?php if( is_singular() ): ?>
	<?php blkcanvas_content(); ?>
	<?php endif; ?>

	

</article><!-- #post-<?php the_ID(); ?> -->