<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Social Links
$facebook              = get_theme_mod('custom_facebook');
$instagram             = get_theme_mod('custom_instagram');
$pinterest             = get_theme_mod('custom_pinterest');
$twitter               = get_theme_mod('custom_twitter');
$linkedin              = get_theme_mod('custom_linkedin');
$youtube               = get_theme_mod('custom_youtube');

$year = date('Y');
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

			</main>

			<footer class="site-footer" id="colophon">

				<div class="container">
					<div class="footer-menus">
						<div class="row">
							<div class="col-6 col-lg-3">
								<h4>Lorem ipsum</h4>
								<?php wp_nav_menu( array('theme_location' => 'footer_one', 'container' => 'nav', 'container-class' => 'footer-menu footer-one-container', 'menu-class' => 'footer-one')); ?>
							</div>
							<div class="col-6 col-lg-3">
								<h4>Lorem ipsum</h4>
								<?php wp_nav_menu( array('theme_location' => 'footer_one', 'container' => 'nav', 'container-class' => 'footer-menu footer-one-container', 'menu-class' => 'footer-one')); ?>
							</div>
							<div class="col-6 col-lg-3">
								<h4>Lorem ipsum</h4>
								<?php wp_nav_menu( array('theme_location' => 'footer_one', 'container' => 'nav', 'container-class' => 'footer-menu footer-one-container', 'menu-class' => 'footer-one')); ?>
							</div>
							<div class="col-6 col-lg-3">
								<h4>Lorem ipsum</h4>
								<?php wp_nav_menu( array('theme_location' => 'footer_one', 'container' => 'nav', 'container-class' => 'footer-menu footer-one-container', 'menu-class' => 'footer-one')); ?>
							</div>
						</div>
					</div>
					<div class="social-media">
						<h3>Socials...</h3>
	                    <ul class="social-networks">
	                        <?php if ( $facebook ) : ?>
	                            <li><a href="<?=$facebook?>" target="_blank" class="fab fa-facebook-square"></a></li>
	                        <?php endif; ?>
	                        <?php if ( $twitter ) : ?>
	                            <li><a href="https://twitter.com/<?=$twitter?>" target="_blank" class="fab fa-twitter"></a></li>
	                        <?php endif; ?>
	                        <?php if ( $instagram ) : ?>
	                            <li><a href="<?=$instagram?>" target="_blank" class="fab fa-instagram"></a></li>
	                        <?php endif; ?>
	                        <?php if ( $pinterest ) : ?>
	                            <li><a href="<?=$pinterest?>" target="_blank" class="fab fa-pinterest"></a></li>
	                        <?php endif; ?>
	                        <?php if ( $linkedin ) : ?>
	                            <li><a href="<?=$linkedin?>" target="_blank" class="fab fa-linkedin-square"></a></li>
	                        <?php endif; ?>
	                        <?php if ( $youtube ) : ?>
	                            <li><a href="<?=$youtube?>" target="_blank" class="fab fa-youtube"></a></li>
	                        <?php endif; ?>
	                    </ul>
					</div>
				</div>

				<div class="site-info">
					<div class="container">
						<span>&copy; <?=$year?> Trans-Continental Ltd. All rights reserved.</span>
						<span>Website by <a href="https://www.rewindd.co.uk/">Rewindd.co.uk</a>
					</div>
				</div><!-- .site-info -->

			</footer><!-- #colophon -->

		</div><!-- main wrapper end -->

		<?php wp_footer(); ?>

	</body>

</html>
