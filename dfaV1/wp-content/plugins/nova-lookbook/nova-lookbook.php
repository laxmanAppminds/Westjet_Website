<?php
/**
 * Plugin Name: Nova Look Book
 * Plugin URI: http://www.theme4.net
 * Description: Create Look Book content typle
 * Version: 1.0.0
 * Author: Theme4
 * Author URI: http://www.theme4.net
 */
 define("NLB_PLUGIN_DIR", plugin_dir_path(__FILE__)); 
 include(NLB_PLUGIN_DIR.'meta-boxes.php');
 include(NLB_PLUGIN_DIR.'vc.php');
/*--------------------------------------------------------------------------------------------------
										Create Testimonial 
--------------------------------------------------------------------------------------------------*/

add_action( 'init', 'create_lookbook_item' );
function create_lookbook_item() {
	
	$labels = array(
		'name' => _x('Look Book', 'post type general name', 'wpelite'),
		'singular_name' => _x('Look Book Item', 'post type singular name', 'wpelite'),
		'add_new' => _x('Add New', 'Look Book Item', 'wpelite'),
		'add_new_item' => __('Add New Look Book item', 'wpelite'),
		'edit_item' => __('Edit Look Book item', 'wpelite'),
		'new_item' => __('New Look Book item', 'wpelite'),
		'all_items' => __('All Look Book items', 'wpelite'),	
		'view_item' => __('View Look Book item', 'wpelite'),
		'search_items' => __('Search Look Book item', 'wpelite'),
		'not_found' =>  __('No Look Book item found', 'wpelite'),
		'not_found_in_trash' => __('No Look Book item found in Trash', 'wpelite'), 
		'parent_item_colon' => '',
		'menu_name' => 'Look Book'
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
		'with_front' => FALSE
	);
	
	register_post_type('look_book',$args);
	
}
/*--------------------------------------------------------------------------------------------------
									 Testimonial Shortcodes
--------------------------------------------------------------------------------------------------*/
function nova_lookbook_list_shortcode($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"posts" => '4',
		"columns" => '4',
		"style" => 'default',
		"text_color" => '',
		"background_color_1"	=> '',
		"background_color_2"	=> '',
		"animation" => '',
		"animation_delay" => ''
	), $atts));
	
	ob_start();
	include_once('styles/'.$style.'.php');
	?> 
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("nova_lookbook_list", "nova_lookbook_list_shortcode");
