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

	<h1 class="entry-title">Case Studies</h1>
    
    <div class="entry-inner">

	<?php if ( have_posts() ) : ?>

		<?php echo '<div class="gallery grid">';
			
			while ( have_posts() ) : the_post(); ?>
				
                <article id="post-<?php the_ID(); ?>" <?php post_class('gallery-item'); ?>>
                    <a href="<?php echo the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                    <div class="excerpt">
                    	<div>
                        <span class="title"><?php the_title(); ?></span>
                        <?php the_excerpt(); ?>
                        <a href="<?php echo the_permalink(); ?>">See how we did it &raquo;</a>
                        </div>
                    </div>
                </article>       
                         
			<?php endwhile; ?>
			
			</div>

	<?php else : ?>

		<?php get_template_part( 'template', 'empty' ); ?>

	<?php endif; ?>
    
    </div>

</div><!-- #primary .content-area -->

<?php get_footer(); ?>