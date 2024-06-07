<footer class="container-lg">

	<nav class="navbar navbar-expand-lg  ">
		<a class="navbar-brand-footer" href="#">
			© <?php echo bloginfo('name'); ?>
		</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			<div class="nav-wrapper">
				<?php
				wp_nav_menu(
					array(
						'container'            => 'nav',
						'container_class'      => 'nav-container ms-auto',
						'menu_class'           => 'menu nav',
						'fallback_cb'          => 'wp_page_menu',
						'link_class'           => 'nav-link text-uppercase',
						'theme_location'       => 'footer',
					)
				);
				?>
			</div>
		</div>
	</nav>
</footer>
