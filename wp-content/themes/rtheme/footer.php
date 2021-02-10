<?php
/**
 * The template for displaying the footer
 *
 * @package RTheme
 */

?>

<footer class="text-center py-4 bg-light footer">
		<aside class="container">
	<div class="row">
		<?php if ( is_active_sidebar( 'sidebar-2' ) ): ?>
			<?php dynamic_sidebar( 'sidebar-2' )?>
		<?php endif;?>
	</div>
		</aside>
</footer>

<?php wp_footer();?>

</body>
</html>
