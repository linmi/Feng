<?php

function simplent_layout_options( $wp_customize ) {

	$wp_customize->add_section( 'simplent_layout_section', array(
		'title'                 =>  esc_html__( 'Layout Settings', 'simplent' ),
		'panel'                 =>  'simplent_panel'
	) );

	$wp_customize->add_setting( 'simplent_layout_options_setting', array(
		'default'               =>  'right-sidebar',
		'sanitize_callback'     =>  'simplent_layout_option_sanitize',
		'transport'             =>  'refresh'
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'layout_options_input',
			array(
				'label'         =>  esc_html__( 'Site Layout', 'simplent' ),
				'section'       =>  'simplent_layout_section',
				'settings'      =>  'simplent_layout_options_setting',
				'type'          =>  'radio',
				'choices'       =>  array(
					'left-sidebar'      =>  esc_html__( 'Sidebar Left', 'simplent' ),
					'right-sidebar'     =>  esc_html__( 'Sidebar Right', 'simplent' ),
					'no-sidebar'        =>  esc_html__( 'No Sidebar', 'simplent' )
				)
			)
		)
	);

}