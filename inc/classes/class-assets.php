<?php

namespace Rtheme\Inc;

use Rtheme\Inc\Traits\Singleton;

class Assets {

    use Singleton;

    protected function __construct() {
        // wp_die("Hello world");
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_style'] );
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_script'] );
    }

    /**
     * Enqueue Styles
     */
    public function enqueue_style() {
        // Register styles.
        wp_register_style( 'bootstrap-css', RTHEME_BUILD_LIB_URI . '/src/css/bootstrap.min.css', 'all' );
        // wp_register_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' );
        wp_register_style( 'custom-css', get_template_directory_uri() . '/assets/build/library/css/custom.css', 'all' );


// wp_register_style( 'slick-css', RTHEME_BUILD_LIB_URI . '/css/slick.css', [], false, 'all' );
        // wp_register_style( 'slick-theme-css', RTHEME_BUILD_LIB_URI . '/css/slick-theme.css', ['slick-css'], false, 'all' );
        wp_enqueue_style( 'bootstrap-css' );
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        // wp_enqueue_style( 'custom-css' );

// wp_enqueue_style( 'slick-css' );
        // wp_enqueue_style( 'slick-theme-css' );

    }

    /**
     * Enqueue Scripts
     */
    public function enqueue_script() {
        // Register scripts.
        // wp_register_script( 'slick-js', RTHEME_BUILD_LIB_URI . '/js/slick.min.js', ['jquery'], false, true );
        wp_register_script( 'jquery-js', RTHEME_BUILD_LIB_URI . '/src/js/jquery.js', true );
        wp_register_script( 'popper-js', RTHEME_BUILD_LIB_URI . '/src/js/popper.min.js', true );
        wp_register_script( 'bootstrap-js', RTHEME_BUILD_LIB_URI . '/src/js/bootstrap.min.js', ['jquery-js'], true );
        wp_register_script( 'main-js', RTHEME_BUILD_JS_URI . '/js/main.js', ['jquery-js'], time(), true );


		// Enqueue Scripts.
        wp_enqueue_script( 'jquery-js' );
        wp_enqueue_script( 'popper-js' );
        wp_enqueue_script( 'bootstrap-js' );
        wp_enqueue_script( 'main-js' );

		// wp_enqueue_script( 'slick-js' );

    }

}
