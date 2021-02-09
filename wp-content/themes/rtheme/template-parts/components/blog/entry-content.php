<?php
/**
 * Template for Single Post Content
 *
 * @package Rtheme
 */

echo ' <div class="entry-content">';

if ( is_single() ) {
    the_content(
        sprintf(
            wp_kses(
                __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rtheme' ),
                [
                    'span' => [
                        'class' => []
                    ]
                ]
            ),
            the_title( '<span class="screen-reader-text">', '</span>', false )
        )
    );

	/**
	 * This pagination only work
	 *
	 * if Gutenburg active
	 */
wp_link_pages(
    [
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aquila' ),
        'after'  => '</div>',
    ]
);


} else {
    rtheme_the_excerpt( 20 );
	echo rtheme_read_more();
}

echo '</div>';
