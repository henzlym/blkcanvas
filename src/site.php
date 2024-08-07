<?php

use Timber\Site;

/**
 * Class StarterSite
 */
class StarterSite
{

	public $site_config = null;

	public function __construct()
	{
		$this->site_config = fw_get_site_config();

		add_action('after_setup_theme', array($this, 'theme_supports'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
		add_action('init', array($this, 'register_post_types'));
		add_action('init', array($this, 'register_taxonomies'));
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style('site-main', get_template_directory_uri() . '/frontend/src/public/css/site.css', array(), '1.0.0');
		wp_enqueue_script('blkcanvas-scripts', get_template_directory_uri() . '/frontend/src/public/js/scripts.js', [], '1.0.0', true);
	}

	/**
	 * This is where you can register custom post types.
	 */
	public function register_post_types()
	{
	}

	/**
	 * This is where you can register custom taxonomies.
	 */
	public function register_taxonomies()
	{
	}

	public function theme_get_image_sizes(): array
	{

		$sizes = array(
			array(
				'name' => 'thumbnail',
				'width' => 360,
				'height' => 0,
				'crop' => true
			),
			array(
				'name' => 'small',
				'width' => 540,
				'height' => 0,
				'crop' => true
			),
			array(
				'name' => 'medium',
				'width' => 720,
				'height' => 0,
				'crop' => true
			),
			array(
				'name' => 'medium_large',
				'width' => 960,
				'height' => 0,
				'crop' => true
			),
			array(
				'name' => 'large',
				'width' => 1024,
				'height' => 0,
				'crop' => true
			)
		);

		return apply_filters('theme_get_image_sizes', $sizes);
	}

	public function theme_supports()
	{
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		$image_sizes = $this->theme_get_image_sizes();

		if (is_array($image_sizes) && !empty($image_sizes)) {
			foreach ($image_sizes as $key => $images_size) {
				add_image_size(
					$images_size['name'],
					$images_size['width'],
					$images_size['height'],
					$images_size['crop']
				);
			}
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support('menus');

		if (count($this->site_config['menus']) > 0) {
			register_nav_menus(
				$this->site_config['menus']
			);
		}
	}
}

new StarterSite;
