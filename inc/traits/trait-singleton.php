<?php
namespace Rtheme\Inc\Traits;

trait Singleton {
    protected function __construct() {

    }

    final protected function __clone() {

    }

    final public static function get_instance() {
        static $instance = [];
        $called_class    = get_called_class();

        if ( !isset( $instance[ $called_class ] ) ) {
            // $instance[ $called_class ] = get_called_class(); // 1
            $instance[$called_class] = new $called_class(); // 2

            do_action( sprintf( 'rtheme_singleton_init_%s', $called_class ) );
        }

        return $instance[ $called_class ];
    }
}
