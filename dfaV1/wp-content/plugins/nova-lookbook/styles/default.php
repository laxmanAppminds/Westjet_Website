    	<div class="nova-lookbook-list-wrapper">
                <ul class="nova_lookbook_list">
					
					<?php
                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'look_book',
                        'posts_per_page' => $posts
                    );
                    
                    $lookbook_posts = new WP_Query( $args );
                    
                    if ( $lookbook_posts->have_posts() ) : ?>
                        <?php while ( $lookbook_posts->have_posts() ) : $lookbook_posts->the_post(); ?>      
		                     <?php 
							$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );	                     
		                    $subtitle = get_post_meta(get_the_ID(), 'nova_look_book_subtitle', true);
		                    $summary = get_post_meta(get_the_ID(), 'nova_look_book_summary', true);
		                    ?>   
		                                                         
                            <li class="lookbook_list_item">
	                           <div class="lookbook_image_container">
		                        <?php if($feature_image[0]):?>
		                           <img src="<?php echo esc_url( $feature_image[0] )?>" />
		                        <?php else:?>
		                        	<span class="lookbook_no_image"></span>
		                        <?php endif?>
	                           </div>
                            <div class="lookbook_content_container">
	                            <div class="lookbook_content">
		                            <h4 class="lookbook_subtitle"><?php echo esc_attr( $subtitle );?></h4>
		                            <h3 class="lookbook_title"><?php the_title(); ?></h3>
		                            <div class="lookbook_summary"></span><?php echo $summary?></div>
		                            <div class="lookbook_readmore"><a href="<?php the_permalink(); ?>" class="nova-button stroke white"><?php echo __('Discover','bazien')?></a></div>
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
	 jQuery(".nova-lookbook-list-wrapper .nova_lookbook_list").owlCarousel({
	      items : 2, //10 items above 1000px browser width
	      itemsDesktop : [1000,2], //5 items between 1000px and 901pxs
	      itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
	      itemsTablet: [600,1], //2 items between 600 and 0;
	      itemsMobile : [320,1],
	      navigation : false,
	      navigationText : false,
	      pagination : true,
	      slideSpeed : 300
	  });   
	});

</script>