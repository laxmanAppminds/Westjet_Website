<?php
if (class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map( array(
			"name"						=> __( "Look Book List", "bazien" ),
			"base"						=> "nova_lookbook_list",
			"icon"						=> "icon-wpb-text",
			"category"					=> 'Content',
			"allowed_container_element"	=> 'vc_row',
			"params"					=> array(
	
				array(
					"type"				=> "textfield",
					"holder"			=> "div",
					"class"				=> "",
					"heading"			=> __( "Posts", "bazien" ),
					"param_name"		=> "posts",
					"value"				=> "4",
					"description"		=> ""
				)
				
			)
		)
	);
} // End check VC plugin