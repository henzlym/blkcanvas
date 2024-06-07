<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _theme_widgets_init()
{
	$side_bars = array(
		array(
			'name'          => esc_html__('Sidebar', 'blkcanvas'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'blkcanvas'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
		array(
			'name'          => esc_html__('Footer', 'blkcanvas'),
			'id'            => 'footer',
			'description'   => esc_html__('Add widgets here.', 'blkcanvas'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
		array(
			'name'          => esc_html__('Footer Left', 'blkcanvas'),
			'id'            => 'footer-1',
			'description'   => esc_html__('Add widgets here.', 'blkcanvas'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
		array(
			'name'          => esc_html__('Footer Middle', 'blkcanvas'),
			'id'            => 'footer-2',
			'description'   => esc_html__('Add widgets here.', 'blkcanvas'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
		array(
			'name'          => esc_html__('Footer Right', 'blkcanvas'),
			'id'            => 'footer-3',
			'description'   => esc_html__('Add widgets here.', 'blkcanvas'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	foreach ($side_bars as $key => $side_bar) {
		register_sidebar($side_bar);
	}
}

add_action('widgets_init', '_theme_widgets_init');
