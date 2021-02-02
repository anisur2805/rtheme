<?php
/**
 * Template for post entry header
 *
 * @package Rtheme
 */

 $the_post_id = get_the_ID();
 $hide_title = get_post_meta( $the_post_id, '_hide_post_title', true );

$heading_class = ( ! empty( $hide_title ) && 'yes' === $hide_title) ? 'hide d-none' : '';

 $has_post_thumbnail = get_the_post_thumbnail( $the_post_id );

 // <a href="<?php //echo esc_url( get_the_permalink() );
?>

<header class="entry-header">
	<?php
		if($has_post_thumbnail) {
			echo '<div class="entry-image mb-3">';?>

			<a href="<?php echo esc_url( get_the_permalink() ) ?>">
				<?php the_post_custom_thumbnail(
					$the_post_id,
					'featured-thumbnail',
					[
						'sizes' => '(max-width: 350px) : 350px, 425px',
						'class'> 'attachment-featured-large size-featured-image'
					]

					);

			// get_the_post_custom_thumbnail( $the_post_id )
			// get_the_post_thumbnail()
			echo '</a></div>';
		}

		// title
		if( is_single() || is_page()):
			printf(
				'<h1 class="text-dark mb-3 %1$s">%2$s</h1>',
				$heading_class,
				wp_kses_post( get_the_title() )
			);
		else:
			printf(
				'<h2 class="text-dark mb-3"><a class="text-dark" href="%1$s">%2$s</a></h2>',
				esc_url( get_the_permalink() ),
				wp_kses_post( get_the_title() )
			);
		endif;
	?>
</header>
