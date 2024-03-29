<?php
if ( ! defined( 'BCA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BCA_VERSION', '1.0.0' );
}

require_once get_template_directory() . '/includes/init.php';
/**
 * Enqueue scripts and styles.
 */
function blkcanvas_scripts() {
	// wp_enqueue_style( 'blkcanvas-style', get_stylesheet_directory_uri() . '/dist/style.min.css', $asset['dependencies'], $asset['version'] );
	wp_style_add_data( 'blkcanvas-style', 'rtl', 'replace' );
	wp_enqueue_script( 'blkcanvas-navigation', get_template_directory_uri() . '/build/js/scripts.min.js', [], BCA_VERSION, true );
	wp_localize_script( 'blkcanvas-navigation', 'blkcanvasTheme', array(
		'isAdminBarShowing' => is_admin_bar_showing()
	));
}
add_action( 'get_footer', 'blkcanvas_scripts' );

function blkcanvas_critical_css()
{
	?>
	<!-- BLKCANVAS CRITICAL CSS -->
	<?php    
	blkcanvas_get_css( 'critical', 'base' );

    if(is_front_page() && get_page_template_slug() == ''){
		blkcanvas_get_css( 'critical', 'archive' );
	}

	if(is_singular() && !is_front_page()){
		if( is_single() || is_page() && get_page_template_slug() == '' ){
			blkcanvas_get_css( 'critical', 'single' );
		}
	}
	
	if(is_archive() || is_search()){
		blkcanvas_get_css( 'critical', 'archive' );
	}

    $site_style = get_theme_mod( 'site_tyle', '' );

    if ($site_style) {
        blkcanvas_get_css( 'styles', 'newspaper' );
    }
	?>
	<!-- / BLKCANVAS CRITICAL CSS -->
	<?php
}
add_action( 'wp_head', 'blkcanvas_critical_css', 20 );

function blkcanvas_get_css( $path, $template )
{
    if (!$path) {
        return;
    }
    
	$file = get_template_directory() . '/build/css/'.$path.'/'.$template.'.min.css';	
	
	if( file_exists( $file ) ):
		
		$template_css = file_get_contents( $file );
		$template_css = apply_filters( 'blkcanvas_'.$path.'_css', $template_css, $template );

		?>
		<style id="blkcanvas-<?php echo $path; ?>-<?php echo $template; ?>-css"><?php echo $template_css; ?></style>
		<?php
	endif;
	
}

function blkcanvas_below_the_fold_css()
{
    blkcanvas_get_css( 'layout', 'footer' );
}
add_action( 'wp_footer', 'blkcanvas_below_the_fold_css', 20 );

function bca_body_class( $classes ) {
    $site_style = get_theme_mod( 'site_tyle', '' );
    
    if ($site_style) {
        $classes[] = 'is-style-' . $site_style;
    }
	if ( get_theme_mod( 'archive_template', 'list' ) == 'list' ) {
        $classes[] = 'list';
    }

	return $classes;
}
add_filter( 'body_class', 'bca_body_class' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blkcanvas_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on blkcanvas, use a find and replace
		* to change 'blkcanvas' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'blkcanvas', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	$image_sizes = bca_theme_image_sizes();

	if (is_array($image_sizes) && !empty($image_sizes) ) {
		foreach ($image_sizes as $key => $images_size) {
			add_image_size(
				$images_size['name'], 
				$images_size['width'], 
				$images_size['height'], 
				$images_size['crop']
			);
		}
	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Main Menu', 'blkcanvas' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'blkcanvas' ),
			'footer-submenu' => esc_html__( 'Footer Sub Menu', 'blkcanvas' ),
		)
	);

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

		
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'align-wide' );
	
	add_theme_support( 'custom-line-height' );

	add_theme_support( 'responsive-embeds' );
	
	add_theme_support( 'custom-spacing' );

	add_editor_style( 'editor-style.css' );
}

add_action( 'after_setup_theme', 'blkcanvas_theme_setup' );

function bca_override_media_settings() {

	$image_sizes = bca_theme_image_sizes();
	$image_options = array( 'thumbnail', 'medium', 'large' );
	if (is_array($image_sizes) && !empty($image_sizes) ) {
		foreach ($image_sizes as $key => $image_size) {
			if (!in_array($image_size['name'],$image_options)) continue;
			$height = ( $image_size['height'] == 0 ) ? null : $image_size['height'];
			update_option( $image_size['name']. '_size_w' , $image_size['width'] );
			update_option( $image_size['name']. '_size_h' , $height );
		}
	}

}

add_action( 'after_switch_theme', 'bca_override_media_settings' );   
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blkcanvas_widgets_init() {
	$side_bars = array(
		array(
			'name'          => esc_html__( 'Sidebar', 'blkcanvas' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'blkcanvas' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
		array(
			'name'          => esc_html__( 'Footer', 'blkcanvas' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Add widgets here.', 'blkcanvas' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
		array(
			'name'          => esc_html__( 'Footer Left', 'blkcanvas' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'blkcanvas' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
		array(
			'name'          => esc_html__( 'Footer Middle', 'blkcanvas' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'blkcanvas' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
		array(
			'name'          => esc_html__( 'Footer Right', 'blkcanvas' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'blkcanvas' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	foreach ($side_bars as $key => $side_bar) {
		register_sidebar( $side_bar );
	}
	
}

add_action( 'widgets_init', 'blkcanvas_widgets_init' );

if ( ! function_exists( 'blkcanvas_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function blkcanvas_post_thumbnail( $class = '' ) {

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$thumbnail_class = 'aspect-ratio';

		if ($class) {
			$thumbnail_class .= ' ' . $class;
		}

		if ( is_singular() ) :

			the_post_thumbnail( get_theme_mod('single_thumbnail_size', 'medium') ); 
						
		?>

		<?php else : ?>

			<a class="post-thumbnail <?php echo $thumbnail_class; ?>" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						get_theme_mod('archive_thumbnail_size', 'thumbnail'),
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>
			
			<?php
		endif; // End is_singular().
	}
endif;

function blkcanvs_post_thumbnail_html( $html )
{
	if( is_admin() ) return;

	if( is_singular() && !is_front_page() ){
		
		$caption = '<!-- .entry-thumbnail_caption --><div class="entry-thumbnail_caption">' . get_the_post_thumbnail_caption() . '</div><!-- /.entry-thumbnail_caption -->';
		return '<!-- .entry-thumbnail --><div class="entry-thumbnail aspect-ratio">'.$html.$caption.'</div><!-- /.entry-thumbnail -->';
	}
	return $html;
}
add_filter( 'post_thumbnail_html', 'blkcanvs_post_thumbnail_html' );

function blkcanvas_get_attachment_image_attributes( $attr, $attachment, $size )
{
    if (is_singular('post') && $attachment->ID === get_post_thumbnail_id()) {
        $attr['loading'] = 'egar';
    }
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'blkcanvas_get_attachment_image_attributes', 10, 3 );

function blkcanvas_has_post_thumbnail__false( $has_thumbnail )
{
	return false;
}
if ( ! function_exists( 'blkcanvas_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function blkcanvas_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">Updated: %4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'blkcanvas' ),
			$time_string
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'blkcanvas_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function blkcanvas_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'blkcanvas' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'blkcanvas_content' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function blkcanvas_content( $read_more = false ) {
		?>
		<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blkcanvas' ),
				'after'  => '</div>',
			)
		);
		?>
		</div><!-- .entry-content -->
	<?php
	}
endif;

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function blkcanvas_archive_excerpt_length( $length ) {
	if (!is_archive()) {
		return $length;
	}

    return get_theme_mod('archive_excerpt_length', 20 );
}

add_filter( 'excerpt_length', 'blkcanvas_archive_excerpt_length' );

function blkcanvas_get_the_excerpt_filter($excerpt) {

    $excerpt = wp_trim_words(
		$excerpt, 
		apply_filters("excerpt_length", get_theme_mod('archive_excerpt_length', 20 ))
	);

    return $excerpt;
}

add_filter("get_the_excerpt", "blkcanvas_get_the_excerpt_filter");

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function blkcanvas_excerpt_more( $excerpt ) {
	
    if ( is_single() ) {
        $excerpt = $excerpt . ' <a class="read-more" href="'.get_permalink( get_the_ID() ).'">Read More</a>';
    }
	
    return $excerpt;
}

function blkcanvas_remove_archive_title_prefix($prefix)
{
	return;
}
add_filter( 'get_the_archive_title_prefix', 'blkcanvas_remove_archive_title_prefix', 10, 1 );
function blkcanvas_get_archive_header()
{
	if (!is_archive()) return;
?>
<header class="archive-header">
	<?php
	the_archive_title( '<h1 class="archive-title">', '</h1>' );
	the_archive_description( '<div class="archive-description">', '</div>' );
	?>
</header><!-- .archive-header -->
<?php
}

add_action('wp_body_open', 'blkcanvas_get_archive_header', 20);

function blkcanvas_get_search_header()
{
	global $wp_query;
	if (!is_search()) return;
?>
<header class="archive-header">
	<h1 class="archive-title">
		<?php
		printf(
			/* translators: %s: Search term. */
			esc_html__( 'Results for "%s"', 'blkcanvas' ),
			'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
		);
		?>
	</h1>
	<div class="archive-description search-result-count">
		<?php
		printf(
			esc_html(
				/* translators: %d: The number of search results. */
				_n(
					'%d result for your search.',
					'%d results for your search.',
					(int) $wp_query->found_posts,
					'blkcanvas'
				)
			),
			(int) $wp_query->found_posts
		);
		?>
	</div><!-- .search-result-count -->
</header><!-- .page-header -->
<?php
}
add_action('wp_body_open', 'blkcanvas_get_search_header', 20);

function blkcanvas_logo()
{
	$has_custom_logo = has_custom_logo();
	?>
	<div class="site-logo-container <?php echo $has_custom_logo ? 'has-custom-logo' : ''; ?>">

	<?php if ( $has_custom_logo ) : ?>
		<?php the_custom_logo(); ?>
	<?php else: ?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php
		
		if ( get_theme_mod('show_site_tagline' ) ) {
			$sandbox_description = get_bloginfo( 'description', 'raw' );
			if ( $sandbox_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $sandbox_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; 
		}

	endif;?>
	</div>
	<?php
}
function blkcanvas_site_navigation()
{
    $args = array(
        'theme_location' => 'main-menu',
        'menu_id'        => 'main-menu',
        'container' => 'nav',
        'container_class' => 'site-navigation',
        'fallback_cb' => false
    );
    
    if ( has_nav_menu( 'main-menu' ) ) {
        wp_nav_menu( $args );
    } else {
        // Get the most used categories
        $most_used_categories = get_terms(array(
            'taxonomy' => 'category',
            'orderby' => 'count',
            'order' => 'DESC',
            'number' => 5
        ));

        // Create an array to hold the menu items
        $menu_items = array();

        // Loop through the categories and add them as menu items
        foreach ($most_used_categories as $category) {
            $menu_items[] = array(
                'title' => $category->name,
                'url' => get_category_link($category->term_id),
                'menu_item_parent' => 0,
                'ID' => 'category-'.$category->term_id
            );
        }
        $default_args = $args;
        $args = array(
            'theme_location' => 'main-menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'items' => $menu_items
        );
        $args = wp_parse_args( $args, $default_args );
        
        // Output the navigation menu
        wp_nav_menu( $args );
    }
}
function blkcanvas_footer_menu()
{
	wp_nav_menu(
		array(
			'theme_location' => 'footer-menu',
			'menu_id'        => 'footer-menu',
			'container' => 'nav',
			'container_class' => 'navigation'
		)
	);
}

function blkcanvas_footer_submenu()
{
	wp_nav_menu(
		array(
			'theme_location' => 'footer-submenu',
			'menu_id'        => 'footer-submenu',
			'container' => 'nav',
			'container_class' => 'navigation'
		)
	);
}

/**
 * Google Fonts Async Snippet
 * @see https://csswizardry.com/2020/05/the-fastest-google-fonts/
 */
function blkcanvas_load_fonts( $fonts = '' )
{
	// - 1. Preemptively warm up the fonts’ origin.
	// -
	// - 2. Initiate a high-priority, asynchronous fetch for the CSS file. Works in
	// -    most modern browsers.
	// -
	// - 3. Initiate a low-priority, asynchronous fetch that gets applied to the page
	// -    only after it’s arrived. Works in all browsers with JavaScript enabled.
	// -
	// - 4. In the unlikely event that a visitor has intentionally disabled
	// -    JavaScript, fall back to the original method. The good news is that,
	// -    although this is a render-blocking request, it can still make use of the
	// -    preconnect which makes it marginally faster than the default.

	$link = 'https://fonts.googleapis.com/css2' . $fonts;
	?>
	<!-- [1] -->
	<link rel="preconnect"
		href="https://fonts.gstatic.com"
		crossorigin />

	<!-- [2] -->
	<link rel="preload"
		as="style"
		href="<?php echo $link; ?>" />

	<!-- [3] -->
	<link rel="stylesheet"
		href="<?php echo $link; ?>"
		media="print" onload="this.media='all'" />

	<!-- [4] -->
	<noscript>
	<link rel="stylesheet"
			href="<?php echo $link; ?>" />
	</noscript>
	<?php
}
  
function blkcanvas_embed_defaults() {


	$width = blkcanvas_get_content_width() - (300 + 16 );
	$height = ( $width / 4 ) * 3;
    return array(
        'width'  => $width, 
        'height' => $height
    );
}
add_filter( 'embed_defaults', 'blkcanvas_embed_defaults' );

function blkcanvas_get_content_width()
{
	$theme_settings = blkcanvas_get_theme_settings();
	$site_width = get_theme_mod('container_width', $theme_settings['settings']['container_width']['default']);
	return str_replace('px', '', $site_width);
}

function blkcanvas_get_header_class( $class = false )
{
	$classes = array();
	$classes[] = ( get_theme_mod('header_is_sticky', '') ) ? 'sticky' : '';
	$classes[] = ( get_theme_mod('header_boxshadow', '') ) ? 'boxshadow' : '';
    $classes[] = get_theme_mod('header_layout', '');
    
	if ( $class ) {
		$classes[] = $class;
	}
	
	return implode( ' ', $classes );
}
function blkcanvas_register_block_styles()
{
	register_block_style(
		'core/gallery',
		array(
			'name'         => 'no-margin',
			'label'        => __( 'No margin', 'blkcanvas' ),
			'inline_style' => '.wp-block-gallery.is-style-no-margin .wp-block-image {margin-bottom:0!important;} .wp-block-gallery.is-style-no-margin .wp-block-image { margin-right: 0 !important; }',
		)
	);

	register_block_style(
		'core/columns',
		array(
			'name'         => 'no-margin',
			'label'        => __( 'No margin', 'blkcanvas' ),
			'inline_style' => '.wp-block-columns.is-style-no-margin{margin-bottom:0!important} .wp-block-columns.is-style-no-margin .wp-block-column:not(:first-child) { margin-left: 0 !important; }',
		)
	);

	register_block_style(
		'core/cover',
		array(
			'name'         => 'shadow',
			'label'        => __( 'Shadow', 'blkcanvas' ),
			'inline_style' => '.wp-block-cover.is-style-shadow{box-shadow:0 0 20px 5px rgba(0,0,0,0.3)}',
		)
	);

	register_block_style(
		'core/image',
		array(
			'name'         => 'shadow',
			'label'        => __( 'Shadow', 'blkcanvas' ),
			'inline_style' => '.wp-block-image.is-style-shadow{box-shadow:0 5px 20px -5px rgba(0,0,0,0.3)}',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'seperator-top',
			'label'        => __( 'With seperator', 'blkcanvas' ),
			'inline_style' => '.is-style-seperator-top{position:relative;} .is-style-seperator-top::before{content: \'\';position: relative;height: 2px;width: 100px;background-color: #000;margin-bottom: 15px;display: block;}',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'no-margin-bottom',
			'label'        => __( 'No Margin - Bottom', 'blkcanvas' ),
			'inline_style' => '.is-style-no-margin-bottom{margin-bottom:0;}',
		)
	);
}

add_action('init', 'blkcanvas_register_block_styles');