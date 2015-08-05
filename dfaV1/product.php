<?php
/**
 * WordPress Cron Implementation for hosts, which do not offer CRON or for which
 * the user has not set up a CRON job pointing to this file.
 *
 * The HTTP request to this file will not slow down the visitor who happens to
 * visit when the cron job is needed to run.
 *
 * @package WordPress
 */

ignore_user_abort(true);

if ( !empty($_POST) || defined('DOING_AJAX') || defined('DOING_CRON') )
	die();


define('DOING_CRON', true);

if ( !defined('ABSPATH') ) {
	/** Set up WordPress environment */
	require_once( dirname( __FILE__ ) . '/wp-load.php' );
}


echo $post_id =$_GET['post_id'];

$_pf = new WC_Product_Factory();  
    $_product = $_pf->get_product($post_id);
	$product_data = get_post_meta($_GET['post_id']);
	echo '<pre>';
	//print_r($product_data);
$apiproduct[post_title] = $_product->post_title;
$apiproduct[product_type] = $_product->product_type;
foreach($product_data as $key=>$val){

$pro_data[$key]=$val[0][$key];
}

print_r($pro_data);
//echo json_encode($product_data);
?>