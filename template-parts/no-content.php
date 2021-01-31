<?php
/**
 * No Content Template File
 *
 * @package Rtheme
 */
?>
<section class="no-result not-found container">
	<header class="mb-3">
		<h1 class="page-title screen-reader-text">
			<?php esc_html_e('No Content Found', 'rtheme'); ?>
		</h1>
	</header>

	<div class="page-content">
		<?php if( is_home() && current_user_can('publish_posts')):
			echo '<p>';
				printf(
					wp_kses(
						__('Ready to publish your first post. <a href="%s">Get started here</a>', 'rtheme'),[
							'a' => [
								'href' => []
							]
						]
					),
					esc_url(admin_url('post-new.php'))
				);
			echo '</p>';
				elseif( is_search() ):
					echo '<p>'.esc_html_e('Sorry but working matched your search', 'rtheme').'</p>';
					get_search_form();
				else:
					echo '<p>'.esc_html_e('Its seems that we cannot find what you are looking for. Perhaps search can help', 'rtheme').'</p>';
					get_search_form();
				endif;
		?>
	</div>
</section>
