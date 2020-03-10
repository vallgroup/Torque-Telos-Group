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
		
        <div class="privacy-content">
    
    	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('full'); } ?>
                    
            <div class="entry-content">
            
            <h4><?php the_content(); ?></h4>
            
            
            <?php if(get_field('policy_rules')): ?>
<ol><?php while(has_sub_field('policy_rules')): ?>
<li><h5><?php the_sub_field('policy_header'); ?></h5>
<p><?php the_sub_field('policy_copy'); ?></p></li>
<?php endwhile; ?></ol>
<?php endif; ?>

<p><h5>Questions?</h5><?php the_field('questions'); ?></p>
            
            </div>

        </article>
        
        </div>    
        
    </div>

	<?php endwhile; // end of the loop. ?>

</div><!-- #primary -->

<?php get_footer(); ?>
