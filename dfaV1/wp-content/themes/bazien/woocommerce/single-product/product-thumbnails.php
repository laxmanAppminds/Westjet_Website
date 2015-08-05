<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();
	
if ( $attachment_ids ) {
	
?> 

	<?php if ( has_post_thumbnail() ) { ?>
    
    <div class="product_thumbnails">
        
        <div class="product_thumbnails_swiper_container">
    		
            <div class="swiper-wrapper">

				<?php
    
                //Featured
                
                $image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
                $image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
                $image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), array(
                    'title' => $image_title
                    ) );
                
				$attachment_count   = count( $product->get_gallery_attachment_ids() );
    
                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="swiper-slide">%s</div>', $image ), $post->ID );
    
                //Thumbs
            
                $attachment_ids = $product->get_gallery_attachment_ids();
            
                if ( $attachment_ids ) {
                
                    foreach ( $attachment_ids as $attachment_id ) {
            
                        $image_link = wp_get_attachment_url( $attachment_id );
            
                        if ( ! $image_link )
                            continue;
            
                        $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
                        $image_title = esc_attr( get_the_title( $attachment_id ) );
            
                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="swiper-slide">%s</div>', $image ), $attachment_id, $post->ID );
                    }
            
                ?>
                
            </div><!-- /.swiper-wrapper -->
            
            <div class="pagination"></div>
            
        </div><!-- /.product_thumbnails_swiper_container -->
        
    </div><!-- /.product_images -->
    
	<?php
	} //has_post_thumbnail

	} else {	
		echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );	
	}
	
} //attachment_ids