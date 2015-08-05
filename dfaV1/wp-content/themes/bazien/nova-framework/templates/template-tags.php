<?php

if ( ! is_admin() ) {

function grab_ids_from_gallery() {
			
	global $post;
	$attachment_ids = array();
	$pattern = get_shortcode_regex();
	$ids = array();
	
	if (have_posts()) :
	
	if (preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches ) ) {   //finds the "gallery" shortcode and puts the image ids in an associative array at $matches[3]
		//$count = count($matches[3]); //in case there is more than one gallery in the post.
		$count = 1;
		for ($i = 0; $i < $count; $i++){
			$atts = shortcode_parse_atts( $matches[3][$i] );
			if ( isset( $atts['ids'] ) ){
				$attachment_ids = explode( ',', $atts['ids'] );
				$ids = array_merge($ids, $attachment_ids);
			}
		}
	}
	
	return $ids;
	
	endif;
	
}
add_action( 'wp', 'grab_ids_from_gallery' );
}





if ( ! function_exists( 'bazien_content_nav' ) ) :
function bazien_content_nav( $nav_id ) {
	global $wp_query, $post, $bazien_theme_options;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">

        <div class="row">
        
		<?php if ( is_single() ) : // navigation links for single posts ?>
        
        <div class="large-12 columns ">
            <div class="row">
                
                <div class="small-6 columns">
                	<div class="nav-previous"><?php previous_post_link( '%link', '<div class="nav-previous-title">'.__( "Previous Reading", "bazien" ).'</div> <span> %title </span>' ); ?></div>
                </div><!-- .columns -->
                
                <div class="small-6 columns">
                	<div class="nav-next"><?php next_post_link( '%link', '<div class="nav-next-title">'.__( "Next Reading", "bazien" ).'</div> <span> %title </span>' ); ?></div>
                </div><!-- .columns -->
                
            </div><!-- .row -->
        </div><!-- .columns .-->
    	
		<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>                
				
			<div class="small-6 columns">
                <?php if ( get_next_posts_link() ) : ?>
                <div class="nav-previous"><span class="meta-nav"><i class="fa fa-chevron-left"></i></span><span><?php next_posts_link( __( 'Older posts', 'bazien' ) ); ?></span></div>
				<?php endif; ?>
			</div>	
				
			<div class="small-6 columns">
                <?php if ( get_previous_posts_link() ) : ?>
                <div class="nav-next"><span><?php previous_posts_link( __( 'Newer posts', 'bazien' ) ); ?></span><span class="meta-nav"><i class="fa fa-chevron-right"></i></span></div>
                <?php endif; ?>
			</div>

   		<?php endif; ?>
        
        </div><!-- .row -->

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // bazien_content_nav




if ( ! function_exists( 'bazien_product_nav' ) ) :
function bazien_product_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">      
                    
        <div class="product-nav-previous"><?php previous_post_link( '%link', '<i class="fa fa-angle-left"></i>' ); ?></div>
        <div class="product-nav-next"><?php next_post_link( '%link', '<i class="fa fa-angle-right"></i>' ); ?></div>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // bazien_product_nav




if ( ! function_exists( 'bazien_comment' ) ) :
function bazien_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'bazien' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'bazien' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<div class="comment-content">
				
				<div class="comment-author-avatar">
					<?php echo get_avatar( $comment, 140 ); ?>
				</div><!-- .comment-author-avatar -->
				
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bazien' ); ?></p>
				<?php endif; ?>
				<div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->
                <div class="comment-metadata">
                <?php printf( __( 'By %s', 'bazien' ), sprintf( '<div class="comment-author">%s</div>', get_comment_author_link() ) ); ?>
                <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                    <time datetime="<?php comment_time( 'c' ); ?>">
                        <?php printf( __( '%1$s at %2$s', 'bazien' ), get_comment_date(), get_comment_time() ); ?>
                    </time>
                </a>
                <?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<span class="comment-reply"><i class="fa fa-reply"></i>',
						'after'     => '</span>',
					) ) );
				?>
				
				<?php edit_comment_link( __( 'Edit', 'bazien' ), '<span class="comment-edit-link"><i class="fa fa-pencil"></i>', '</span>' ); ?>
                </div><!-- .comment-metadata -->
				<div class="comment-separator"></div>
				
			</div><!-- .comment-content -->
            
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for bazien_comment()




/**
 * Returns true if a blog has more than 1 category.
 */
function bazien_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so bazien_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bazien_categorized_blog should return false.
		return false;
	}
}




/**
 * Flush out the transients used in bazien_categorized_blog.
 */
function bazien_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'bazien_category_transient_flusher' );
add_action( 'save_post',     'bazien_category_transient_flusher' );
