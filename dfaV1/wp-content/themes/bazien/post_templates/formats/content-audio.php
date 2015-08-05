<?php
$post_permalink = get_permalink();
$post_comments = get_comments_number();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="nova_entry">
        <div class="entry_image">
            <figure class="media-wrapper player">
                <?php
                $audio = get_post_meta( get_the_ID(), '_format_audio_embed', true );
                echo str_replace( 'width="132"', 'width="100%"', wp_oembed_get( $audio, array( 'width' => '132' ) ) );
                ?>
            </figure>
            <div class="entry_format"><span class="entry_format_icon"><i class="fa fa-file-audio-o"></i></span></div>
        </div>
        <div class="entry_title">
            <h2><a href="<?php echo the_permalink() ; ?>"><?php the_title(); ?></a></h2>
        </div>
        <div class="entry_meta_archive"><?php bazien_entry_archives(); ?></div>
        <div class="entry_content">
            <?php if (get_option('rss_use_excerpt') == 0) : ?>
                <?php echo the_content(''); ?>
                <div class="entry_readmore">
                    <a href="<?php the_permalink(); ?>" class="more-link">
                        <?php  echo __('Read More', 'bazien'); ?>
                    </a>
                </div>
            <?php elseif (get_option('rss_use_excerpt') == 1) : ?>
                <?php echo the_excerpt(); ?>
                <div class="entry_readmore">
                    <a href="<?php the_permalink(); ?>" class="more-link">
                        <?php  echo __('Read More', 'bazien'); ?>
                    </a>
                </div>
            <?php else : ?>
                <?php echo the_content(__('Read More', 'bazien')); ?>
            <?php endif ?>
        </div>
    </div>
</div>