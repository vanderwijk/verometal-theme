<?php

// enqueue the child theme stylesheet
function verometal_enqueue_scripts() {
wp_register_style( 'verometal', get_stylesheet_directory_uri() . '/style.css'  );
	wp_enqueue_style( 'verometal' );
}
add_action( 'wp_enqueue_scripts', 'verometal_enqueue_scripts', 11);

// load child theme translations
function verometal_child_theme_locale() {
	load_child_theme_textdomain( 'verometal', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'verometal_child_theme_locale' );

// unregister portfolio_page custom post type to modify it
function verometal_unregister_post_type(){
	unregister_post_type( 'portfolio_page' );
}
add_action('init','verometal_unregister_post_type');

// modified portfolio_page custom post type
function create_coating_cpt() {

	$labels = array(
		'name' => _x( 'Coatings', 'Post Type General Name', 'verometal' ),
		'singular_name' => _x( 'Coating', 'Post Type Singular Name', 'verometal' ),
		'menu_name' => _x( 'Coatings', 'Admin Menu text', 'verometal' ),
		'name_admin_bar' => _x( 'Coating', 'Add New on Toolbar', 'verometal' ),
		'archives' => __( 'Coating Archives', 'verometal' ),
		'attributes' => __( 'Coating Attributes', 'verometal' ),
		'parent_item_colon' => __( 'Parent Coating:', 'verometal' ),
		'all_items' => __( 'All Coatings', 'verometal' ),
		'add_new_item' => __( 'Add New Coating', 'verometal' ),
		'add_new' => __( 'Add New', 'verometal' ),
		'new_item' => __( 'New Coating', 'verometal' ),
		'edit_item' => __( 'Edit Coating', 'verometal' ),
		'update_item' => __( 'Update Coating', 'verometal' ),
		'view_item' => __( 'View Coating', 'verometal' ),
		'view_items' => __( 'View Coatings', 'verometal' ),
		'search_items' => __( 'Search Coating', 'verometal' ),
		'not_found' => __( 'Not found', 'verometal' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'verometal' ),
		'featured_image' => __( 'Featured Image', 'verometal' ),
		'set_featured_image' => __( 'Set featured image', 'verometal' ),
		'remove_featured_image' => __( 'Remove featured image', 'verometal' ),
		'use_featured_image' => __( 'Use as featured image', 'verometal' ),
		'insert_into_item' => __( 'Insert into Coating', 'verometal' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Coating', 'verometal' ),
		'items_list' => __( 'Coatings list', 'verometal' ),
		'items_list_navigation' => __( 'Coatings list navigation', 'verometal' ),
		'filter_items_list' => __( 'Filter Coatings list', 'verometal' ),
	);
	$args = array(
		'label' => __( 'Coating', 'verometal' ),
		'description' => __( '', 'verometal' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-customizer',
		'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 4,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => array('slug' => _x('coating', 'Custom post type slug', 'verometal') ),
	);
	register_post_type( 'portfolio_page', $args );

}
add_action( 'init', 'create_coating_cpt', 10 );