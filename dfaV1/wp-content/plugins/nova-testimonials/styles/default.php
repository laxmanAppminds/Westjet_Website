    	<div class="nova-testimonial-list-wrapper">
                <ul class="nova_testimonial_list">
					
					<?php
                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'testimonial',
                        'posts_per_page' => $posts
                    );
                    
                    $testimonial_posts = new WP_Query( $args );
                    
                    if ( $testimonial_posts->have_posts() ) : ?>
                        <?php while ( $testimonial_posts->have_posts() ) : $testimonial_posts->the_post(); ?>      
		                     <?php 
							$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'testimonial_style1' );	                     
		                    $author_name = get_post_meta(get_the_ID(), 'nova_testimonials_author_name', true);
		                    $author_url = get_post_meta(get_the_ID(), 'nova_testimonials_author_url', true);
		                    $author_position = get_post_meta(get_the_ID(), 'nova_testimonials_author_position', true);
							$content_ds=get_the_content();
							$content_list = strip_tags($content_ds);	                    
		                    ?>   
		                                                         
                            <li class="testimonial_list_item">
	                            <div class="testimonial_list_item_inner">
									<?php if($feature_image[0]) :?>
									<div class="testimonial_thumbnail clearfix">
											<img src="<?php echo esc_url( $feature_image[0] )?>" />
									</div>
									<?php endif ?>
	                                <div class="testimonial_text">
		                            	<?php echo $content_list; ?>
	                            	</div> 
                                 	<div class="testimonial_author">
	                                 	<?php echo esc_attr( $author_name );?>
	                            	</div>
	                            	<div class="title_position">
	                            		<span>
	                            			<?php echo esc_attr( $author_position );?>
	                            		</span>
	                            	</div>	                               
	                            </div>  
                            </li>
                        <?php endwhile; // end of the loop. ?>
                        
                    <?php

                    endif;
					wp_reset_postdata();
                    
                    ?>
                </ul>
    </div> 
 
 <script>
	jQuery(document).ready(function($) {
	 jQuery(".nova-testimonial-list-wrapper .nova_testimonial_list").owlCarousel({
	      items : 1, //10 items above 1000px browser width
	      itemsDesktop : [1000,1], //5 items between 1000px and 901pxs
	      itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
	      itemsTablet: [600,1], //2 items between 600 and 0;
	      itemsMobile : [320,1],
	      navigation : false,
	      navigationText : false,
	      pagination : true,
	      slideSpeed : 300
	  });   
	});

</script>