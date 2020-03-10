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
            
            <h2><?php the_content(); ?></h2>
            
            
            
            <div class="column">
            <p>Professional Organizations</p>
            <table border="0" cellpadding="0" cellspacing="0">
            <?php $rows = get_field('professional_organizations');															
            	if($rows) {
					
					$counter = 0;
										 
                foreach($rows as $row) { 
				
					if(($counter%2) == 0) { echo '<tr>'; } ?>
                <td class="box">
                <div class="half_width">
                
                <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td>
                        <ul>
                        <li><?php echo $row['pro_organization_list']; ?></li>
                        </ul>
                        </td>
                        </tr>
                    </table> </div>
                    </td>
                    <?php if((($counter%2)-2) == 0) { echo '</tr>'; } $counter++;
                }
            } ?>
            </table> </div>
            <div class="column"><?php the_field('acf-field-giving_back'); ?></div>
            
            
            
            
             <div class="column">
             <p>Giving Back</p>

            <table border="0" cellpadding="0" cellspacing="0">
            <?php $rows = get_field('giving_back');															
            	if($rows) {
					
					$counter = 0;
										 
                foreach($rows as $row) { 
				
					if(($counter%2) == 0) { echo '<tr>'; } ?>
                <td class="box">
                <div class="half_width">
                
                <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td>
                        <ul>
                        <li><?php echo $row['giving_organization_list']; ?></li>
                        </ul>
                        </td>
                        </tr>
                    </table> </div>
                    </td>
                    <?php if((($counter%2)-2) == 0) { echo '</tr>'; } $counter++;
                }
            } ?>
            </table> </div>







            
            <div class="cf"></div>
            
            </div>

        </article>
        
        </div>    
        
    </div>

	<?php endwhile; // end of the loop. ?>

</div><!-- #primary -->

<?php get_footer(); ?>