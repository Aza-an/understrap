<?php

    get_header();

    $banner         = get_field('main_banner');
    $banner_type    = $banner['main_banner_type'];
    $image          = $banner['main_banner_image'];
    $image_mob      = $banner['main_banner_image_mob'];
    $pre_title      = $banner['main_banner_pre_title'];
    $title          = $banner['main_banner_title'];
    $title_colour   = $banner['main_banner_title_colour'];
    $text           = $banner['main_banner_text'];
    $text_colour    = ' ' . $banner['main_banner_text_colour'];
    $button         = $banner['main_button'];
    $link           = $banner['main_button_link'];
    $button_colour  = ' ' . $banner['main_button_colour'];
    $button_text    = $banner['main_button_text'];

?>

<?php if ($image) : ?>
    <?php if ($banner_type == 'content') : ?>
        <section class="home-banner" style="background-image: url(<?=$image['sizes']['banner']?>);">
            <div class="container">
                <div class="banner-content<?=$text_colour?>">
                    <h3><?=$pre_title?></h3>
                    <h1 class="<?=$title_colour?>"><?=$title?></h1>
                    <p><?=$text?></p>
                <?php if ($button) : ?>
                    <a href="<?=$link?>" class="btn<?=$button_colour?>"><?=$button_text ? $button_text : 'SHOP NOW'?></a>
                <?php endif; ?>
                </div>
            </div>
        </section>
    <?php else : ?>
        <section class="home-banner<?=$image_mob ? ' desktop-only' : ''?>">
            <a href="<?=$link?>" class="banner-image-link">
                <img src="<?=$image['sizes']['banner']?>" />
            </a>
        </section>
        <?php if ($image_mob) : ?>
            <section class="home-banner mobile-only">
                <a href="<?=$link?>" class="banner-image-link">
                    <img src="<?=$image_mob['sizes']['banner']?>" />
                </a>
            </section>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

<?php get_page_structure('page_sections'); ?>

<?php get_footer(); ?>
