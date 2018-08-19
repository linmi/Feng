<?php

function simplent_theme_setup() {

	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Simplent 1.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'custom-header', apply_filters( 'custom_header_args', array(
		'default-text-color'     => '#000',
		'width'                  => 1200,
		'height'                 => 280,
		'flex-height'            => true,
		'wp-head-callback'       => 'simplent_header_style',
	) ) );

	$defaults = array(
		'default-color'          => '#fff',
		'default-repeat'         => 'no-repeat',
		'default-position-x'     => 'center',
		'wp-head-callback'       => '_custom_background_cb',
	);
	add_theme_support( 'custom-background', $defaults );

	add_theme_support( 'screen-reader-text' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery', 'caption' ) );

	/**
	 * Post Formats
	 */
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );


	register_nav_menu(
		'primary',
		__( 'Primary Menu', 'simplent' )
	);

	$simplent_editor_font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800|Noto+Sans:400,400i,700,700i|Merriweather:300,300i,400,400i,700,700i,900,900i' );
	add_editor_style( $simplent_editor_font_url );

	add_editor_style( get_template_directory_uri() . '/assets/css/editor-style.css' );

	if ( ! isset( $content_width ) ) $content_width = 1200;
}

function simplent_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	return $classes;
}
add_filter( 'body_class', 'simplent_body_classes' );


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Simplent 1.0
 */
function simplent_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'simplent_javascript_detection', 0 );