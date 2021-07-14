<?php
    $hide_the_title = get_field('hide_the_page_title');
    $banner_image   = get_field('page_banner');
    get_header();
?>

<div class="title-block">
    <div class="container">
        <h1 class="page-title"><?=get_the_title()?></h1>
    </div>
</div>
<?php while ( have_posts() ) : the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; // end of the loop. ?>
<?php
	if (get_page_structure('page_sections')) {
		get_page_structure('page_sections');
	}
?>

<?php get_footer(); ?>
