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
   
    <?php if ( get_field( 'image' ) ) { $header_image = get_field( 'image' ); } ?>
    <header class="entry-header" <?php echo 'style="background-image: url(' . $header_image . ');' . '"'; ?>> 
    
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php the_field( 'city' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-inner">
		<div class="entry-content">
        	<?php if( get_field( 'image_exclude' ) ) { $exclude_images = ' exclude="'. get_field( 'image_exclude' ); }
			$gallery_output = do_shortcode('[gallery link="file" exclude="'. get_field( 'image_exclude' ).'"]'); 
				if(function_exists("jqlb_apply_lightbox")){
					echo jqlb_apply_lightbox($gallery_output);
				}
			?>
            
            <div class="entry-left">
            
			<?php the_content(); ?>
            
            <h3>For Leasing Information, Please Contact:</h3>
            
            <ul class="contact">
            <?php if( get_field( 'contact_1' ) ): ?>
               <li><?php the_field( 'contact_1' ); ?></li>
            <?php endif; ?>
                                    
            <?php if( get_field( 'contact_2' ) ): ?>
               <li><?php the_field( 'contact_2' ); ?></li>
            <?php endif; ?>
            
            <?php if( get_field( 'contact_3' ) ): ?>
               <li><?php the_field( 'contact_3' ); ?></li>
            <?php endif; ?>
            </ul>
            <ul class="contact">
	        <?php if( get_field( 'contact_4' ) ): ?>
               <li><?php the_field( 'contact_4' ); ?></li>
            <?php endif; ?>
            </ul>

            
            </div><!-- .entry-left -->
            
            <!-- START LOOP TO ADD ITEMS TO PAGE
						<?php if( have_rows('floor_plans') ): $i = 0; ?>
						<div id="portfolio" class="floorplan-container">		
							<?php while( have_rows('floor_plans') ): the_row(); 
								// vars
								$category = get_sub_field('floor_plan_category');
								$image = get_sub_field('floor_plan_image');
								$lightbox = get_sub_field('floor_plan_lightbox');
								$title = get_sub_field('floor_plan_title');
								$sf = get_sub_field('floor_plan_sf');
								$pdf = get_sub_field('floor_plan_pdf');
								$specs = get_sub_field('floor_plan_specs');
								$view = get_sub_field('floor_plan_view');
							?>	
							<div class="floorplan-item tile scale-anm all <?php echo $category; ?>">
			    			<a href="#" class="pop">
			        			<div class="modal-target">
					        		<img src="<?php echo $image; ?>" width="100%" alt="<?php echo $title; ?>">
					        		<img src="<?php echo $lightbox; ?>" alt="<?php echo $title; ?>" class="lightbox" style="display:none;">
				        			<h4 class="page-heading4"><?php echo $title; ?></h4>
				        			<h5 class="page-heading5"><?php echo $sf; ?></h5>
				        			<h1 style="display:none;"><?php echo $specs; ?></h1>
				        			<h2 style="display:none;"><?php echo $view; ?></h2>
			        			</div>
			        		</a>
			    			<a href="<?php echo $pdf; ?>" target="_blank" class="download"><p class="download-button">Download Floor Plan</p></a>
			    		</div>  
							<?php endwhile; ?>
						</div>	
						<?php endif; ?>
						END LOOP TO ADD ITEMS TO PAGE -->
            
            
            <div class="details">
            
            <?php if (is_single('61')) { ?>
            
                <table>
                
                    <tr><td colspan="2"><h3>Prudential 1</h3></td></tr>
                    
                    <?php if( get_field( 'year' ) ): ?>
                        <tr><td class="tdhead">Year Built:</td><td><?php the_field( 'year' ); ?></td></tr>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'renovation' ) ): ?>
                        <tr><td class="tdhead">Renovated</td><td><?php the_field( 'renovation' ); ?></td></tr>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'size' ) ): ?>
                        <tr><td class="tdhead">Building Size:</td><td><?php the_field( 'size' ); ?></td></tr>
                    <?php endif; ?>
                    
                    <?php /* if( get_field( 'availability' ) ): ?>
                        <tr><td class="tdhead">Available Space:</td><td><?php the_field( 'availability' ); ?></td></tr>
                    <?php endif; */ ?>                    
                    
                    <tr><td colspan="2"><br/><br/><h3>Prudential 2</h3></td></tr>
                    
                    <?php if( get_field( 'year_2' ) ): ?>
                        <tr><td class="tdhead">Year Built:</td><td><?php the_field( 'year_2' ); ?></td></tr>
                    <?php endif; ?>
                    
                    <tr><td class="tdhead">Renovated</td><td>2017</td></tr>
                    
                    <?php if( get_field( 'size_2' ) ): ?>
                        <tr><td class="tdhead">Building Size:</td><td><?php the_field( 'size_2' ); ?></td></tr>
                    <?php endif; ?>
                                        
                    <?php /* if( get_field( 'availability_2' ) ): ?>
                        <tr><td class="tdhead">Available Space:</td><td><?php the_field( 'availability_2' ); ?></td></tr>
                    <?php endif; */ ?>
                    <br/>
                    <br/>
                    <?php if( get_field( 'amenities' ) ): ?>
                        <tr>
                          <td class="tdhead">All Amenities</td><td><?php the_field( 'amenities' ); ?></td></tr>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'costar_link' ) ): ?>
                        <tr><td class="costar" colspan="2"><a href="<?php the_field( 'costar_link' ); ?>">Costar Availability Check</a></td></tr>
                    <?php endif; ?>
                    
                </table>
            
             <?php } else if(is_single('1336')) { ?>
                
                <table>
                
                    <tr><td colspan="2"><h3>833 W. Jackson</h3></td></tr>
                    
                    <?php if( get_field( 'year' ) ): ?>
                        <tr><td class="tdhead">Year Built:</td><td><?php the_field( 'year' ); ?></td></tr>
                    <?php endif; ?>
                    
     
                        <tr><td class="tdhead">Renovated:</td><td>2017</td></tr>

                    
                    <?php if( get_field( 'size' ) ): ?>
                        <tr><td class="tdhead">Building Size:</td><td>8 Stories<br/>62,430 Total Square Feet</td></tr>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'amenities' ) ): ?>
                        <tr>
                          <td class="tdhead">Amenities</td><td>Bike room with lockers and shower facility, rooftop deck, tenant lounge, newly renovated lobby and corridors (under development)</td></tr>
                    <?php endif; ?>
                    
                    <?php /* if( get_field( 'availability' ) ): ?>
                        <tr><td class="tdhead">Available Space:</td><td><?php the_field( 'availability' ); ?></td></tr>
                    <?php endif; */ ?>                    
                    
                    <tr><td colspan="2"><br/><br/><h3>322 S. Green</h3></td></tr>
                    
           
                    <tr><td class="tdhead">Year Built:</td><td>1921</td></tr>
   
                    
                    <tr><td class="tdhead">Renovated:</td><td>2017</td></tr>
                    
                    
                    <tr><td class="tdhead">Building Size:</td><td>8 Stories<br/>91,100 Total Square Feet</td></tr>
                   
                    <td class="tdhead">Amenities</td><td>Shared amenities with 833 W. Jackson and 820 W. Jackson, newly renovated lobby and corridors (under development)</td></tr>           
                    <?php /* if( get_field( 'availability_2' ) ): ?>
                        <tr><td class="tdhead">Available Space:</td><td><?php the_field( 'availability_2' ); ?></td></tr>
                    <?php endif; */ ?>
                    
                    
                    
                    <?php if( get_field( 'costar_link' ) ): ?>
                        <tr><td class="costar" colspan="2"><a href="<?php the_field( 'costar_link' ); ?>">Costar Availability Check</a></td></tr>
                    <?php endif; ?>
                    
                    
                    <tr><td colspan="2"><br/><br/><h3>820 W. Jackson</h3></td></tr>
                    
           
                    <tr><td class="tdhead">Year Built:</td><td>1912</td></tr>
   
                    
                    <tr><td class="tdhead">Renovated:</td><td>2017</td></tr>
                    
                    
                    <tr><td class="tdhead">Building Size:</td><td>8 Stories<br/>175,285 Total Square Feet</td></tr>
                    
                    <td class="tdhead">Amenities</td><td>Security, bike room with lockers and shower facility, rooftop deck, tenant lounge, newly renovated lobbies and corridors (under development)</td></tr>           
                    <?php /* if( get_field( 'availability_2' ) ): ?>
                        <tr><td class="tdhead">Available Space:</td><td><?php the_field( 'availability_2' ); ?></td></tr>
                    <?php endif; */ ?>
                    
                    
                    
                    <?php if( get_field( 'costar_link' ) ): ?>
                        <tr><td class="costar" colspan="2"><a href="<?php the_field( 'costar_link' ); ?>">Costar Availability Check</a></td></tr>
                    <?php endif; ?>
                    
                    
                    
                    
                    
                    
                    
                    <tr><td colspan="2"><br/><br/><h3>850 W. Jackson</h3></td></tr>
                    
           
                    <tr><td class="tdhead">Year Built:</td><td>1912</td></tr>
   
                    
                    <tr><td class="tdhead">Renovated:</td><td>2017</td></tr>
                    
                    
                    <tr><td class="tdhead">Building Size:</td><td>8 Stories<br/>105,423 Total Square Feet</td></tr>
                    
                    <td class="tdhead">Amenities</td><td>Security, shared amenities with 833 W. Jackson and 820 W. Jackson, newly renovated lobby and corridors (under development)</td></tr>           
                    <?php /* if( get_field( 'availability_2' ) ): ?>
                        <tr><td class="tdhead">Available Space:</td><td><?php the_field( 'availability_2' ); ?></td></tr>
                    <?php endif; */ ?>
                    
                    
                    
                    <?php if( get_field( 'costar_link' ) ): ?>
                        <tr><td class="costar" colspan="2"><a href="<?php the_field( 'costar_link' ); ?>">Costar Availability Check</a></td></tr>
                    <?php endif; ?>
                    
                    
                    
                </table>
                
            <?php } else  { ?>
            
            
                <table>
                    
                    <?php if( get_field( 'year' ) ): ?>
                        <tr><td class="tdhead">Year Built</td><td><?php the_field( 'year' ); ?></td></tr>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'renovation' ) ): ?>
                        <tr><td class="tdhead">Renovated</td><td><?php the_field( 'renovation' ); ?></td></tr>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'size' ) ): ?>
                        <tr><td class="tdhead">Building Size</td><td><?php the_field( 'size' ); ?></td></tr>
                    <?php endif; ?>
                    
                    <?php /* if( get_field( 'availability' ) ): ?>
                        <tr><td class="tdhead">Available Space</td><td><?php the_field( 'availability' ); ?></td></tr>
                    <?php endif; */ ?>
                    
                    <?php if( get_field( 'amenities' ) ): ?>
                        <tr><td class="tdhead">Amenities</td><td><?php the_field( 'amenities' ); ?></td></tr>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'costar_link' ) ): ?>
                        <tr><td class="costar" colspan="2"><a href="<?php the_field( 'costar_link' ); ?>">Costar<br />Availability Check</a></td></tr>
                    <?php endif; ?>
                    
                
                </table>
            
            <?php } ?>
            
            </div><!-- .details -->
            
            
        </div><!-- .entry-content -->

		<br style="clear: both;" />

	</div><!-- .entry-inner -->
</article><!-- #post-<?php the_ID(); ?> -->

		<?php full_frame_content_nav( 'nav-below' ); ?>

		<?php /*
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template( '', true ); */
		?>

	<?php endwhile; // end of the loop. ?>

</div><!-- #primary -->

<?php get_footer(); ?>