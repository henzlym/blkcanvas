<?php

if (!function_exists('_theme_register_post_types')) {

	// Register Custom Post Type
	function _theme_register_post_types()
	{

		$labels = array(
			'name'                  => _x('Projects', 'Post Type General Name', '_theme'),
			'singular_name'         => _x('Project', 'Post Type Singular Name', '_theme'),
			'menu_name'             => __('Projects', '_theme'),
			'name_admin_bar'        => __('Project', '_theme'),
			'archives'              => __('Project Archives', '_theme'),
			'attributes'            => __('Project Attributes', '_theme'),
			'parent_item_colon'     => __('Parent Project:', '_theme'),
			'all_items'             => __('All Projects', '_theme'),
			'add_new_item'          => __('Add New Project', '_theme'),
			'add_new'               => __('Add New', '_theme'),
			'new_item'              => __('New Project', '_theme'),
			'edit_item'             => __('Edit Project', '_theme'),
			'update_item'           => __('Update Project', '_theme'),
			'view_item'             => __('View Project', '_theme'),
			'view_items'            => __('View Projects', '_theme'),
			'search_items'          => __('Search Project', '_theme'),
			'not_found'             => __('Project Not found', '_theme'),
			'not_found_in_trash'    => __('Not found in Trash', '_theme'),
			'featured_image'        => __('Featured Image', '_theme'),
			'set_featured_image'    => __('Set featured image', '_theme'),
			'remove_featured_image' => __('Remove featured image', '_theme'),
			'use_featured_image'    => __('Use as featured image', '_theme'),
			'insert_into_item'      => __('Insert into Project', '_theme'),
			'uploaded_to_this_item' => __('Uploaded to this Project', '_theme'),
			'items_list'            => __('Projects list', '_theme'),
			'items_list_navigation' => __('Projects list navigation', '_theme'),
			'filter_items_list'     => __('Filter Projects list', '_theme'),
		);
		$args = array(
			'label'                 => __('Project', '_theme'),
			'description'           => __('Project Description', '_theme'),
			'labels'                => $labels,
			'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
			'taxonomies'            => array('category', 'post_tag'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-portfolio',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
		);
		register_post_type('project', $args);
	}
	add_action('init', '_theme_register_post_types', 0);
}
