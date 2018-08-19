<?php

if( ! function_exists( 'simplent_layout_option_sanitize' ) ) :
function simplent_layout_option_sanitize( $layout ) {

	if( ! in_array( $layout, array( 'right-sidebar', 'left-sidebar', 'no-sidebar' ) ) ) {
		$layout = 'right-sidebar';
	}

	return $layout;
}
endif;

if( ! function_exists( 'simplent_search_icon_sanitize' ) ) :
function simplent_search_icon_sanitize( $search_icon ) {

	if( ! in_array( $search_icon, array( 0, 1 ) ) ) {
		$search_icon = 1;
	}

	return $search_icon;
}
endif;

if( ! function_exists( 'simplent_gallery_carousel_sanitize' ) ) :
function simplent_gallery_carousel_sanitize( $carousel ) {

	if( ! in_array( $carousel, array( 0, 1 ) ) ) {
		$carousel = 0;
	}

	return $carousel;
}
endif;