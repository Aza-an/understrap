<?php
/**
 * The template for displaying search forms
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?=get_permalink(get_option('woocommerce_shop_page_id'))?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search...', 'understrap' ); ?>" value="<?php the_search_query(); ?>">

		<button id="searchsubmit" type="submit" class="btn btn-search">
		    <i class="fas fa-search"></i>
		</button>
	</div>
</form>
