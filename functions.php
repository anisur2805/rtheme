<?php
/**
 * RTheme functions and definitions
 *
 * @package RTheme
 */

function rtheme_enqueue() {
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ) );
	wp_enqueue_style( 'bootstrap4', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], filemtime( get_template_directory() . '/assets/css/bootstrap.min.css' ) );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', [], filemtime( get_template_directory() . '/assets/css/main.css' ) );
	
	wp_enqueue_script('jquery-slim', get_template_directory_uri() . '/assets/js/jquery-3.5.1.slim.min.js', [], filemtime( get_template_directory() . '/assets/js/jquery-3.5.1.slim.min.js' ), true );
	wp_enqueue_script('popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', [], filemtime( get_template_directory() . '/assets/js/popper.min.js' ), true );
	wp_enqueue_script('bootstrap4-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [ 'jquery-slim',  'popper-js' ], filemtime( get_template_directory() . '/assets/js/bootstrap.min.js' ), true );
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', [], filemtime( get_template_directory() . '/assets/js/main.js' ), true );
}

add_action( 'wp_enqueue_scripts', 'rtheme_enqueue' );
