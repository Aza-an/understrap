<?php
    $title      = get_sub_field('product_display_title');
    $bg_colour  = ' ' . get_sub_field('product_display_bg');
    $products   = get_sub_field('product_display_products');
?>

<section class="products-section section-padding<?=$bg_colour?>">
    <div class="container">
    <?php if ($title) : ?>
        <h3 class="section-title"><?=$title?></h3>
    <?php endif; ?>

        <div class="row">
        <?php foreach ($products as $product_id) : ?>
            <?php
                $product        = wc_get_product($product_id);
                $link           = get_permalink($product_id);
                $image_id       = $product->get_image_id();
                $image          = wp_get_attachment_image($image_id, 'large');
                $product_title  = $product_id->post_title;
                $price          = $product->get_price();
                // $colours        = $product->get_variation_attributes()['Colour'];
                // $sizes          = $product->get_variation_attributes()['Size'];
                // $variations     = $product->get_available_variations();
                // print_nice($price);
            ?>
            <div class="col-sm-6 col-lg-3">
                <div class="product-card">
                    <a href="<?=$link?>" class="product-image"><?=$image?></a>
                    <div class="product-info">
                        <a href="<?=$link?>" class="product-title"><?=$product_title?></a>
                        <p class="product-price">£<?=$price?></p>
                        <a href="<?=$link?>" class="btn">More information</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        
    </div>
</section>
