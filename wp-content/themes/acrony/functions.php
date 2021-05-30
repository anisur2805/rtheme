<?php
/*
 * Functions file
 *
 * @package Acorny
 */

/**
 * Essential theme supports
 * */

define( 'VERSION', '1.0.0' );
function theme_setup() {
    /** automatic feed link*/
    add_theme_support( 'automatic-feed-links' );

    /** tag-title **/
    add_theme_support( 'title-tag' );

    /** post formats */
    $post_formats = array( 'aside', 'image', 'gallery', 'video', 'audio', 'link', 'quote', 'status' );
    add_theme_support( 'post-formats', $post_formats );

    /** post thumbnail **/
    add_theme_support( 'post-thumbnails' );

    /** HTML5 support **/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    /** refresh widget **/
    add_theme_support( 'customize-selective-refresh-widgets' );

    /** custom background **/
    $bg_defaults = array(
        'default-image'      => '',
        'default-preset'     => 'default',
        'default-size'       => 'cover',
        'default-repeat'     => 'no-repeat',
        'default-attachment' => 'scroll',
    );
    add_theme_support( 'custom-background', $bg_defaults );

    /** custom header **/
    $header_defaults = array(
        'default-image'      => '',
        'width'              => 300,
        'height'             => 60,
        'flex-height'        => true,
        'flex-width'         => true,
        'default-text-color' => '',
        'header-text'        => true,
        'uploads'            => true,
    );
    add_theme_support( 'custom-header', $header_defaults );

    /** custom log **/
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

}

add_action( 'after_setup_theme', 'theme_setup' );

// Enqueue Scripts
function acrony_theme_scripts() {

    wp_enqueue_style( 'acrony-style', get_stylesheet_uri() );

    // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );

    wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/css/owl-carousel-min.css', array(), VERSION );
    wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.css', array(), VERSION );
    wp_enqueue_style( 'acrony-core-style', get_template_directory_uri() . '/assets/css/tools.css', array(), VERSION );
    wp_enqueue_style( 'font-awesome-5-pro', get_template_directory_uri() . '/assets/css/font-awesome-5-pro.css', array(), VERSION );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-min.css', array(), VERSION );
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.css', array(), VERSION );
    wp_enqueue_style( 'lity', get_template_directory_uri() . '/assets/css/lity-min.css', array(), VERSION );
    wp_enqueue_style( 'acrony-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), VERSION );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap-min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'slicknav-js', get_template_directory_uri() . '/assets/js/slicknav-min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'lity-js', get_template_directory_uri() . '/assets/js/lity-min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'fitvids-js', get_template_directory_uri() . '/assets/js/fitvids.js', array(), '1.0.0', true );

    wp_enqueue_script( 'prefixfree-min-js', get_template_directory_uri() . '/assets/js/prefixfree-min.js', array(), '1.0.0', true );

    wp_enqueue_script( 'scrollUp-min-js', get_template_directory_uri() . '/assets/js/scrollUp-min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );

}

// add_action( 'wp_enqueue_scripts', 'acrony_theme_scripts' );

// Register Menus
if ( !function_exists( 'acrony_register_nav_menu' ) ) {

    function acrony_register_nav_menu() {
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'text_domain' ),
            'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
        ) );
    }

    add_action( 'after_setup_theme', 'acrony_register_nav_menu', 0 );
}