<?php
/**
 * The header for our theme
 *
 * @package RTheme
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
	if( function_exists( 'wp_body_open' ) ) {	
		wp_body_open(); 
	}
	
?>
<div id="page" class="site">

	<header id="masthead" class="site-head" role="banner">
		<?php get_template_part( 'template-parts/header/nav.php' ); ?>	
	</header>

</div>
