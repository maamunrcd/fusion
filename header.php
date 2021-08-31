<?php

/**
 * Header file for the Infotech theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Infotech
 * @since Infotech 1.0
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>



	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Nunito:ital,wght@0,300;0,400;0,600;1,300;1,600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
	<!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/slick.css" />
	<!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/slick-theme.css" />
	<link href="<?php echo get_template_directory_uri() ?>/assets/css/style.css" rel="stylesheet" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	wp_body_open();
	?>

	<header>
		<div class="header-menu position-absolute">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light pl-0 pr-0 w-100">
					<a class="navbar-brand" href="<?php echo home_url(); ?>">
						<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" />
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
					wp_nav_menu(array(
						'theme_location'    => 'primary_menu',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav w-100',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker(),
					));
					?>

				</nav>
			</div>
		</div>
	</header>