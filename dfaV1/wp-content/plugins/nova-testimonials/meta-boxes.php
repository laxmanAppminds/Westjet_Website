<?php	
$prefix			= 'nova_';
$text_domain	= "bazien";

global $meta_boxes;

$meta_boxes		= array();


/* Testimonials Meta Box
================================================== */ 
$meta_boxes[] = array(
	'id' 				=> 'slider_meta_box',
	'title'				=> __('Author Infomations', $text_domain),
	'pages'				=> array( 'testimonial' ),
	'fields'			=> array(
		array(
			'name'		=> __('Author Position', $text_domain),
			'id'		=> $prefix . 'testimonials_author_position',
			'type'		=> 'text',
			'std'		=> '',
		),
		array(
			'name'		=> __('AuThor Name', $text_domain),
			'id'		=> $prefix . 'testimonials_author_name',
			'type'		=> 'text',
			'std'		=> '',
		)
	)	
);


	
/* Page Meta Box

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function nova_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'nova_register_meta_boxes' );
?>