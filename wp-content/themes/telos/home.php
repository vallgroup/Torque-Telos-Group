<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Full Frame
 * @since Full Frame 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
<!--
<div class="hidingDiv">
	<div class="inner-div">
		<img class="movedImage" src="<?php bloginfo('stylesheet_directory'); ?>/images/moving_box.png" /><h4 class="moved">WE'VE MOVED</h4><b class="boldMove">Our new address is:</b><p class="moveText">One Prudential Plaza | 130 East Randolph, Suite 1100 | Chicago, IL 60601</p>
	</div>
</div> 
-->
	<?php if ( have_posts() ) : ?>
    
    	<?php /*
		        $args = array(
					'posts_per_page' => 5,
					'post__in'  =>  get_option( 'sticky_posts' ),
					'ignore_sticky_posts' => 0
					);
				
				query_posts( $args ); ?>
        
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template', 'loop' ); ?>

		<?php endwhile; */ ?>
        
        <?php echo do_shortcode('[lbg_kenburnsslider settings_id="1"]'); ?>
        
        <div class="home_gallery_title"><h4>Current Assignments</h4></div>
        
        <?php 
			
			echo '<div class="gallery grid">';
			
			query_posts( 'posts_per_page=9' );

			while ( have_posts() ) : the_post(); ?>
				
                <?php get_template_part( 'template', 'grid' ); ?>
                
			<?php endwhile; ?>
			
			<?php wp_reset_query();
			
			echo '</div>'; ?>

	<?php else : ?>

		<?php get_template_part( 'template', 'empty' ); ?>

	<?php endif; ?>

</div><!-- #primary .content-area -->

<?php get_footer(); ?>