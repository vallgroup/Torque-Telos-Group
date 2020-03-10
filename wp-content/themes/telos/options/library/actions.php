<?php

/**
 * Custom CSS
 */
function gpp_custom_css() {

    $theme_options = get_option( gpp_get_current_theme_id() . '_options' );

    if ( isset( $theme_options['css'] ) && '' != $theme_options['css'] ) {
        echo '<!-- BeginHeader --><style type="text/css">';
        echo sanitize_text_field( $theme_options['css'] );
        echo '</style><!-- EndHeader -->';
    }
}

// add_action( 'wp_head', 'gpp_custom_css' );

/**
 * Google Font Integration
 */
function gpp_include_font() {

    $theme_options = get_option( gpp_get_current_theme_id() . '_options' );
    $css = null;
    $font_family = null;
    $font_alt_family = null;

    if ( isset( $theme_options['font'] ) ) {
        $font = explode( ':', $theme_options['font'] );
        $font_name = str_replace('+', ' ', $font[0] );
        $font_name = "'" . $font_name . "'";

        $css = 'h1, h2, h3, h4, h5, h6, ul.menu li a { font-family: ' . $font_name .'; }';
    }

    if ( isset( $theme_options['font_alt'] ) ) {
        $font_alt = explode( ':', $theme_options['font_alt'] );
        $font_alt_name = str_replace( '+', ' ', $font_alt[0] );
        $font_alt_name = "'" . $font_alt_name . "'";

        $css .= 'body, p, textarea, input, h2.site-description { font-family: ' . $font_alt_name .'; }';
    }

    print '<!-- BeginHeader --><style type="text/css">' . $css . '</style><!-- EndHeader -->';

}

// add_action( 'wp_head', 'gpp_include_font' );

/**
 * Alternative styles
 */
function  gpp_alt_styles() {

    $theme_options = get_option( gpp_get_current_theme_id() . '_options' );

    if ( isset ( $theme_options['color'] ) && '' != $theme_options['color'] ) {
        wp_enqueue_style( 'gpp-alt-style', get_template_directory_uri() . '/css/' . $theme_options['color'] . '.css', array( 'style' ) );
    }
}
// add_action( 'wp_enqueue_scripts', 'gpp_alt_styles' );

/**
 * Enqueue Fonts
 */
function gpp_enqueue_fonts() {

    $theme_options = get_option( gpp_get_current_theme_id() . '_options' );

    if ( ! empty( $theme_options['font'] ) || ! empty( $theme_options['font_alt'] ) ) {
        $protocol = is_ssl() ? 'https' : 'http';

        $fonts = gpp_font_array();

        // Font from our DB
        $header = explode( ':', $theme_options['font'] );
        $header_name = $header[0];

        if ( ! empty( $header[1] ) ){
            $header_params = ':' . $header[1];
        } else {
            $header_params = null;
        }

        $body = explode( ':', $theme_options['font_alt'] );
        $body_name = $body[0];

        if ( ! empty( $body[1] ) ) {
            $body_params = ':' . $body[1];
        } else {
            $body_params = null;
        }

        $final_fonts = rawurldecode( $header_name . $header_params . '|' . $body_name . $body_params );

        // store these for use later if needed (photoshelter)
        global $gpp_google_fonts;
        $gpp_google_fonts = $protocol . '://fonts.googleapis.com/css?family=' . $final_fonts;

        wp_enqueue_style( 'gpp-custom-fonts', "$protocol://fonts.googleapis.com/css?family={$final_fonts}" );
    }
}

// add_action( 'wp_enqueue_scripts', 'gpp_enqueue_fonts' );