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
	}
}
