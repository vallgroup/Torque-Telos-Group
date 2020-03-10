<?php
/**
 * Define the Tabs appearing on the Theme Options page
 * Tabs contains sections
 * Options are assigned to both Tabs and Sections
 * @since Full Frame 1.0
 */

$general_settings_tab = array(
    "name" => "general_tab",
    "title" => __( "Theme Options", "full_frame" ),
    "sections" => array(
        "general_section_1" => array(
            "name" => "general_section_1",
            "title" => __( "", "full_frame" ),
            "description" => __( "", "full_frame" )
        )
    )
);

gpp_register_theme_option_tab( $general_settings_tab );


 /**
 * The following example shows you how to register theme options and assign them to tabs and sections:
*/
$options = array(
    "logo" => array(
        "tab" => "general_tab",
        "name" => "logo",
        "title" => "Logo",
        "description" => __( "Use a transparent png or jpg image", "full_frame" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "image",
        "default" => ""
    ),
    "favicon" => array(
        "tab" => "general_tab",
        "name" => "favicon",
        "title" => "Favicon",
        "description" => __( "Use a transparent png or ico image", "full_frame" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "image",
        "default" => ""
    ),
    "font" => array(
        "tab" => "general_tab",
        "name" => "font",
        "title" => "Headline Font",
        "description" => __( '<a href="' . get_option('siteurl') . '/wp-admin/admin-ajax.php?action=fonts&font=header&height=600&width=640" class="thickbox">Preview and choose a font</a>', "full_frame" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "select",
        "default" => "Bitter:400,700,400italic",
        "valid_options" => gpp_font_array()
    ),
    "font_alt" => array(
        "tab" => "general_tab",
        "name" => "font_alt",
        "title" => "Body Font",
        "description" => __( '<a href="' . get_option('siteurl') . '/wp-admin/admin-ajax.php?action=fonts&font=body&height=600&width=640" class="thickbox">Preview and choose a font</a>', "full_frame" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "select",
        "default" => "Molengo",
        "valid_options" => gpp_font_array()
    ),
    "css" => array(
        "tab" => "general_tab",
        "name" => "css",
        "title" => "Custom CSS",
        "description" => __( "Add some custom CSS to your theme.", "full_frame" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "textarea",
        "sanitize" => "html",
        "default" => ""
    )
);

gpp_register_theme_options( $options );