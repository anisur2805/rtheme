<?php
// use \Rtheme\Inc\Rtheme;
/**
 * RTheme functions and definitions
 *
 * @package RTheme
 */

use Rtheme\Inc\Rtheme;

if ( !defined( 'RTHEME_DIR_PATH' ) ) {
	define( 'RTHEME_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( !defined( 'RTHEME_DIR_URI' ) ) {
	define( 'RTHEME_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once RTHEME_DIR_PATH . '/inc/helpers/autoloader.php';
require_once RTHEME_DIR_PATH . '/inc/helpers/template-tags.php';

function rtheme_get_theme_instance() {
	Rtheme::get_instance();
}

rtheme_get_theme_instance();
