<?php
/**
 * The header for our theme
 *
 * @package Acorny
 */
?><!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head();?>
</head>

<body <?php body_class();?>>

	<div class="preloader" style="display: none;">
		<div class="loaders loaders-1">
			<div class="loaders-outter"></div>
			<div class="loaders-inner"></div>
		</div>
	</div>

<div class="top" style="height: 300px;"></div>
<?php echo do_shortcode('[hip_instagram_shortcode]'); ?>
	<header id="masthead" class="site-head" role="banner">

	<div class="site-branding">
		<a href="<?php echo site_url(); ?>">Acrony </a>
	</div>
		<?php
		wp_nav_menu( array(
		    'menu'           => 'Primary Nav', // Do not fall back to first non-empty menu.
		    'theme_location' => 'primary_menu',
		    'fallback_cb'    => false, // Do not fall back to wp_page_menu()
		 ) );

		?>

		<a href="/contact/" class="header-button">Get A Quote</a>
