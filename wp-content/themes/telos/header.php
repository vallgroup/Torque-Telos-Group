<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Full Frame
 * @since Full Frame 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $options = get_option( 'full_frame_options' ); ?><head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo( 'name' ); ?> | <?php is_home() ? bloginfo( 'description' ) : wp_title(''); ?></title>
<meta name = "viewport" content = "width=device-width, initial-scale = 1, user-scalable = yes">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->


<script type="text/javascript" src="http://fast.fonts.com/jsapi/8c8c75a8-8030-4365-a821-8660e2c84bf3.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.colorbox.js"></script>
<!-- Autohiding navbar -->
	
	
<script src="https://www.youtube.com/iframe_api"></script>

<script type="text/javascript">
	
	var player, iframe;

// init player
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    height: '200',
    width: '300',
    videoId: 'dQw4w9WgXcQ',
    events: {
      'onReady': onPlayerReady
    }
  });
}

// when ready, wait for clicks
function onPlayerReady(event) {
  player = event.target;
  iframe = $('#player');
  setupListener(); 
}

function playFullscreen (){
  player.playVideo();//won't work on mobile
  
  var requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
  if (requestFullScreen) {
    requestFullScreen.bind(iframe)();
  }
}
</script>	
	
	


<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" />
</head>

<body <?php body_class(); ?>>
	
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner" <?php if ( is_home() ) full_frame_header_image(); ?>>
		<?php $header_image = get_header_image();

		 if ( is_home() && ! empty( $header_image )) { ?>
			<div class="site-intro">

				<?php if ( ! empty( $options['logo'] ) ) { ?>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img class="site-logo aligncenter" src="<?php echo esc_url( $options['logo'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					</a>
				<?php } ?>

				<div class="site-intro-text">
					<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>

			</div>
			
			
		<?php } ?>

		<div id="anchor" class="site-nav">
			
				<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			

			<nav role="navigation" class="site-navigation main-navigation block">
				<h1 class="assistive-text"><?php _e( 'Menu', 'full_frame' ); ?></h1>
				<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'full_frame' ); ?>"><?php _e( 'Skip to content', 'full_frame' ); ?></a></div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => 'main-menu' ) ); ?>
			</nav><!-- .site-navigation .main-navigation -->
		
		
		  
		</div><!-- .site-intro -->
       
	</header><!-- #masthead .site-header -->
	