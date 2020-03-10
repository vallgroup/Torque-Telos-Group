<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Full Frame
 * @since Full Frame 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">

	<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   
    <?php if ( get_field( 'background_image' ) ) { $header_image = get_field( 'background_image' ); } ?>
    <header class="entry-header" <?php echo 'style="background-image: url(' . $header_image . ');' . '"'; ?>> 
    
		<div class="entry-meta">Repositioning of</div>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-inner">
		<div class="entry-content">
        	<?php if( get_field( 'image_exclude' ) ) { $exclude_images = ' exclude="'. get_field( 'image_exclude' ); }
			$gallery_output = do_shortcode('[gallery link="file" exclude="'. get_field( 'image_exclude' ).'"]'); 
				if(function_exists("jqlb_apply_lightbox")){
					echo jqlb_apply_lightbox($gallery_output);
				}
			?>
        
            <div class="third">
            <h3>Before</h3>
            <?php if ( get_field( 'before' ) ) { the_field('before'); } ?>
            </div>
            
            <div class="third">
            <h3>Action</h3>
            <?php if ( get_field( 'action' ) ) { the_field('action'); } ?>
            </div>
            
            <div class="third">
            <h3>Results</h3>
            <?php if ( get_field( 'results' ) ) { the_field('results'); } ?>
            </div>
        
        </div><!-- .entry-content -->

		<br style="clear: both;" />

	</div><!-- .entry-inner -->
</article><!-- #post-<?php the_ID(); ?> -->

		<?php full_frame_content_nav( 'nav-below' ); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- #primary -->

<?php get_footer(); ?>