<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 * @package Full Frame
 * @since Full Frame 1.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Rework this function to remove WordPress 3.4 support when WordPress 3.6 is released.
 *
 * @uses full_frame_header_style()
 * @uses full_frame_admin_header_style()
 * @uses full_frame_admin_header_image()
 *
 * @package Full Frame
 */
function full_frame_custom_header_setup() {
	$args = array(
		'default-image'          => '%s/images/headers/sky.jpg',
		'default-text-color'     => '',
		'header-text'            => false,
		'width'                  => 1200,
		'height'                 => 500,
		'flex-height'            => true,
		'wp-head-callback'       => 'full_frame_header_style',
		'admin-head-callback'    => 'full_frame_admin_header_style',
		'admin-preview-callback' => 'full_frame_admin_header_image',
	);

	$args = apply_filters( 'full_frame_custom_header_args', $args );

	add_theme_support( 'custom-header', $args );

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'sky' => array(
			'url' => '%s/images/headers/sky.jpg',
			'thumbnail_url' => '%s/images/headers/sky-thumbnail.jpg',
			'description' => __( 'Sky', 'full_frame' )
		),
		'happy' => array(
			'url' => '%s/images/headers/happy.jpg',
			'thumbnail_url' => '%s/images/headers/happy-thumbnail.jpg',
			'description' => __( 'Happy', 'full_frame' )
		)
	) );
}
add_action( 'after_setup_theme', 'full_frame_custom_header_setup' );

/**
 * Shiv for get_custom_header().
 *
 * get_custom_header() was introduced to WordPress
 * in version 3.4. To provide backward compatibility
 * with previous versions, we will define our own version
 * of this function.
 *
 * @todo Remove this function when WordPress 3.6 is released.
 * @return stdClass All properties represent attributes of the curent header image.
 *
 * @package Full Frame
 * @since Full Frame 1.1
 */

if ( ! function_exists( 'get_custom_header' ) ) {
	function get_custom_header() {
		return (object) array(
			'url'           => get_header_image(),
			'thumbnail_url' => get_header_image(),
			'width'         => HEADER_IMAGE_WIDTH,
			'height'        => HEADER_IMAGE_HEIGHT,
		);
	}
}

if ( ! function_exists( 'full_frame_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see full_frame_custom_header_setup().
 *
 * @since Full Frame 1.0
 */
function full_frame_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
		.site-intro-text,
		.site-intro-text a {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	</style>
	<?php
}
endif; // full_frame_header_style

if ( ! function_exists( 'full_frame_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see full_frame_custom_header_setup().
 *
 * @since Full Frame 1.0
 */
function full_frame_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
		position: relative;
	}
	#headimg h1,
	#desc {
		position: absolute;
			top: 40%;
		text-align: center;
		width: 100%;
		z-index: 1;
	}
	#desc .site-logo {
		display: block;
		margin: 0 auto 40px;
	}
	#headimg h1 {
	}
	#headimg h1 a {
	}
	#desc {
		top: 50%;
		text-align: center;
		width: 100%;
		font-size: 2em;
		text-shadow: 0 0 2px #444;
	}
	#headimg img {
	}
	</style>
<?php
}
endif; // full_frame_admin_header_style

if ( ! function_exists( 'full_frame_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see full_frame_custom_header_setup().
 *
 * @since Full Frame 1.0
 */
function full_frame_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display: none;"';
		else
			$style = ' style="color: #' . get_header_textcolor() . ';"';
		?>
		<?php $options = get_option( 'full_frame_options' ); ?>
		<div id="desc"<?php echo $style; ?>>
			<?php if ( ! empty( $options['logo'] ) ) { ?>
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img class="site-logo aligncenter" src="<?php echo esc_url( $options['logo'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				</a>
			<?php } ?>
			<?php bloginfo( 'description' ); ?>
		</div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // full_frame_admin_header_image