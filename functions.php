<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

function site_assets() {
	// Load main site stylesheet
    wp_enqueue_style('main_css', get_template_directory_uri() . '/assets/css/style.css', array() );

	// Load main JS
	wp_register_script( 'main', get_template_directory_uri().'/assets/js/site-min.js');

	wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'site_assets');

function print_nice($variable) {
	echo '<pre>';
	print_r($variable);
	echo '</pre>';
}

function get_page_structure($field_name, $post_id = false) {
    if (have_rows($field_name, $post_id)) {
        while (have_rows($field_name, $post_id)) {
            the_row();
            $row_layout = get_row_layout();
            $js = locate_template('/assets/js/blocks/' . $row_layout . '.js');
            $js_handle = $row_layout . '-js';
            if ( $js && !wp_script_is($js_handle) ) {
                global $wp_query;
                $args = array(
                    'nonce' => wp_create_nonce('be-load-more-nonce'),
                    'url' => admin_url('admin-ajax.php'),
                    'template_url' => get_template_directory_uri(),
                    'query' => $wp_query->query,
                );
                wp_enqueue_script($js_handle, get_template_directory_uri() . '/assets/js/blocks/' . $row_layout . '.js', array( 'jquery' ), '2021', true);
                wp_localize_script($js_handle, 'beloadmore', $args);
            }
            $template = locate_template('/inc/blocks/' . $row_layout . '.php');
            if ( $template ) {
                include $template;
            }
        }
    }
}

register_nav_menus( array(
	'footer_one' => __( 'Footer One', 'site-theme' ),
) );

add_image_size('banner', 1400, 470, true);


// add acf options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width' => 150,
        'height' => 150,
        'crop' => 0,
    );
} );

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' );
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Add to bag', 'woocommerce' );
}
add_filter( 'woocommerce_show_variation_price', '__return_true' );


function woocommerce_add_cart_alert($message, $product_id) {
    $new_message = str_replace('basket', 'bag', $message);

	return $new_message;
}
add_filter('wc_add_to_cart_message', 'woocommerce_add_cart_alert', 10, 2);


function misha_description_heading( $heading ){

	return 'About this item';

}
add_filter( 'woocommerce_product_description_heading', 'misha_description_heading' );


function misha_additional_info_heading( $heading ){

	return 'Features';

}
add_filter( 'woocommerce_product_additional_information_heading', 'misha_additional_info_heading' );


// remove tabs from woocommerce product tabs
function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );


// Add features tab to woocommerce product tabs
function woo_new_product_tab( $tabs ) {
	global $product, $post;

	$features = get_field('product_features');

	// Adds the new tab

	if ($features) {
		$tabs['test_tab'] = array(
			'title' 	=> __( 'Features', 'woocommerce' ),
			'priority' 	=> 10,
			'callback' 	=> 'woo_new_product_tab_content'
		);
	}

	return $tabs;

}
function woo_new_product_tab_content() {
	global $product, $post;

	$features = get_field('product_features');

	// The new tab content
	echo '<h2>Features</h2>';
	echo '<ul>';
	foreach ($features as $feature) {
		echo '<li>- ' . $feature['product_feature'] . '</li>';
	}
	echo '</ul>';

}
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );

add_filter ( 'woocommerce_account_menu_items', 'misha_remove_my_account_links' );
function misha_remove_my_account_links( $menu_links ){


	// unset( $menu_links['dashboard'] ); // Remove Dashboard
	// unset( $menu_links['payment-methods'] ); // Remove Payment Methods
	// unset( $menu_links['orders'] ); // Remove Orders
	unset( $menu_links['downloads'] ); // Disable Downloads
	// unset( $menu_links['edit-address'] ); // Addresses
	// unset( $menu_links['edit-account'] ); // Remove Account details tab
	// unset( $menu_links['customer-logout'] ); // Remove Logout link

	return $menu_links;

}

function custom_empty_cart_message() {
	echo '<p class="cart-empty woocommerce-info">' . wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'Your bag is currently empty.', 'woocommerce' ) ) ) . '</p>';
}
remove_action('woocommerce_cart_is_empty', 'wc_empty_cart_message', 10);
add_action('woocommerce_cart_is_empty', 'custom_empty_cart_message', 10);
