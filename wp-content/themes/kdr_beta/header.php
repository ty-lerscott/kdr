<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kdr_beta
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="wrapper">
			<a class="logo" href="/">Kappa Delta Rho @ Cornell University</a>
			<div class="menu">
				<div class="mobile-toggle">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<?php
					wp_nav_menu(array(
						'menu' => 'header_menu',
						'container' => FALSE,
						'menu_class' => ''
					));
				?>
			</div>
		</div>
	</header>
