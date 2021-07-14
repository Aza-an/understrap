<?php
    $title      = get_sub_field('cat_display_title');
    $bg_colour  = ' ' . get_sub_field('cat_display_bg');
    $categories = get_sub_field('cat_display_categories');
?>

<section class="cat-display-block section-padding<?=$bg_colour?>">
    <div class="container">
        <?php if ($title) : ?>
            <h3 class="section-title"><?=$title?></h3>
        <?php endif; ?>

        <div class="categories">
        <?php foreach($categories as $category) : ?>
            <?php
                $link       = get_term_link($category, 'product_cat');
                $image_id   = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
                $image      = wp_get_attachment_url($image_id);
                $title      = $category->name;
            ?>
            <div class="category">
                <a href="<?=$link?>" style="background-image: url(<?=$image?>);">
                    <div class="overlay"></div>
                    <h2><?=$title?></h2>
                </a>
            </div>
        <?php endforeach; ?>
        </div>

    </div>
</section>
