<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
	<?php wp_head(); ?>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Libre+Barcode+39+Text&display=swap" rel="stylesheet" />
	<!-- END: Google Fonts -->

</head>

<body <?php body_class('theme-green portfolio--magazine'); ?> data-bs-theme="dark">
	<header class="py-sm-3 py-md-5 px-0 container-lg">
		<nav class="navbar navbar-expand-lg">
			<a class="navbar-brand font-navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
				<?php echo bloginfo('name'); ?>
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
							'menu_class'           => 'menu nav text-uppercase',
							'fallback_cb'          => 'wp_page_menu',
							'link_class'           => 'nav-link',
							'theme_location'       => 'primary',
						)
					);
					?>
				</div>
			</div>
		</nav>
	</header>
	<?php wp_body_open(); ?>
	<div id="page" class="site pb-5">
