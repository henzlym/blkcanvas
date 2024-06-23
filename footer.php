</div>
<footer class="container-lg py-3 ">

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
