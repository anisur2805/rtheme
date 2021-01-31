<?php
/**
 * Main Content Page
 *
 * @package Rtheme
 */
?>

<article id="post-<?php the_ID();?>" <?php post_class('mb-3'); ?>">

	<?php
	get_template_part('template-parts/components/blog/entry-header');
	get_template_part('template-parts/components/blog/entry-meta');
	get_template_part('template-parts/components/blog/entry-content');
	get_template_part('template-parts/components/blog/entry-footer');
		// the_title( '<h3><a href=" ' . esc_url( get_the_permalink() ) . ' ">', '</a></h3>' );
		// the_excerpt();
	?>

</article>
