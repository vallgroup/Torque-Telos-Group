<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Full Frame
 * @since Full Frame 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">

	<?php while ( have_posts() ) : the_post(); ?>
    
    <h1 class="entry-title"><?php the_title(); ?></h1>
	
    <div class="entry-inner">
		
        <div class="entry-content">
    
    	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full'); } ?>
            
            <div class="details">
            
            <img src="http://www.telosgroupllc.com/wp-content/uploads/2013/06/telos_logo_black.png" />
            
            <?php the_content(); ?>
            
            </div>

        </article>
        
        </div>
        
    </div>

	<?php endwhile; // end of the loop. ?>

</div><!-- #primary -->

<?php get_footer(); ?>