<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Full Frame
 * @since Full Frame 1.0
 */
?>

	<footer id="colophon" class="site-footer" role="contentinfo">
    	

		<?php
			/* The footer widget area is triggered if any of the areas
			 * have widgets. So let's check that first.
			 *
			 * If none of the sidebars have widgets, then let's bail early.
			 */
			if (  is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' ) ||  is_active_sidebar( 'footer-3' ) ) :
			// If we get this far, we have widgets. Let do this.
		?>
        
		<div id="footer-widgets">
        
        	<?php // <div id="footer-telos">Telos:</div> ?>
            
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div id="first" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div><!-- #first .widget-area -->
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div id="second" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div><!-- #second .widget-area -->
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			<div id="third" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div><!-- #third .widget-area -->
			<?php endif; ?>
		</div><!-- #footer-widgets -->

		<?php endif; ?>

		<div class="print-only logo-print">
        	<img src="http://www.telosgroupllc.com/wp-content/themes/full-frame/images/logo-print.jpg" />
        </div>
		<div class="site-info">
        <span class="footer-left">
        <span class="footer-copy">&copy;<?php echo date("Y"); ?> The Telos Group LLC. All rights reserved.</span>
        <span class="footer-links"><a href="/privacy/">Privacy</a></span> 
        <span class="footer-links">|</span> 
        <span class="footer-links"><a href="/terms-of-use/">Terms of Use</a></span></span>
      
        <span class="footer-links"><a href="http://www.linkedin.com/company/3115059?trk=prof-0-ovw-curr_pos"><img src="http://www.telosgroupllc.com/wp-content/themes/telos/images/linkedin.png" width="18" /></a></span> 
        <span class="footer-links">|</span> 
        <span class="footer-links"><a href="https://twitter.com/TelosGroupLLC"><img src="http://www.telosgroupllc.com/wp-content/themes/telos/images/twitter.png" width="18" /></a></span>
        
        </div>
    </footer><!-- #colophon .site-footer -->

</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>