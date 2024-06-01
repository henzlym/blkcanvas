<?php

/**
 * Template Name: Single Portfolio v1
 * Template Post Type: post, page, projects
 * @package WordPress
 * @subpackage blkcanvaas
 * @since Blkcanvas 1.0.0
 */
?>

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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">
</head>

<body <?php body_class('text-bg-dark'); ?>>
	<?php wp_body_open(); ?>
	<header class="header position-sticky top-0 bg-dark">
		<div class="container">
			<nav class="navbar navbar-expand-lg ">

				<a href="#" class="link-item navbar-brand text-white">
					<span class="link-item-wrapper d-flex flex-row-reverse align-items-center gap-2">
						<span class="link-item-label">Henzly Meghie</span>
						<span class="link-item-icon" aria-hidden="true">

							<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
								<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#code-slash" />
							</svg>
						</span>
					</span>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
					<div class="navigation-wrapper">

						<nav class="nav-container d-flex flex-column column-gap-2 justify-content-center " id="site-navigation">

							<ul class="nav ">

								<li class="nav-item">

									<a href="https://github.com/henzlym?tab=repositories" class="link-item text-light nav-link">
										<span class="link-item-wrapper">
											<span class="link-item-icon" aria-hidden="true">

												<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
													<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#github" />
												</svg>
											</span>
										</span>
									</a>
								</li>

								<li class="nav-item">

									<a href="https://www.linkedin.com/in/henzly-meghie/" class="link-item text-light nav-link">
										<span class="link-item-wrapper">
											<span class="link-item-icon" aria-hidden="true">

												<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
													<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#linkedin" />
												</svg>
											</span>
										</span>
									</a>
								</li>

								<li class="nav-item">

									<a href="https://tidal.com/browse/user/40855946" class="link-item text-light nav-link">
										<span class="link-item-wrapper">
											<span class="link-item-icon" aria-hidden="true">

												<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
													<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#headphones" />
												</svg>
											</span>
										</span>
									</a>
								</li>

							</ul>
						</nav>
					</div>
				</div>
			</nav>
		</div>
	</header>

	<div class="components portfolio-components container">
		<div class="jumbotron py-3 py-lg-5">
			<h1 class="mb-1">Maxim</h1>
			<p class="mb-3 fst-italic"></p>
			<p class="mb-5 lead">Maxim, the renowned men's lifestyle magazine. Maxim delivers captivating content spanning fashion, technology, entertainment, and beyond. With a keen eye for the latest trends and an unwavering commitment to quality, Maxim continues to captivate its audience, offering a curated blend of style, and substance.</p>
			<div class="call-to-actions d-flex gap-3 mb-3 ">

				<a href="#" class="link-item btn btn-outline-light">
					<span class="link-item-wrapper">
						<span class="link-item-label">View Website</span>
						<span class="link-item-icon" aria-hidden="true">

							<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
								<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#arrow-right-short" />
							</svg>
						</span>
					</span>
				</a>
			</div>
		</div>
	</div>

	<section class="text-bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-12">

					<figure class="figure ">
						<div class="figure-img mb-lg-5 mb-md-5 mb-5 overflow-hidden rounded-4">

							<picture class="picture">

								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/maxim-5.png" class="img-fluid" width="1024" height="716" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
							</picture>
						</div>
					</figure>
				</div>
				<div class="col-xl-8 offset-xl-2 col-lg-12 col-md-12 col-12">
					<div class="row g-5 mb-lg-5 mb-md-5 mb-5 align-items-end">
						<div class="col-xl-3 col-lg-3 col-md-3 col-6">
							<div class="mb-4 mb-lg-0">
								<span>Client</span>
								<div class="d-flex align-items-center mt-2">
									<div class="">
										<a href="#" class="text-reset">
											<span class="fs-6">Client Name</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-3 col-8">
							<span>Services</span>
							<div class="mt-2 text-primary d-flex gap-1">

								<a href="#" class="link-item text-light">
									<span class="link-item-wrapper">
										<span class="link-item-label">Design</span>
									</span>
								</a>

								<a href="#" class="link-item text-light">
									<span class="link-item-wrapper">
										<span class="link-item-label">Branding</span>
									</span>
								</a>

								<a href="#" class="link-item text-light">
									<span class="link-item-wrapper">
										<span class="link-item-label">Website</span>
									</span>
								</a>
							</div>
						</div>
						<div class="col-xl-4 col-lg-3 col-md-3 col-6">
							<div class="mb-4 mb-lg-0">
								<div class="mt-2">

									<a href="#" class="link-item btn btn-outline-light">
										<span class="link-item-wrapper">
											<span class="link-item-label">View Website</span>
											<span class="link-item-icon" aria-hidden="true">

												<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
													<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#arrow-right-short" />
												</svg>
											</span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-5 g-4">
						<div class="col-lg-6 col-md-6 col-12">

							<figure class="figure portfolio-detail-image portfolio-detail-image-vertical">
								<div class="figure-img mb-lg-5 mb-md-5 mb-5 overflow-hidden rounded-4">

									<picture class="picture">

										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/maxim-4.png" class="img-fluid" width="1024" height="716" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
									</picture>
								</div>
							</figure>
						</div>
						<div class="col-lg-6 col-md-6 col-12">

							<figure class="figure portfolio-detail-image portfolio-detail-image-vertical">
								<div class="figure-img mb-lg-5 mb-md-5 mb-5 overflow-hidden rounded-4">

									<picture class="picture">

										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/maxim-3.png" class="img-fluid" width="1024" height="716" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
									</picture>
								</div>
							</figure>
						</div>
					</div>
					<div class="row mb-0 g-4">
						<div class="col-lg-12 col-md-12 col-12">

							<figure class="figure portfolio-detail-image portfolio-detail-image-widescreen">
								<div class="figure-img mb-lg-5 mb-md-5 mb-5 overflow-hidden rounded-4">

									<picture class="picture">

										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/maxim-0.png" class="img-fluid" width="1024" height="716" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
									</picture>
								</div>
							</figure>
						</div>
					</div>

					<div class="row g-4 d-none">
						<div class="col-lg-6 col-md-6 col-12">

							<figure class="figure portfolio-detail-image portfolio-detail-image-vertical">
								<div class="figure-img mb-lg-5 mb-md-5 mb-5 overflow-hidden rounded-4">

									<picture class="picture">

										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/maxim-4.png" class="img-fluid" width="1024" height="716" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
									</picture>
								</div>
							</figure>
						</div>
						<div class="col-lg-6 col-md-6 col-12">

							<figure class="figure portfolio-detail-image portfolio-detail-image-vertical">
								<div class="figure-img mb-lg-5 mb-md-5 mb-5 overflow-hidden rounded-4">

									<picture class="picture">

										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/maxim-3.png" class="img-fluid" width="1024" height="716" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
									</picture>
								</div>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="text-bg-dark">
		<div class="container">
			<div class="row text-bg-primary bg-gradient rounded-3 py-5 g-0">
				<div class="col-md-8 offset-md-2">
					<div class="text-center position-relative z-1">
						<h2 class="text-white-stable mb-3">Ready to Create Together?</h2>
						<a href="#!" class="btn btn-lg btn-dark">Get in touch</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="text-bg-dark py-5">
		<div class="container">
			<div class="row gy-7">
				<div class="col-lg-12 col-md-12 col-12">
					<h2 class="mb-5">Explore More Portfolio</h2>
				</div>
				<div class="col-lg-4 col-md-6 col-12">

					<div class="gallery-item design">
						<div class="gallery-item-figure position-relative d-flex align-items-center justify-content-center">

							<figure class="figure ">
								<div class="figure-img rounded-4 overflow-hidden">

									<picture class="picture">

										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/thegrio-0.png" class="img-fluid" width="720" height="504" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
									</picture>
								</div>
							</figure>
						</div>
						<div class="mb-5">
							<h2 class="lh-base h4">
								<a href="<?php echo site_url( '/portfolio/thegrio' ); ?>" class="text-reset">TheGrio</a>
							</h2>
							<p class="mb-0">TheGrio, styled as thegrio, is an American television network and website with news, opinion, entertainment and video content geared toward African-Americans.</p>
						</div>

						<a href="<?php echo site_url( '/portfolio/thegrio' ); ?>" class="btn btn-outline-light">
							View Project
							<span class="ms-1">

								<svg class="bi " style="aspect-ratio:22/22" width="22" viewbox="0 0 22 22" fill="currentColor">
									<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#arrow-right-short" />
								</svg>
							</span>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">

					<div class="gallery-item design">
						<div class="gallery-item-figure position-relative d-flex align-items-center justify-content-center">

							<figure class="figure ">
								<div class="figure-img rounded-4 overflow-hidden">

									<picture class="picture">

										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/thewrap-0.png" class="img-fluid" width="720" height="504" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
									</picture>
								</div>
							</figure>
						</div>
						<div class="mb-5">
							<h2 class="lh-base h4">
								<a href="<?php echo site_url( '/portfolio/thewrap' ); ?>" class="text-reset">TheWrap</a>
							</h2>
							<p class="mb-0">TheWrap is an American multiplatform media company covering the business of entertainment and media via digital, print, and live events. It was founded by journalist Sharon Waxman in 2009</p>
						</div>

						<a href="<?php echo site_url( '/portfolio/thewrap' ); ?>" class="btn btn-outline-light">
							View Project
							<span class="ms-1">

								<svg class="bi " style="aspect-ratio:22/22" width="22" viewbox="0 0 22 22" fill="currentColor">
									<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#arrow-right-short" />
								</svg>
							</span>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">

					<div class="gallery-item design">
						<div class="gallery-item-figure position-relative d-flex align-items-center justify-content-center">

							<figure class="figure ">
								<div class="figure-img rounded-4 overflow-hidden">

									<picture class="picture">

										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/cityam-0.png" class="img-fluid" width="720" height="504" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
									</picture>
								</div>
							</figure>
						</div>
						<div class="mb-5">
							<h2 class="lh-base h4">
								<a href="<?php echo site_url( '/portfolio/cityam' ); ?>" class="text-reset">City A.M.</a>
							</h2>
							<p class="mb-0">City A.M. is a free business-focused newspaper distributed in and around London, England, with an accompanying website. In 2023, it had a monthly online readership between 1.8m and 2m and print circulation of 67,714</p>
						</div>

						<a href="<?php echo site_url( '/portfolio/cityam' ); ?>" class="btn btn-outline-light">
							View Project
							<span class="ms-1">

								<svg class="bi " style="aspect-ratio:22/22" width="22" viewbox="0 0 22 22" fill="currentColor">
									<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#arrow-right" />
								</svg>
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer class="footer">
		<div class="container d-flex align-items-center justify-content-between">

			<div class="container">
				<nav class="navbar navbar-expand-lg ">

					<a href="#" class="link-item navbar-brand text-white">
						<span class="link-item-wrapper d-flex flex-row-reverse align-items-center gap-2">
							<span class="link-item-icon" aria-hidden="true">

								<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
									<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#code-slash" />
								</svg>
							</span>
						</span>
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
						<div class="navigation-wrapper">

							<nav class="nav-container d-flex flex-column column-gap-2 justify-content-center " id="site-navigation">

								<ul class="nav ">

									<li class="nav-item">

										<a href="/blog" class="link-item text-light nav-link">
											<span class="link-item-wrapper">
												<span class="link-item-icon" aria-hidden="true">

													<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
														<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#github" />
													</svg>
												</span>
											</span>
										</a>
									</li>

									<li class="nav-item">

										<a href="/linkedin" class="link-item text-light nav-link">
											<span class="link-item-wrapper">
												<span class="link-item-icon" aria-hidden="true">

													<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
														<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#linkedin" />
													</svg>
												</span>
											</span>
										</a>
									</li>

									<li class="nav-item">

										<a href="/misc" class="link-item text-light nav-link">
											<span class="link-item-wrapper">
												<span class="link-item-icon" aria-hidden="true">

													<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
														<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#headphones" />
													</svg>
												</span>
											</span>
										</a>
									</li>

								</ul>
							</nav>
						</div>
					</div>
				</nav>
			</div>

			<p class="copyright ms-auto">&copy;
				2024
				Company, Inc</p>

		</div>
	</footer>
	<?php wp_footer(); ?>
</body>

</html>