<?php	
$prefix			= 'nova_';
$text_domain	= "bazien";

global $meta_boxes_lookbook;

$meta_boxes_lookbook		= array();


/* Look Book Meta Box
================================================== */ 
$meta_boxes_lookbook[] = array(
	'id' 				=> 'lookbook_meta_box',
	'title'				=> __('Look Book Infomations', $text_domain),
	'pages'				=> array( 'look_book' ),
	'fields'			=> array(
		array(
			'name'		=> __('Look Book Subtitle', $text_domain),
			'id'		=> $prefix . 'look_book_subtitle',
			'type'		=> 'text',
			'std'		=> '',
		),
		array(
			'name'		=> __('Look Book Summary', $text_domain),
			'id'		=> $prefix . 'look_book_summary',
			'type'		=> 'textarea',
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
function nova_lookbook_register_meta_boxes()
{
	global $meta_boxes_lookbook;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes_lookbook as $meta_box_lookbook )
		{
			new RW_Meta_Box( $meta_box_lookbook );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'nova_lookbook_register_meta_boxes' );
?>