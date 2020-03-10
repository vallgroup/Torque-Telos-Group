<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Full Frame
 * @since Full Frame 1.0
 */

get_header(); ?>

<section id="primary" class="content-area">

	<?php if ( have_posts() ) : ?>

		<header class="page-header" <?php full_frame_header_image( '' ); ?>>
			<h1 class="page-title">Search Results for <span>&ldquo;<?php echo get_search_query(); ?>&rdquo;</span></h1>
		</header><!-- .page-header -->

		<div class="entry-wrap">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-inner">
                        <header class="entry-header">
                            <h1 class="entry-title">
                            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'full_frame' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                            <?php the_title(); ?>
                            </a></h1>
                        </header>
                
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                            
                            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'full_frame' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">Read More &raquo;</a>
                                        
                        </div><!-- .entry-content -->
                    </div><!-- .entry-inner -->
                </article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; ?>

		</div>

		<?php full_frame_content_nav( 'nav-below' ); ?>

	<?php else : ?>

           <div class="entry-wrap">     
        <article id="post-0" class="post no-results not-found">
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'Nothing Found', 'full_frame' ); ?></h1>
            </header><!-- .entry-header -->
        
            <div class="entry-content">
        
                    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'full_frame' ); ?></p>
                    <?php get_search_form(); ?>
                
            </div><!-- .entry-content -->
        </article><!-- #post-0 .post .no-results .not-found -->
</div>

	<?php endif; ?>

</section><!-- #primary .content-area -->

<?php get_footer(); ?>