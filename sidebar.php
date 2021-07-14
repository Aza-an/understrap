<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php if ( is_active_sidebar( 'filters' ) ) : ?>
<div class="sidebar primary-sidebar widget-area">
    <?php dynamic_sidebar( 'filters' ); ?>
</div>
<?php endif; ?>
