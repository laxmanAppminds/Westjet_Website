<?php
/**
 * Plugin Name: Nova Block
 * Plugin URI: http://www.theme4.net
 * Description: Create Block content typle
 * Version: 1.0.0
 * Author: Theme4
 * Author URI: http://www.theme4.net
 */
 
// create Block
add_action( 'init', 'create_block_item' );
function create_block_item() {
	
	$labels = array(
		'name' 					=> __('Block', 'bazien'),
		'singular_name' 		=> __('Block Item', 'bazien'),
		'add_new' 				=> __('Add New', 'bazien'),
		'add_new_item' 			=> __('Add New Block item', 'bazien'),
		'edit_item' 			=> __('Edit Block item', 'bazien'),
		'new_item' 				=> __('New Block item', 'bazien'),
		'all_items' 			=> __('All Block items', 'bazien'),
		'view_item' 			=> __('View Block item', 'bazien'),
		'search_items' 			=> __('Search Block item', 'bazien'),
		'not_found' 			=> __('No Block item found', 'bazien'),
		'not_found_in_trash' 	=> __('No Block item found in Trash', 'bazien'), 
		'parent_item_colon' 	=> '',
		'menu_name' 			=> __('Block', 'bazien'),
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
		'rewrite' 				=> array('slug' => 'block-item'),
		'with_front' 			=> false
	);
	
	register_post_type('block',$args);
	
}
add_shortcode('bazien_block', 'bazien_shortcode_block');
function bazien_shortcode_block($atts, $content = null) {
    ob_start();
        include('templates/block.php');
    return ob_get_clean();
}
function bazien_shortcode_extract_class( $el_class ) {
    $output = '';
    if ( $el_class != '' ) {
        $output = " " . str_replace( ".", "", $el_class );
    }

    return $output;
}
function bazien_shortcode_end_block_comment( $string ) {
    return WP_DEBUG ? '<!-- END ' . $string . ' -->' : '';
}