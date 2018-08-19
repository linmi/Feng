<?php

function simplent_misc_options( $wp_customizer ) {

	/**
	 * Simplent Misc Options Section
	 */
	$wp_customizer->add_section( 'simplent_misc_section', array(
		'title'                 =>  esc_html__( 'Misc Settings', 'simplent' ),
		'panel'                 =>  'simplent_panel'
	) );

	/**
	 * Search Icon
	 */
	$wp_customizer->add_setting( 'simplent_search_icon_handle', array(
		'default'               =>  1,
		'sanitize_callback'     =>  'simplent_search_icon_sanitize',
		'transport'             =>  'refresh'
	) );
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'simplent_search_icon_input',
			array(
				'label'         =>  esc_html__( 'Show Search Icon', 'simplent' ),
				'section'       =>  'simplent_misc_section',
				'settings'      =>  'simplent_search_icon_handle',
				'type'          =>  'checkbox'
			)
		)
	);

	/**
	 * Gallery Carousel
	 */
	$wp_customizer->add_setting( 'simplent_gallery_carousel_handle', array(
		'default'               =>  0,
		'sanitize_callback'     =>  'simplent_gallery_carousel_sanitize',
		'transport'             =>  'refresh'
	) );
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'simplent_lightbox_input',
			array(
				'label'         =>  esc_html__( 'Gallery Carousel', 'simplent' ),
				'description'   =>  esc_html__( 'Enable gallery carousel on gallery images. It will only work on home page with full size gallery images.', 'simplent' ),
				'section'       =>  'simplent_misc_section',
				'settings'      =>  'simplent_gallery_carousel_handle',
				'type'          =>  'checkbox'
			)
		)
	);

}

function simplent_social_search_check() {
	$simplent_facebook_handle       =   get_theme_mod( 'simplent_facebook_handle' );
	$simplent_twitter_handle        =   get_theme_mod( 'simplent_twitter_handle' );
	$simplent_google_plus_handle    =   get_theme_mod( 'simplent_google_plus_handle' );
	$simplent_linkedin_handle       =   get_theme_mod( 'simplent_linkedin_handle' );
	$simplent_instagram_handle      =   get_theme_mod( 'simplent_instagram_handle' );
	$simplent_pinterest_handle      =   get_theme_mod( 'simplent_pinterest_handle' );
	$simplent_email_handle          =   get_theme_mod( 'simplent_email_handle' );
	$simplent_search_icon_handle    =   get_theme_mod( 'simplent_search_icon_handle', 1 );

	if( $simplent_facebook_handle || $simplent_twitter_handle || $simplent_google_plus_handle || $simplent_linkedin_handle || $simplent_instagram_handle || $simplent_pinterest_handle || $simplent_email_handle || $simplent_search_icon_handle ) :
		return 1;
	else :
		return 0;
	endif;

}