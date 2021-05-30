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

function the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $attributes = [] ) {
    echo get_the_post_custom_thumbnail( $post_id, $size, $attributes );
}

// get post published || update time
function rtheme_posted_on() {
    $time_string = '<time class="published update" datetime="%1$s">%2$s</time>';

    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="published" datetime="%1$s">%2$s</time><time class="update" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_attr( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_attr( get_the_modified_date() )
    );

    $posted_on = sprintf(
        esc_html_x( 'Posted on %s', 'post date', 'rtheme' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-one text-secondary"> ' . $posted_on . '</span>';

}

// Get post by || Author
function rtheme_get_author() {
    $byline = sprintf(
        esc_html_x( ' by %s', 'post author', 'rtheme' ),
        '<span class="author vcard"><a href=" ' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . ' ">' . esc_html( get_the_author() ) . '</a></span>'
    );
    echo '<span class="">' . $byline . '</span>';
}

// Get the excerpt
function rtheme_the_excerpt( $trim_character_count = 0 ) {
    if ( !has_excerpt() || 0 === $trim_character_count ) {
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags( get_the_excerpt() );
    $excerpt = substr( $excerpt, 0, $trim_character_count );
    $excerpt = substr( $excerpt, 0, strpos( $excerpt, ' ' ) );
    $excerpt = substr( $excerpt, 0, strpos( $excerpt, '.' ) );

    echo $excerpt . '[...]';

}

// Read more
function rtheme_read_more( $more = '' ) {
    if ( !is_single() ) {
        $more = sprintf( '<button class="btn btn-info mt-3 mb-4"><a class="text-white rtheme-read-more" href="%1$s">%2$s</a></button>',
            get_permalink( get_the_ID() ),
            __( 'Read More', 'rtheme' )
        );
		return $more;
    }
}


// Pagination
function rtheme_pagination(){
	$args = [
		'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">',
		'after_page_number' => '</span>'
	];
	$allowed_tag = [
		'span' => [
			'class'=> []
		],
		'a' => [
			'class'=> [],
			'href' => []
		],
		];
	printf('<nav class="rtheme-pagination clearfix">%s</nav>', wp_kses( paginate_links( $args), $allowed_tag ) );
}
