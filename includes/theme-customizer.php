<?php

function simplent_customize_register( $wp_customize ) {

	/**
	 * Simplent Default Customizer Settings
	 */
	simplent_customizer_default_settings( $wp_customize );

	/**
	 * Simplent Social Options
	 */
	simplent_social_icons( $wp_customize );

	/**
	 * Simplent Social Options
	 */
	simplent_misc_options( $wp_customize );

	/**
     * Simplent Theme Options Panel
     */
	$wp_customize->add_panel( 'simplent_panel', array(
        'title'         =>  esc_html__( 'Theme Options', 'simplent' ),
        'priority'      =>  40
    ) );
	simplent_layout_options( $wp_customize );

}

