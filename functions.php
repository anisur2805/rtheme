<?php
/**
 * RTheme functions and definitions
 *
 * @package RTheme
 */

function rtheme_enqueue() {
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ) );
	
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', [], filemtime( get_template_directory() . '/assets/js/main.js' ), true );
}

add_action( 'wp_enqueue_scripts', 'rtheme_enqueue' );
