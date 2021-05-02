<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trizen
 */

if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
    <div class="sidebar mb-0">
	    <?php dynamic_sidebar( 'blog-sidebar' ); ?>
    </div>
</aside><!-- #secondary -->
