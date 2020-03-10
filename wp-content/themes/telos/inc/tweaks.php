<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Full Frame
 * @since Full Frame 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Full Frame 1.0
 */
function full_frame_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'full_frame_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Full Frame 1.0
 */
function full_frame_body_classes( $classes ) {
    $options = get_option( 'full_frame_options' );
    // Adds a class of group-blog to blogs with more than 1 published author
    if ( is_multi_author() )
        $classes[] = 'group-blog';
    if ( ! is_home() )
        $classes[] = 'not-home';

    $background_image = get_background_image();
    if ( $background_image )
        $classes[] = 'has-background-image';

    $header_image = get_header_image();
    if ( $header_image )
        $classes[] = 'has-header-image';
    if ( ! empty( $options['message'] ) )
        $classes[] = 'has-message';
    if ( ! empty( $options['logo'] ) )
        $classes[] = 'has-logo';

    return $classes;
}
add_filter( 'body_class', 'full_frame_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @since Full Frame 1.0
 */
function full_frame_post_class( $classes ) {
    global $wp_query, $post;
    // add active class for first post in query
    if ( 0 == $wp_query->current_post )
        $classes[] = 'active';
    // text positioning from user selected meta
    $text_position = esc_attr( get_post_meta( $post->ID, 'full_frame-text-fx', true ) );
    if ( 'right' == $text_position )
        $classes[] = 'text-right';
    elseif ( 'left' == $text_position )
        $classes[] = 'text-left';
    elseif ( 'center' == $text_position )
        $classes[] = 'text-center';
    elseif ( 'full' == $text_position )
        $classes[] = 'text-full';
    // check if post has featured image
    if ( has_post_thumbnail( $post->ID ) )
        $classes[] = 'has-featured-image';

    return $classes;
}
add_filter( 'post_class', 'full_frame_post_class' );

/**
 * Custom excerpt more tag
 *
 * @since Full Frame 1.0
 */
function full_frame_excerpt_more( $more ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'full_frame_excerpt_more' );

/**
 * Get rid of inline Gallery styles. Yuck.
 *
 * @since Full Frame 1.0
 */
add_filter( 'use_default_gallery_style', '__return_false' );