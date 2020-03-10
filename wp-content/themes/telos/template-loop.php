<?php
/**
 * @package Full Frame
 * @since Full Frame 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php full_frame_featured_background( get_the_ID() ); ?> <?php post_class(); ?>>
    <div class="entry-inner">
        <header class="entry-header">
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'full_frame' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
			
			<?php if ( get_post_meta(get_the_ID(), 'action_header') )  {				
					$action_header_output = get_post_meta(get_the_ID(), 'action_header');
					echo $action_header_output[0];
				} else { the_title(); } ?>
            
            </a></h1>
        </header>

        <div class="entry-content">
            <?php the_excerpt(); ?>

			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'full_frame' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" class="button">

			<?php if ( get_post_meta(get_the_ID(), 'action_call') )  { ?>
					<?php $action_header_output = get_post_meta(get_the_ID(), 'action_call');
					echo $action_header_output[0];
				} else { the_title(); echo ' &raquo;'; } ?>
            </a>
                        
        </div><!-- .entry-content -->
    </div><!-- .entry-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
