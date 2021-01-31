<?php
/**
 * Menus Class File
 *
 * @package Rtheme
 */

namespace Rtheme\Inc;

use Rtheme\Inc\Traits\Singleton;

class Menus {

    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action( 'init', [$this, 'register_menus'] );

    }

    /**
     * Register Menus
     */
    public function register_menus() {
        register_nav_menus( [
            'rtheme-header-menu' => esc_html__( 'Header Menu', 'rtheme' ),
            'rtheme-footer-menu' => esc_html__( 'Footer Menu', 'rtheme' ),
        ] );
    }

    /**
     * Get Menu Obj ID
     */
    public function get_menu_id( $location ) {

        // Get Menu Location
        $locations = get_nav_menu_locations();

        // Get menu obj id
        $menu_id = $locations[$location];
        return !empty( $menu_id ) ? $menu_id : '';

	}
	
	/**
	 * Get all child menu that has given parent menu id
	 * 
	 * @param array $menu_array Menu Array
	 * @param integer $parent_id Parent ID 
	 * 
	 * @return array Child Menu Array
	 */
	public function get_child_menu_items( $menu_array, $parent_id ) {
		$child_menus = [];
		if( !empty( $menu_array ) && is_array( $menu_array )) {
			foreach( $menu_array as $menu ) {
				if( intval( $menu->menu_item_parent ) === $parent_id ) {
					array_push( $child_menus, $menu );
				}
			}
		}
		return $child_menus;
	}

}
