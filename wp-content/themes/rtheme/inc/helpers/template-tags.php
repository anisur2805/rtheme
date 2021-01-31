<?php
/**
 * Custom Template Tags
 *
 * @package Rtheme
 */

function get_the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $attributes = [] ) {

    if ( null === $post_id ) {
        $post_id = get_the_ID();
    }

    if ( has_post_thumbnail( $post_id ) ) {
        $default_attributes = [
            'loading' => 'lazy',
        ];

        $attributes = array_merge( $attributes, $default_attributes );

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id( $post_id ),
            $size,
            false,
            $attributes
        );
    }

    return $custom_thumbnail;

}


function the_post_custom_thumbnail( $post_id, $size='featured-thumbnail', $attributes = []){
	echo get_the_post_custom_thumbnail( $post_id, $size, $attributes );
}
