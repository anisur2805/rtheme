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
        wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), [], filemtime( RTHEME_DIR_PATH . '/style.css' ) );
        wp_enqueue_style( 'bootstrap4', RTHEME_DIR_URI . '/assets/css/bootstrap.min.css', [], filemtime( RTHEME_DIR_PATH . '/assets/css/bootstrap.min.css' ) );
        wp_enqueue_style( 'main', RTHEME_DIR_URI . '/assets/css/main.css', [], filemtime( RTHEME_DIR_PATH . '/assets/css/main.css' ) );
    }

	/**
     * Enqueue Scripts
     */
    public function enqueue_script() {
        wp_enqueue_script( 'jquery-slim', RTHEME_DIR_URI . '/assets/js/jquery-3.5.1.slim.min.js', [], filemtime( RTHEME_DIR_PATH . '/assets/js/jquery-3.5.1.slim.min.js' ), true );
        wp_enqueue_script( 'popper-js', RTHEME_DIR_URI . '/assets/js/popper.min.js', [], filemtime( RTHEME_DIR_PATH . '/assets/js/popper.min.js' ), true );
        wp_enqueue_script( 'bootstrap4-js', RTHEME_DIR_URI . '/assets/js/bootstrap.min.js', ['jquery-slim', 'popper-js'], filemtime( RTHEME_DIR_PATH . '/assets/js/bootstrap.min.js' ), true );
        wp_enqueue_script( 'main-js', RTHEME_DIR_URI . '/assets/js/main.js', [], filemtime( RTHEME_DIR_PATH . '/assets/js/main.js' ), true );
	}
	
}
