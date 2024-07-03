<footer class="container-lg py-3 ">

	<nav class="navbar navbar-expand-lg justify-content-center justify-content-sm-start">
		<a class="navbar-brand-footer" href="#">
			© <?php echo bloginfo('name'); ?>
		</a>

		<?php
		wp_nav_menu(
			array(
				'container'            => 'nav',
				'container_class'      => 'nav-container ms-0 ms-sm-auto',
				'menu_class'           => 'menu nav flex-column flex-sm-row align-items-center align-items-sm-start',
				'fallback_cb'          => false,
				'link_class'           => 'nav-link text-uppercase',
				'theme_location'       => 'footer',
			)
		);
		?>
	</nav>
</footer>
