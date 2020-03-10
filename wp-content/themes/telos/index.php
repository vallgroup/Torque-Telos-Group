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

	<?php if ( have_posts() ) : ?>

		<?php echo '<div class="gallery grid">';
			
			while ( have_posts() ) : the_post(); ?>
				
                <?php get_template_part( 'template', 'grid' ); ?>
                
			<?php endwhile; ?>
			
			</div>

	<?php else : ?>

		<?php get_template_part( 'template', 'empty' ); ?>

	<?php endif; ?>

</div><!-- #primary .content-area -->

<?php get_footer(); ?>