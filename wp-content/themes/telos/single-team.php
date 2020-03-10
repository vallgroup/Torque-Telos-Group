<?php

// Template for displaying individual team members

get_header(); ?>

<div id="primary" class="content-area">

	<h1 class="entry-title">Team</h1>

	<?php while ( have_posts() ) : 
		the_post(); 

		// bio image (ACF)
		$img_size = 'large';
		$bio_img_obj = get_field( 'bio_image', get_the_ID() )
			? get_field( 'bio_image', get_the_ID() )
			: null;
		// if no ACF image defined, use the Featured Image when available
		$bio_img = $bio_img_obj
				? wp_get_attachment_image( $bio_img_obj, $img_size )
				: get_the_post_thumbnail( null, $img_size );
	?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <h2 class="entry-title"><?php the_title(); ?></h2>
     
	<div class="entry-inner">
    
		<div class="entry-content">


<div class="entry-right">
                        
				<?php echo $bio_img; ?>
			            
            		</div><!-- .entry-right -->

			<div class="entry-left">
                    
        		    <h3 class="job-title"><?php the_field( 'title' ); ?></h3>
				<br/>
            
				<?php the_content(); ?>
            
            
        
               		 <div class="contact-box">
                
                 			<h3>Contact Info:</h3>
                    
                    			<ul class="contact">
                   			 <?php if( get_field( 'email' ) ): ?>
                   			 <a href="mailto:<?php the_field('email'); ?>"><?php the_field( 'email' ); ?></a><br/>
                   			 <?php endif; ?>
                                
                    			<?php if( get_field( 'phone' ) ): ?>
                    			D: <?php the_field( 'phone' ); ?><br/>
                    			<?php endif; ?>
                    
                    			<?php if( get_field( 'mobile' ) ): ?>
                    			M: <?php the_field( 'mobile' ); ?>
                    			<?php endif; ?>
                    			</ul>
                
              		  </div>

			</div><!-- .entry-left -->

           		 
            
        	</div><!-- .entry-content -->

		<br style="clear: both;" />

	</div><!-- .entry-inner -->
</article><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; // end of the loop. ?>
       
    <div class="gallery grid">
    <?php $my_query = new WP_Query('post_type=team&showposts=-1&orderby=menu_order'); ?>
	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <?php get_template_part('template','grid'); ?>
    <?php endwhile; ?>
    </div>
    

</div><!-- #primary -->

<?php get_footer(); ?>