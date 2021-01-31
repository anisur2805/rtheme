<?php
/**
 * Template for post entry header
 *
 * @package Rtheme
 */

 $the_post_id = get_the_ID();
 $hide_title = get_post_meta( $the_post_id, '_hide_post_title', true );

//  echo "<pre>";
//  print_r( $hide_title . ' ' .$the_post_id );
//  echo die();

 $has_post_thumbnail = get_the_post_thumbnail( $the_post_id );

?>

<header class="entry-header">
	<?php
		if($has_post_thumbnail) {
			echo '<div class="entry-image mb-3">';
			echo '<a href="'. esc_url( get_the_permalink() ) .'">'.
				the_post_custom_thumbnail(
					$the_post_id,
					'featured-thumbnail',
					[
						'sizes' => '(max-width: 350px) : 350px, 425px',
						'class'> 'attachment-featured-large size-featured-image'
					]

				)

			// get_the_post_custom_thumbnail( $the_post_id )
			// get_the_post_thumbnail()
			.'</a>';
		}
	?>
</header>
