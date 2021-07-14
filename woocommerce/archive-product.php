<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_search() && ( $wp_query->post_count == 1 ) && ( $wp_query->post->ID == get_search_query() ) ) {

	wp_safe_redirect( get_permalink( $wp_query->post->ID ) );

}
    $term = get_queried_object();

	if (isset($term->term_id)) {
		$term_id = $term->term_id;
		$category_title = $term->name;
	    $page_content = get_field('page_content', $term);
	    $category_description = category_description($term);
	} else {
		$category_description = false;
	}

	//print_nice($term);
    get_header( );

?>

<div class="container">
    <?php do_action( 'woocommerce_before_main_content' );?>
</div>

<?php if ( is_shop() ) : ?>
	<?php
		$post_12 = get_post(8);
        $content = apply_filters('the_content', $post_12->post_content);
	?>
	<section class="banner section-padding bg-lightgrey">
	       <div class="container clearfix">
	              <h1 class="page-title"><?php echo get_the_title( 8 ); ?></h1>
			<div class="content">
                <?=$content;?>
            </div>
	       </div>
	</section>
<?php else: ?>
    <section class="banner section-padding bg-lightgrey">
	       <div class="container clearfix">
	              <h1 class="page-title"><?=$category_title?></h1>
		<?php if ($category_description) : ?>
			<div class="content">
                <?=$category_description?>
            </div>
		<?php endif; ?>
	   </div>
	</section>
<?php endif; ?>

	<section class="product-page section-padding">
		<div class="container">
	           <div class="product-main-wrapper">
				<?php if ( woocommerce_product_loop() ) : ?>

					<?php if ( is_search() ) : ?>

						<div class="search-query">
							Searching for
							<a class="link" href="<?=esc_url( remove_query_arg('s') )?>" aria-label="Remove">
								<i class="fa fa-times"></i>
								<span class="query"><?=ucwords( get_search_query() )?></span>
							</a>
						</div>
					<?php endif; ?>

                    <div class="col-12 before-shop">
                        <?php do_action( 'woocommerce_before_shop_loop' ); ?>
						<div class="sidebar-wrapper clearfix">
							<div class="overlay"></div>
	                           <?php do_action( 'woocommerce_sidebar' ); ?>
	                          </div>
                          </div>

					<?php woocommerce_product_loop_start(); ?>

                    <?php
                        if ( wc_get_loop_prop( 'total' ) ) {
                            while ( have_posts() ) {
                                the_post();

                                /**
                                * Hook: woocommerce_shop_loop.
                                *
                                * @hooked WC_Structured_Data::generate_product_data() - 10
                                */
                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'product' );

                            }
                        }

                        woocommerce_product_loop_end();

                        /**
                        * Hook: woocommerce_after_shop_loop.
                        *
                        * @hooked woocommerce_pagination - 10
                        */
                        do_action( 'woocommerce_after_shop_loop' );
                    ?>
             <?php else : ?>
                 <?php
            /**
            * Hook: woocommerce_no_products_found.
            *
            * @hooked wc_no_products_found - 10
            */

                    ?>


                    <div class="col-xs-12 col-sm-9 col-md-9" >
                        <?php do_action( 'woocommerce_no_products_found' ); ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>

</section>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
