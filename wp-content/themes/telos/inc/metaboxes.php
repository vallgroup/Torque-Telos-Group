<?php

/**
 * Metaboxes for creative control over text positioning and text colors
 * Useful in case background images conflict with default text color & positioning
 *
 * @package Full Frame
 * @since Full Frame 1.0
 */

/*
 * Setup our metaboxes
 */
function full_frame_meta_boxes_setup() {
    /* Add meta boxes on the 'add_meta_boxes' hook. */
    add_action( 'add_meta_boxes', 'full_frame_add_post_meta_boxes' );
    /* Save post meta on the 'save_post' hook. */
    add_action( 'save_post', 'full_frame_save_text_fx_meta', 10, 2 );
}
add_action( 'load-post.php', 'full_frame_meta_boxes_setup' );
add_action( 'load-post-new.php', 'full_frame_meta_boxes_setup' );

/*
 * Enqueue scripts and styles
 */
function full_frame_enqueue_scripts_styles( $hook ) {
    // only add to specific admin pages
    if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_style( 'wp-color-picker' );
    }
}
add_action( 'admin_enqueue_scripts', 'full_frame_enqueue_scripts_styles', 40 );

/*
 * Enqueue scripts to admin_head only on post
 */
function full_frame_enqueue_scripts() {
    global $pagenow;
    // only add to specific admin pages
    if ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) {
        echo "<script>
        jQuery(document).ready(function($){
            var featured_thumbnail = $('#postimagediv img').is('.attachment-post-thumbnail');
            if(featured_thumbnail) {
                var post_title = $('input#title').val();
                $('#postimagediv .inside p:first-child').append('<p class=\"full_frame-text-fx-preview\"><span>'+post_title+'</span></p>').html();
                $('body').on('keyup', 'input#title', function(){
                    var post_title = $('input#title').val();
                    $('p.full_frame-text-fx-preview span').html(post_title);
                });
            }
            var color = $('input#textcolorpicker[type=\'text\']').val();
            $('.full_frame-text-fx-preview').css('color', color);
            $('.color-picker').wpColorPicker({
                change: function(event, ui) {
                    $('.full_frame-text-fx-preview').css( 'color', ui.color.toString());
                }
            });
            post_format = $('input.post-format:checked').val();
            style = $('input.full_frame_radio:checked').val();
            if( ( post_format == 'gallery' || post_format == 'video' || post_format == 'quote' ) && style == 'default' ) {
                style = 'center';
            }
            $('input.post-format:radio').change(
                function(){
                    post_format = $(this).val();
                    style = $('input.full_frame_radio:checked').val();
                    if( ( post_format == 'gallery' || post_format == 'video' || post_format == 'quote' ) && style == 'default' ) {
                        style = 'center';
                    } else if( style == 'default') {
                        style = 'left';
                    }
                    $('.full_frame-text-fx-preview span').removeClass().addClass( style );
                }
            );
            $('.full_frame-text-fx-preview span').removeClass().addClass( style );
            $('input.full_frame_radio:radio').change(
                function() {
                    style = $(this).val();
                    if( ( post_format == 'gallery' || post_format == 'video' || post_format == 'quote' ) && style == 'default' ) {
                        style = 'center';
                    }
                    $('.full_frame-text-fx-preview span').removeClass().addClass( style );
                }
            );
        });
        </script>
        <style type='text/css'>
            #full_frame-post-preview { position: relative; }
            #full_frame-post-preview img { max-width: 100%; height: auto; }
            .inside p { position: relative; }
            .inside p p.full_frame-text-fx-preview { position: absolute; top: 10px; z-index:1; display:block; width:95%; padding:0 5%; font-size:12px; height: 150px; overflow: hidden; font-weight:700; text-transform: uppercase; color: #fff;}
            .inside p p.full_frame-text-fx-preview span { width: 30%; display: block; }
            .inside p p.full_frame-text-fx-preview span.left {  }
            .inside p p.full_frame-text-fx-preview span.center { margin: auto; text-align: center; }
            .inside p p.full_frame-text-fx-preview span.right { text-align: right; float: right; }
            .inside p p.full_frame-text-fx-preview span.full { margin: auto; text-align: center; width: 100%; }
        </style>";
    }
}
add_action( 'admin_head', 'full_frame_enqueue_scripts', 100 );

/*
 * Create one or more meta boxes to be displayed on the post editor screen.
 */
function full_frame_add_post_meta_boxes() {
    add_meta_box(
        'full_frame-text-fx', // Unique ID
        esc_html__( 'Text Options', 'full_frame' ), // Title
        'full_frame_text_fx_meta_box', // Callback function
        'post', // Admin page (or post type)
        'side', // Context
        'default' // Priority
    );
}

/*
 * Display the text positioning metabox
 */
function full_frame_text_fx_meta_box( $object, $box ) { ?>

    <?php wp_nonce_field( basename( __FILE__ ), 'full_frame_text_fx_nonce' ); ?>

    <?php $ff_saved_text_fx = esc_attr( get_post_meta( $object->ID, 'full_frame-text-fx', true ) ); ?>
    <?php $ff_saved_text_color = esc_attr( get_post_meta( $object->ID, 'full_frame-text-color', true ) ); ?>

    <p class="howto"><?php _e( 'Use the text position and text color options below to customize the presentation of text, which will appear directly on top of your featured image, on homepage and archive pages.', 'full_frame' ); ?></p>

    <p>
        <label for="full_frame-text-fx"><strong><?php _e( 'Text Position:', 'full_frame' ); ?></strong></label><br />
        <label><input class="full_frame_radio" type="radio" name="full_frame-text-fx" value="default" <?php if( '' == $ff_saved_text_fx || 'default' == $ff_saved_text_fx ) { ?>checked="checked" <?php } ?> /> <?php _e( 'Default', 'full_frame' ); ?></label><br />
        <label><input class="full_frame_radio" type="radio" name="full_frame-text-fx" value="left" <?php if( 'left' == $ff_saved_text_fx ) { ?>checked="checked" <?php } ?> /> <?php _e( 'Left', 'full_frame' ); ?></label><br />
        <label><input class="full_frame_radio" type="radio" name="full_frame-text-fx" value="center" <?php if( 'center' == $ff_saved_text_fx ) { ?>checked="checked" <?php } ?> /> <?php _e( 'Center', 'full_frame' ); ?></label><br />
        <label><input class="full_frame_radio" type="radio" name="full_frame-text-fx" value="right" <?php if( 'right' == $ff_saved_text_fx ) { ?>checked="checked" <?php } ?> /> <?php _e( 'Right', 'full_frame' ); ?></label><br />
        <label><input class="full_frame_radio" type="radio" name="full_frame-text-fx" value="full" <?php if( 'full' == $ff_saved_text_fx ) { ?>checked="checked" <?php } ?> /> <?php _e( 'Full Width', 'full_frame' ); ?></label><br />
    </p>

    <p class="colorPickerWrapper">
        <label for="full_frame-text-color"><strong><?php _e( 'Text Color:', 'full_frame' ); ?></strong></label><br/>
        <input id="textcolorpicker" name="full_frame-text-color" class="color-picker" type="text" value="<?php if( '' == $ff_saved_text_color ) { echo '#ffffff'; } else { echo '#' . $ff_saved_text_color; } ?>" />
    </p>
<?php }

/*
 * Save the text position post metadata.
 */
function full_frame_save_text_fx_meta( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( ! isset( $_POST['full_frame_text_fx_nonce'] ) || ! wp_verify_nonce( $_POST['full_frame_text_fx_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
        return $post_id;

    /* more than one, so set to an array */
    $names = array( 'full_frame-text-fx', 'full_frame-text-color' );

    foreach ( $names as $name ) {

        /* Get the posted data and sanitize it for use as an HTML class. */
        $new_meta_value = ( isset( $_POST[ $name ] ) ? sanitize_html_class( $_POST[ $name ] ) : '' );

        /* Get the meta key. */
        $meta_key = $name;

        /* Get the meta value of the custom field key. */
        $meta_value = get_post_meta( $post_id, $meta_key, true );

        /* If a new meta value was added and there was no previous value, add it. */
        if ( $new_meta_value && '' == $meta_value )
            add_post_meta( $post_id, $meta_key, $new_meta_value, true );

        /* If the new meta value does not match the old value, update it. */
        elseif ( $new_meta_value && $new_meta_value != $meta_value )
            update_post_meta( $post_id, $meta_key, $new_meta_value );

        /* If there is no new meta value but an old value exists, delete it. */
        elseif ( '' == $new_meta_value && $meta_value )
            delete_post_meta( $post_id, $meta_key, $meta_value );

    }
}

/*
 * The user-define text and border colors
 */
function full_frame_text_color() {
    global $post;
    $color = esc_attr( get_post_meta( $post->ID, 'full_frame-text-color', true ) );
    if ( $color ) {
        $style = '<style>.post-' . $post->ID . ' .entry-inner, .post-' . $post->ID . ' .entry-content, .post-' . $post->ID . ' .entry-inner a, .post-' . $post->ID . ' .entry-inner a:hover { color:#' . $color . '; border-color: #' . $color . '; }</style>';
        echo $style;
    }
}
add_action( 'full_frame_above_entry', 'full_frame_text_color' );