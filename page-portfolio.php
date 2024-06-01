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
	<header class="header position-sticky top-0 z-3 bg-dark">

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

							<ul class="nav gap-3">

								<li class="nav-item text-light">

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

								<li class="nav-item text-light">

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

								<li class="nav-item text-light">

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
	</header>

	<div class="components portfolio-components container">

		<div class="jumbotron py-3 py-lg-5">
			<h1 class="mb-1">Henzly "Henz" Meghie</h1>
			<p class="mb-3 fst-italic">Web Developer</p>
			<p class="mb-5 lead">As a Web Developer, I'm here to help deliver creative solutions that empower businesses to maximize their value and achieve their goals effectively. Let's collaborate and achieve impactful results together!</p>
			<div class="call-to-actions d-flex gap-3 mb-3 align-items-center text-light">

				<a href="henzlymeghie.com" class="link-item text-light">
					<span class="link-item-wrapper">
						<span class="link-item-icon" aria-hidden="true">

							<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
								<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#display" />
							</svg>
						</span>
					</span>
				</a>

				<a href="#" class="link-item text-light">
					<span class="link-item-wrapper">
						<span class="link-item-icon" aria-hidden="true">

							<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
								<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#github" />
							</svg>
						</span>
					</span>
				</a>

				<a href="#" class="link-item text-light">
					<span class="link-item-wrapper">
						<span class="link-item-icon" aria-hidden="true">

							<svg class="bi " style="aspect-ratio:24/24" width="24" viewbox="0 0 24 24" fill="currentColor" id="icon_${name}">
								<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#linkedin" />
							</svg>
						</span>
					</span>
				</a>
			</div>
		</div>
	</div>

	<div class="components portfolio-components container">

		<section class="gallery ">
			<div class="container">
				<div class="row row-cols-1 row-cols-md-2 gy-2">
					<div class="col ">

						<div class="gallery-item design">
							<div class="gallery-item-figure position-relative d-flex align-items-center justify-content-center">

								<figure class="figure ">
									<div class="figure-img rounded-4 overflow-hidden">

										<picture class="picture">

											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/maxim-0.png" class="img-fluid" width="720" height="504" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
										</picture>
									</div>
								</figure>
							</div>
							<div class="mb-5">
								<h2 class="lh-base h4">
									<a href="maxim" class="text-reset">Maxim</a>
								</h2>
								<p class="mb-0">Maxim is an international men's magazine, devised and launched in the UK in 1995, but based in New York City since 1997, and prominent for its photography of actors, singers, and female models whose careers are at a current peak. Maxim has a circulation of about 9 million readers each month</p>
							</div>

							<a href="maxim" class="btn btn-outline-light">
								View Project
								<span class="ms-1">

									<svg class="bi " style="aspect-ratio:22/22" width="22" viewbox="0 0 22 22" fill="currentColor" id="icon_${name}">
										<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#arrow-right" />
									</svg>
								</span>
							</a>
						</div>
					</div>
					<div class="col mt-5">

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
									<a href="thegrio" class="text-reset">TheGrio</a>
								</h2>
								<p class="mb-0">TheGrio, styled as thegrio, is an American television network and website with news, opinion, entertainment and video content geared toward African-Americans.</p>
							</div>

							<a href="thegrio" class="btn btn-outline-light">
								View Project
								<span class="ms-1">

									<svg class="bi " style="aspect-ratio:22/22" width="22" viewbox="0 0 22 22" fill="currentColor" id="icon_${name}">
										<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#arrow-right" />
									</svg>
								</span>
							</a>
						</div>
					</div>
					<div class="col ">

						<div class="gallery-item design">
							<div class="gallery-item-figure position-relative d-flex align-items-center justify-content-center">

								<figure class="figure ">
									<div class="figure-img rounded-4 overflow-hidden">

										<picture class="picture">

											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/portfolio/sportsnaut-0.png" class="img-fluid" width="720" height="504" alt="Ab nulla officiis eligendi omnis iste at distinctio vel amet" loading="lazy">
										</picture>
									</div>
								</figure>
							</div>
							<div class="mb-5">
								<h2 class="lh-base h4">
									<a href="sportsnaut" class="text-reset">Sportsnaut</a>
								</h2>
								<p class="mb-0">Sportsnaut brings breaking news, rumors, rankings, predictions, and much more for the top U.S. sports, including the NFL, NBA, MLB, NHL, CFB, and NASCAR.</p>
							</div>

							<a href="sportsnaut" class="btn btn-outline-light">
								View Project
								<span class="ms-1">

									<svg class="bi " style="aspect-ratio:22/22" width="22" viewbox="0 0 22 22" fill="currentColor" id="icon_${name}">
										<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#arrow-right" />
									</svg>
								</span>
							</a>
						</div>
					</div>
					<div class="col mt-5">

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
									<a href="cityam" class="text-reset">City A.M.</a>
								</h2>
								<p class="mb-0">City A.M. is a free business-focused newspaper distributed in and around London, England, with an accompanying website. In 2023, it had a monthly online readership between 1.8m and 2m and print circulation of 67,714</p>
							</div>

							<a href="cityam" class="btn btn-outline-light">
								View Project
								<span class="ms-1">

									<svg class="bi " style="aspect-ratio:22/22" width="22" viewbox="0 0 22 22" fill="currentColor" id="icon_${name}">
										<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#arrow-right" />
									</svg>
								</span>
							</a>
						</div>
					</div>
					<div class="col ">

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
									<a href="[object Object]" class="text-reset">TheWrap</a>
								</h2>
								<p class="mb-0">TheWrap is an American multiplatform media company covering the business of entertainment and media via digital, print, and live events. It was founded by journalist Sharon Waxman in 2009</p>
							</div>

							<a href="#" class="btn btn-outline-light">
								View Project
								<span class="ms-1">

									<svg class="bi " style="aspect-ratio:22/22" width="22" viewbox="0 0 22 22" fill="currentColor" id="icon_${name}">
										<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/icons/icons.svg#arrow-right" />
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>

			</div>
		</section>
	</div>

	<footer class="footer py-3 mt-5">

		<div class="container d-flex align-items-center">

			<div class="">
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

									<li class="nav-item text-light">

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

									<li class="nav-item text-light">

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

									<li class="nav-item text-light">

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