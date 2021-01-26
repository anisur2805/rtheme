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
	
	protected function __construct(){
		// wp_die("Hello world");
		$this->set_hooks();
	}
	
	protected static function set_hooks(){
		// some hook 
		
	}
}
