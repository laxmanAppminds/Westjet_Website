<?php global $woocommerce; ?>

<header id="masthead" class="site-header" role="banner">
    <div class="row">		
        <div class="large-12 columns">
        
            <div class="site-header-wrapper">
                
                <div class="site-logo">
                        
                    <?php
					
                    if ( (isset($bazien_theme_options['site_logo']['url'])) && (trim($bazien_theme_options['site_logo']['url']) != "" ) ) {
						if (is_ssl()) {
                            $site_logo = str_replace("http://", "https://", $bazien_theme_options['site_logo']['url']);	
							if ($header_transparency_class == "transparent_header")	{
								if ( ($transparency_scheme == "header_transparent_light_present") && (isset($bazien_theme_options['light_transparent_header_logo']['url'])) && (trim($bazien_theme_options['light_transparent_header_logo']['url']) != "") ) {
									$site_logo = str_replace("http://", "https://", $bazien_theme_options['light_transparent_header_logo']['url']);	
								}
								if ( ($transparency_scheme == "header_transparent_dark_present") && (isset($bazien_theme_options['dark_transparent_header_logo']['url'])) && (trim($bazien_theme_options['dark_transparent_header_logo']['url']) != "") ) {
									$site_logo = str_replace("http://", "https://", $bazien_theme_options['dark_transparent_header_logo']['url']);	
								}
							}
                        } else {
                            $site_logo = $bazien_theme_options['site_logo']['url'];
							if ($header_transparency_class == "transparent_header")	{
								if ( ($transparency_scheme == "header_transparent_light_present") && (isset($bazien_theme_options['light_transparent_header_logo']['url'])) && (trim($bazien_theme_options['light_transparent_header_logo']['url']) != "") ) {
									$site_logo = $bazien_theme_options['light_transparent_header_logo']['url'];
								}
								if ( ($transparency_scheme == "header_transparent_dark_present") && (isset($bazien_theme_options['dark_transparent_header_logo']['url'])) && (trim($bazien_theme_options['dark_transparent_header_logo']['url']) != "") ) {
									$site_logo = $bazien_theme_options['dark_transparent_header_logo']['url'];
								}
							}
                        }
						
						if ( (isset($bazien_theme_options['sticky_header_logo']['url'])) && (trim($bazien_theme_options['sticky_header_logo']['url']) != "" ) ) {
							if (is_ssl()) {
								$sticky_header_logo = str_replace("http://", "https://", $bazien_theme_options['sticky_header_logo']['url']);		
							} else {
								$sticky_header_logo = $bazien_theme_options['sticky_header_logo']['url'];
							}
						}
						
						
                    ?>
    
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        	<img class="site-logo-image" src="<?php echo esc_url($site_logo); ?>" title="<?php bloginfo( 'description' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                            <?php if ( (isset($bazien_theme_options['sticky_header_logo']['url'])) && (trim($bazien_theme_options['sticky_header_logo']['url']) != "" ) ) { ?>
                            	<img class="sticky-logo" src="<?php echo esc_url($sticky_header_logo); ?>" title="<?php bloginfo( 'description' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                            <?php } ?>
                        </a>
                    
                    <?php } else { ?>
                    
                        <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                    
                    <?php } ?>
                    
                </div><!-- .site-logo --> 
           
                    
                <div class="header-actions">
                    <ul>
                        <li class="mobile-canvas-menu"><a class="left-off-canvas-toggle" href="#" ><span class="tools_button_icon"><i class="fa fa-bars"></i></span></a></li>
                        <?php if ( (isset($bazien_theme_options['main_header_search_bar'])) && ($bazien_theme_options['main_header_search_bar'] == "1") ) : ?>
                        <li class="search-button">
                            <a id="trigger-overlay" class="tools_button">
                                <span class="tools_button_icon">
                                    <i class="fa fa-search"></i>
                                </span>
                            </a>
                        </li>                    
                        <?php endif; ?>
                        <?php if ( (isset($bazien_theme_options['main_header_shopping_bag'])) && ($bazien_theme_options['main_header_shopping_bag'] == "1") ) : ?>
                            <?php if ( (isset($bazien_theme_options['catalog_mode'])) && ($bazien_theme_options['catalog_mode'] == 1) ) : ?>
                            <?php else:?>
                                <?php if (class_exists('WooCommerce')) : ?>
                                    <li class="shopping-bag-button">
                                        <a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="tools_button">
                                            <span class="tools_button_icon"><i class="fa fa-shopping-cart"></i></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                    <?php if ( (isset($bazien_theme_options['main_header_shopping_bag'])) && ($bazien_theme_options['main_header_shopping_bag'] == "1") ) : ?>
                        <?php echo bazien_minicart()?>
                    <?php endif; ?>
                </div>
                
                <nav class="show-for-large-up main-mega-navigation default-navigation" role="navigation">                    
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-navigation',
                            'container' => '',
                            'menu_class' => 'main-menu mega-menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'fallback_cb' => false,
                            'walker' => new bazien_top_navwalker
                        ));
                    ?>
                </nav><!-- .main-navigation -->                             
            </div><!--.site-header-wrapper-->
        
        </div><!-- .columns -->
    </div><!-- .row -->

</header><!-- #masthead -->



<script type="text/javascript">

	jQuery(document).ready(function($) {

    "use strict";
	
		$(window).scroll(function() {
			
			if ($(window).scrollTop() > 0) {
				
				<?php if ( (isset($bazien_theme_options['sticky_header'])) && (trim($bazien_theme_options['sticky_header']) == "1" ) ) { ?>
					$('#site-top-bar').addClass("hidden");
					$('.site-header').addClass("sticky");
					<?php if ( (isset($bazien_theme_options['sticky_header_logo']['url'])) && (trim($bazien_theme_options['sticky_header_logo']['url']) != "" ) ) { ?>
						$('.site-logo-image').attr('src', '<?php echo esc_url($sticky_header_logo); ?>');
					<?php } ?>
				<?php } ?>
				
			} else {
				
				<?php if ( (isset($bazien_theme_options['sticky_header'])) && (trim($bazien_theme_options['sticky_header']) == "1" ) ) { ?>
					$('#site-top-bar').removeClass("hidden");
					$('.site-header').removeClass("sticky");
					<?php if ( (isset($bazien_theme_options['sticky_header_logo']['url'])) && (trim($bazien_theme_options['sticky_header_logo']['url']) != "" ) ) { ?>
						$('.site-logo-image').attr('src', '<?php echo esc_url($site_logo); ?>');
					<?php } ?>
				<?php } ?>
				
			}	
			
		});
	
	});
	
</script>


