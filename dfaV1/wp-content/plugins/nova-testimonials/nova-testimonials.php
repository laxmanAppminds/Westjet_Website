<?php
/**
 * Plugin Name: Nova Testimonials
 * Plugin URI: http://www.wpelite.net
 * Description: Create Testimonial content typle
 * Version: 1.0.0
 * Author: WPElite
 * Author URI: http://www.wpelite.net
 */
 define("NT_PLUGIN_DIR", plugin_dir_path(__FILE__)); 
 include(NT_PLUGIN_DIR.'meta-boxes.php');
 include(NT_PLUGIN_DIR.'vc.php');
/*--------------------------------------------------------------------------------------------------
										Create Testimonial 
--------------------------------------------------------------------------------------------------*/

add_action( 'init', 'create_testimonial_item' );
function create_testimonial_item() {
	
	$labels = array(
		'name' => _x('Testimonial', 'post type general name', 'wpelite'),
		'singular_name' => _x('Testimonial Item', 'post type singular name', 'wpelite'),
		'add_new' => _x('Add New', 'Testimonial Item', 'wpelite'),
		'add_new_item' => __('Add New Testimonial item', 'wpelite'),
		'edit_item' => __('Edit Testimonial item', 'wpelite'),
		'new_item' => __('New Testimonial item', 'wpelite'),
		'all_items' => __('All Testimonial items', 'wpelite'),	
		'view_item' => __('View Testimonial item', 'wpelite'),
		'search_items' => __('Search Testimonial item', 'wpelite'),
		'not_found' =>  __('No Testimonial item found', 'wpelite'),
		'not_found_in_trash' => __('No Testimonial item found in Trash', 'wpelite'), 
		'parent_item_colon' => '',
		'menu_name' => 'Testimonial'
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 4,
		'supports' => array('title', 'editor', 'thumbnail'),
		//'rewrite' => array('slug' => 'portfolio'),
		'with_front' => FALSE
	);
	
	register_post_type('testimonial',$args);
	
}
/*--------------------------------------------------------------------------------------------------
									 Testimonial Shortcodes
--------------------------------------------------------------------------------------------------*/
function nova_testimonial_list_shortcode($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"posts" => '4',
		"style" => 'default'
	), $atts));
	
	ob_start();
	include_once('styles/'.$style.'.php');
	?> 
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("nova_testimonial_list", "nova_testimonial_list_shortcode");
