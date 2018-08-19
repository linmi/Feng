<?php

if( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

/**
 * Simplent Layout Options
 */
$simplent_site_layout    =   get_theme_mod( 'simplent_layout_options_setting' );

if( $simplent_site_layout == 'no-sidebar' ) {
	return;
}
?>

<aside id="secondary" class="sidebar widget-area col-md-4 col-sm-12" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- .sidebar .widget-area -->
