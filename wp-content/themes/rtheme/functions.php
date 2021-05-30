<?php
/**
 * RTheme functions and definitions
 *
 * @package RTheme
 */

// use Rtheme\Inc\Rtheme;


if ( !defined( 'RTHEME_DIR_PATH' ) ) {
    define( 'RTHEME_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( !defined( 'RTHEME_DIR_URI' ) ) {
    define( 'RTHEME_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( !defined( 'RTHEME_BUILD_URI' ) ) {
    define( 'RTHEME_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/src/' );
}

if ( !defined( 'RTHEME_BUILD_PATH' ) ) {
    define( 'RTHEME_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/src/' );
}

if ( !defined( 'RTHEME_BUILD_JS_URI' ) ) {
    define( 'RTHEME_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/src/' );
}

if ( !defined( 'RTHEME_BUILD_JS_DIR_PATH' ) ) {
    define( 'RTHEME_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/src/' );
}

if ( !defined( 'RTHEME_BUILD_IMG_URI' ) ) {
    define( 'RTHEME_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/src/' );
}

if ( !defined( 'RTHEME_BUILD_CSS_URI' ) ) {
    define( 'RTHEME_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/src/' );
}

if ( !defined( 'RTHEME_BUILD_CSS_DIR_PATH' ) ) {
    define( 'RTHEME_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/src/' );
}

if ( !defined( 'RTHEME_BUILD_LIB_URI' ) ) {
    define( 'RTHEME_BUILD_LIB_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/' );
}


require_once RTHEME_DIR_PATH . '/inc/helpers/autoloader.php';
require_once RTHEME_DIR_PATH . '/inc/helpers/template-tags.php';

function rtheme_get_theme_instance() {
	\Rtheme\Inc\Rtheme::get_instance();
}

rtheme_get_theme_instance();



// Owl Carousel load
function owl_enqueue_style() {
        wp_register_style( 'owl', get_template_directory_uri() . '/assets/src/css/owl.carousel.min.css', 'all' );
        wp_register_style( 'owl-theme', get_template_directory_uri() . '/assets/src/css/owl.theme.default.min.css', 'all' );

		// wp_enqueue_style( 'owl' );
        // wp_enqueue_style( 'owl-theme' );
    }


function owl_enqueue_script() {
        // wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/src/js/jquery.js', [], true );
        // wp_register_script( 'owl-js', get_template_directory_uri() . '/assets/src/js/owl.carousel.min.js', ['jquery'], true );
        // wp_enqueue_script( 'owl-js' );

        // wp_enqueue_script( 'owl-main-js' );

		wp_enqueue_script('jquery-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js');
		// wp_enqueue_script('bootstrap4-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js');
		wp_register_script( 'owl-main-js', get_template_directory_uri() . '/assets/src/js/owl.js', [], true );
    }

add_action('wp_enqueue_scripts', 'owl_enqueue_script' );
add_action('wp_enqueue_scripts', 'owl_enqueue_style' );
