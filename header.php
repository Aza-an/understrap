<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

	global $woocommerce;
	$cart_count 	= $woocommerce->cart->cart_contents_count;
	$logo 			= get_template_directory_uri() . '/assets/images/sashays-logo.svg';
	$site_name 		= get_bloginfo('name');
	$post_type 		= get_post_type();

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/3958a9114e.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div id="wrapper">
	<header id="header" class="site-header" role="header">
		<div class="header-main">
			<div class="container">
				<div class="header-left">
					<div class="logo-wrap">
						<a href="/" class="logo">
							<img src="<?=$logo?>" alt="<?=$site_name?>" />
						</a>
					</div>
					<div class="search">
						<?php include 'searchform.php' ?>
					</div>
				</div>
				<div class="header-right">
					<ul>
						<li class="search-mob">
							<a href="#"><i class="fas fa-search"></i></a>
							<div class="search searchform-mobile">
								<a class="close-btn"><i class="fas fa-times"></i></a>
								<?php include 'searchform.php' ?>
							</div>
						</li>
						<li class="desktop-only">
							<a href="<?=site_url('my-account')?>"><i class="far fa-user"></i><span><?=is_user_logged_in() ? 'My account' : 'Sign in'?></span></a>
						</li>
						<!-- <li>
							<a href="#" class="favourites-link"><i class="fas fa-heart"></i></a>
						</li> -->
						<li>
							<a href="<?=site_url('bag')?>"><i class="fas fa-shopping-bag"></i><span>My bag (<?=$cart_count?>)</span></a>
						</li>
						<li class="nav-opener-container">
                            <a href="#" class="nav-opener"><span></span></a>
							<a href="#" class="nav-closer"></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

			<nav class="navbar navbar-expand-md navbar-dark bg-grey">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

			<div class="acc-mob mobile-only">
				<a href="<?=site_url('my-account')?>"><i class="far fa-user"></i><span><?=is_user_logged_in() ? 'My account' : 'Sign in'?></span></a>
			</div>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

			</nav><!-- .site-navigation -->

		</div><!-- #wrapper-navbar end -->
	</header>
	<main>
