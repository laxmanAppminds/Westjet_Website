<?php
if (class_exists('WPBakeryVisualComposerAbstract')) {
	vc_map( array(
			"name"						=> __( "Testimonials List", "bazien" ),
			"base"						=> "nova_testimonial_list",
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
				),
                array(
                    "type"			=> "dropdown",
                    "holder"		=> "div",
                    "class" 		=> "hide_in_vc_editor",
                    "admin_label" 	=> true,
                    "heading"		=> "Style",
                    "param_name"	=> "style",
                    "value"			=> array(
                        "Slider"	=> "default",
                        "Gird"	=> "grid"
                    ),
                    "std"			=> "default",
                ),
				
			)
		)
	);
} // End check VC plugin