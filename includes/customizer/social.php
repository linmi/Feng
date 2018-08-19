<?php

function simplent_social_icons( $wp_customize ) {

	/**
	 * Social Settings Section
	 */
	$wp_customize->add_section( 'simplent_social_section', array(
		'title'                 =>  esc_html__( 'Social Settings', 'simplent' ),
		'panel'                 =>  'simplent_panel'
	) );

	/**
	 * Facebook Social Handle Setting
	 */
	$wp_customize->add_setting( 'simplent_facebook_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
        array(
	        'sanitize_callback'     =>  'esc_url_raw',
        )
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'simplent_facebook_social_input',
			array(
				'label'         =>  esc_html__( 'Facebook', 'simplent' ),
				'section'       =>  'simplent_social_section',
				'settings'      =>  'simplent_facebook_handle',
				'type'          =>  'url'
			)
		)
	);

	/**
	 * Twitter Social Handle Setting
	 */
	$wp_customize->add_setting( 'simplent_twitter_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
		array(
			'sanitize_callback'     =>  'esc_url_raw',
		)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'simplent_twitter_social_input',
			array(
				'label'         =>  esc_html__( 'Twitter', 'simplent' ),
				'section'       =>  'simplent_social_section',
				'settings'      =>  'simplent_twitter_handle',
				'type'          =>  'url'
			)
		)
	);

	/**
	 * Google Plus Social Handle Setting
	 */
	$wp_customize->add_setting( 'simplent_google_plus_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
        array(
	        'sanitize_callback'     =>  'esc_url_raw',
        )
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'simplent_google_plus_social_input',
			array(
				'label'         =>  esc_html__( 'Google Plus', 'simplent' ),
				'section'       =>  'simplent_social_section',
				'settings'      =>  'simplent_google_plus_handle',
				'type'          =>  'url'
			)
		)
	);

	/**
	 * Linkedin Social Handle Setting
	 */
	$wp_customize->add_setting( 'simplent_linkedin_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
		array(
			'sanitize_callback'     =>  'esc_url_raw',
		)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'simplent_linkedin_social_input',
			array(
				'label'         =>  esc_html__( 'Linkedin', 'simplent' ),
				'section'       =>  'simplent_social_section',
				'settings'      =>  'simplent_linkedin_handle',
				'type'          =>  'url'
			)
		)
	);

	/**
	 * Instagram Social Handle Setting
	 */
	$wp_customize->add_setting( 'simplent_instagram_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
		array(
			'sanitize_callback'     =>  'esc_url_raw',
		)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'simplent_instagram_social_input',
			array(
				'label'         =>  esc_html__( 'Instagram', 'simplent' ),
				'section'       =>  'simplent_social_section',
				'settings'      =>  'simplent_instagram_handle',
				'type'          =>  'url'
			)
		)
	);


	/**
	 * Pinterest Social Handle Setting
	 */
	$wp_customize->add_setting( 'simplent_pinterest_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
		array(
			'sanitize_callback'     =>  'esc_url_raw',
		)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'simplent_pinterest_social_input',
			array(
				'label'         =>  esc_html__( 'Pinterest', 'simplent' ),
				'section'       =>  'simplent_social_section',
				'settings'      =>  'simplent_pinterest_handle',
				'type'          =>  'url'
			)
		)
	);

	/**
	 * Email Social Handle Setting
	 */
	$wp_customize->add_setting( 'simplent_email_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
		array(
			'sanitize_callback' => 'sanitize_email'
		)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'simplent_email_social_input',
			array(
				'label'         =>  esc_html__( 'Email', 'simplent' ),
				'section'       =>  'simplent_social_section',
				'settings'      =>  'simplent_email_handle',
				'type'          =>  'email'
			)
		)
	);

}

function simplent_social_icons_output() {
	$simplent_facebook_handle       =   get_theme_mod( 'simplent_facebook_handle' );
	$simplent_twitter_handle        =   get_theme_mod( 'simplent_twitter_handle' );
	$simplent_google_plus_handle    =   get_theme_mod( 'simplent_google_plus_handle' );
	$simplent_linkedin_handle       =   get_theme_mod( 'simplent_linkedin_handle' );
	$simplent_instagram_handle      =   get_theme_mod( 'simplent_instagram_handle' );
	$simplent_pinterest_handle      =   get_theme_mod( 'simplent_pinterest_handle' );
	$simplent_email_handle          =   get_theme_mod( 'simplent_email_handle' );
	$simplent_search_icon_handle    =   (get_theme_mod( 'simplent_search_icon_handle' ) != 0 ? ' vertical-bar' : '');

	if( $simplent_facebook_handle || $simplent_twitter_handle || $simplent_google_plus_handle || $simplent_linkedin_handle || $simplent_instagram_handle || $simplent_pinterest_handle || $simplent_email_handle ) : ?>
		<div class="social-links<?php echo esc_attr($simplent_search_icon_handle); ?>">
			<?php if( $simplent_facebook_handle ) : ?>
				<a href="<?php echo esc_url( $simplent_facebook_handle ); ?>" target="_blank"><span class="fa fa-facebook"></span></a>
			<?php endif; ?>

			<?php if( $simplent_twitter_handle ) : ?>
				<a href="<?php echo esc_url( $simplent_twitter_handle ); ?>" target="_blank"><span class="fa fa-twitter"></span></a>
			<?php endif; ?>

			<?php if( $simplent_google_plus_handle ) : ?>
				<a href="<?php echo esc_url( $simplent_google_plus_handle ); ?>" target="_blank"><span class="fa fa-google-plus"></span></a>
			<?php endif; ?>

			<?php if( $simplent_linkedin_handle ) : ?>
				<a href="<?php echo esc_url( $simplent_linkedin_handle ); ?>" target="_blank"><span class="fa fa-linkedin"></span></a>
			<?php endif; ?>

			<?php if( $simplent_instagram_handle ) : ?>
				<a href="<?php echo esc_url( $simplent_instagram_handle ); ?>" target="_blank"><span class="fa fa-instagram"></span></a>
			<?php endif; ?>

			<?php if( $simplent_pinterest_handle ) : ?>
				<a href="<?php echo esc_url( $simplent_pinterest_handle ); ?>" target="_blank"><span class="fa fa-pinterest"></span></a>
			<?php endif; ?>

			<?php if( $simplent_email_handle ) : ?>
				<a href="mailto:<?php echo sanitize_email($simplent_email_handle); ?>" title="<?php echo esc_attr($simplent_email_handle); ?>"><span class="fa fa-envelope"></span></a>
			<?php endif; ?>
		</div>
	<?php
    else :
	    return null;
	endif;
}