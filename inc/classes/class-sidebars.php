<?php
/**
 * Register Sidebar
 *
 * @package Rtheme
 */
namespace Rtheme\Inc;

use Rtheme\Inc\Traits\Singleton;

class Sidebars {

	use Singleton;

    protected function __construct() {
        // wp_die("Hello world");
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action( 'widgets_init', [$this, 'register_sidebars'] );
        add_action( 'widgets_init', [$this, 'register_clock_widget'] );
    }

	public function register_sidebars(){

		register_sidebar( array(
		    'name'          => __( 'Sidebar', 'rtheme' ),
		    'id'            => 'sidebar-1',
		    'description'   => __( 'Main Sidebar Single Page.', 'rtheme' ),
		    'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
		    'after_widget'  => '</div>',
		    'before_title'  => '<h3 class="widget-title">',
		    'after_title'   => '</h3>',
		) );

		register_sidebar( array(
		    'name'          => __( 'Footer', 'rtheme' ),
		    'id'            => 'sidebar-2',
		    'description'   => __( 'Footer Sidebar.', 'rtheme' ),
		    'before_widget' => '<div id="%1$s" class="col-md-4 widget widget-sidebar %2$s">',
		    'after_widget'  => '</div>',
		    'before_title'  => '<h3 class="widget-title">',
		    'after_title'   => '</h3>',
		) );
	}

	public function register_clock_widget(){
		register_widget('Rtheme\Inc\Clock_Widget');
	}
}
