<?php
/**
 * Bootstrap for theme
 *
 * @package RTheme
 */
namespace Rtheme\Inc;

use Rtheme\Inc\Traits\Singleton;

class Rtheme {

    use Singleton;

    protected function __construct() {
        Assets::get_instance();
        Menus::get_instance();
        $this->setup_hooks();
    }

	protected function setup_hooks() {
		add_action( 'after_setup_theme', [ $this, 'theme_setup' ] );
	}
	
	public function theme_setup(){
		add_theme_support( 'title-tag' );
		
		add_theme_support('custom-logo', [
			'header-text' => ['site-title', 'site-description'],
			'width' => 100,
			'height' => 100,
			'flex-height' => true,
			'flex-width' => true
		]);
		
		add_theme_support('custom-background', [
			'default-color' => '#fff',
			'default-image' => '',
			'default-repeat' => 'no-repeat'
		]);
		
		add_theme_support('post-thumbnails');
		
		add_theme_support('customize-selective-refresh-widgets');
		
		add_theme_support('automatic-feed-links');
		
		add_theme_support('html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style'
		]);
		
		add_editor_style();
		add_theme_support('wp-block-styles');
		add_theme_support('align-width');
		
		global $content_width;
		if( ! isset( $content_width ) ) {
			$content_width = 1200;
		}
		
	}
}
