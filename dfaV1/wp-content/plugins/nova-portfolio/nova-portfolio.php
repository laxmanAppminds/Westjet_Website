<?php
/**
 * Plugin Name: Nova Portfolio
 * Plugin URI: http://www.theme4.net
 * Description: Create Portfolio content typle
 * Version: 1.0.0
 * Author: Theme4
 * Author URI: http://www.theme4.net
 */
 define("NPF_PLUGIN_DIR", plugin_dir_path(__FILE__)); 
 include(NPF_PLUGIN_DIR.'meta-boxes.php');
// create Portfolio
add_action( 'init', 'create_portfolio_item' );
function create_portfolio_item() {
	
	$labels = array(
		'name' 					=> __('Portfolio', 'bazien'),
		'singular_name' 		=> __('Portfolio Item', 'bazien'),
		'add_new' 				=> __('Add New', 'bazien'),
		'add_new_item' 			=> __('Add New Portfolio item', 'bazien'),
		'edit_item' 			=> __('Edit Portfolio item', 'bazien'),
		'new_item' 				=> __('New Portfolio item', 'bazien'),
		'all_items' 			=> __('All Portfolio items', 'bazien'),
		'view_item' 			=> __('View Portfolio item', 'bazien'),
		'search_items' 			=> __('Search Portfolio item', 'bazien'),
		'not_found' 			=> __('No Portfolio item found', 'bazien'),
		'not_found_in_trash' 	=> __('No Portfolio item found in Trash', 'bazien'), 
		'parent_item_colon' 	=> '',
		'menu_name' 			=> __('Portfolio', 'bazien'),
	);

	$args = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'exclude_from_search' 	=> true,
		'show_ui' 				=> true, 
		'show_in_menu' 			=> true, 
		'show_in_nav_menus' 	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> true,
		'capability_type' 		=> 'post',
		'has_archive' 			=> true, 
		'hierarchical' 			=> true,
		'menu_position' 		=> 4,
		'supports' 				=> array('title', 'editor', 'thumbnail'),
		'rewrite' 				=> array('slug' => 'portfolio-item'),
		'with_front' 			=> false
	);
	
	register_post_type('portfolio',$args);
	
}


// create Portfolio Taxonomy
	
add_action( 'init', 'create_portfolio_categories' );
function create_portfolio_categories() {
$labels = array(
	'name'                       => __('Portfolio Categories', 'bazien'),
	'singular_name'              => __('Portfolio Category', 'bazien'),
	'search_items'               => __('Search Portfolio Categories', 'bazien'),
	'popular_items'              => __('Popular Portfolio Categories', 'bazien'),
	'all_items'                  => __('All Portfolio Categories', 'bazien'),
	'edit_item'                  => __('Edit Portfolio Category', 'bazien'),
	'update_item'                => __('Update Portfolio Category', 'bazien'),
	'add_new_item'               => __('Add New Portfolio Category', 'bazien'),
	'new_item_name'              => __('New Portfolio Category Name', 'bazien'),
	'separate_items_with_commas' => __('Separate Portfolio Categories with commas', 'bazien'),
	'add_or_remove_items'        => __('Add or remove Portfolio Categories', 'bazien'),
	'choose_from_most_used'      => __('Choose from the most used Portfolio Categories', 'bazien'),
	'not_found'                  => __('No Portfolio Category found.', 'bazien'),
	'menu_name'                  => __('Portfolio Categories', 'bazien'),
);

$args = array(
	'hierarchical'          => true,
	'labels'                => $labels,
	'show_ui'               => true,
	'show_admin_column'     => true,
	'query_var'             => true,
	'rewrite'               => array( 'slug' => 'portfolio-category' ),
);

register_taxonomy("portfolio_categories", "portfolio", $args);
}

