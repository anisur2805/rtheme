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
			<div class="row">
				<div class="col-md-8">
					<?php if ( is_home() && !is_front_page() ) {?>
						<header class="mb-5">
							<h1 class="site-title screen-reader-text">
								<?php single_post_title();?>
							</h1>
						</header>
					<?php }
						while ( have_posts() ): the_post();
						    get_template_part( 'template-parts/content' );
						endwhile;
						endif;
						?>

						<div class="rtheme-previous-post-link">
							<?php previous_post_link();?>
						</div>
						<div class="rtheme-next-post-link">
							<?php next_post_link();?>
						</div>

					</div>

					<div class="col-md-4">
						<?php get_sidebar();?>
					</div>
				</div>
			</div>
		</main>
	</div>

	<?php get_footer();
