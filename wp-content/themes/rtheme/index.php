<?php
/**
 * The main template file
 *
 * @package RTheme
 */

get_header();
?>

<div id="primary">
	<main id="main" class="site-main mt-5" role="main">
	<?php if ( have_posts() ): ?>
		<div class="container">
			<?php if ( is_home() && !is_front_page() ) {?>
				<header class="mb-5">
					<h1 class="site-title screen-reader-text">
						<?php single_post_title();?>
					</h1>
				</header>
			<?php }

			echo '<div class="row">';

			$index          = 0;
			$number_of_cols = 3;

			while ( have_posts() ): the_post();
			    if ( 0 === $index % $number_of_cols ) {

			        echo '<div class="col-lg-4 col-md-6 col-sm-12 ' . $index . '">';
			    }

			    get_template_part( 'template-parts/content' );

			    $index++;

			    if ( 0 !== $index && 0 === $index % $number_of_cols ) {
			        echo '</div>';
			    }
			endwhile;

			echo "</div>"; // !Row

			echo "</div>"; // !Container
			else:
			    get_template_part( 'template-parts/no-content' );
			endif;
			get_template_part( 'template-parts/no-content' );
			
			echo "</main>";
			echo "</div>";

get_footer();
