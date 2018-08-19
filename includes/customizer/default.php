<?php

function simplent_customizer_default_settings( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         =   'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  =   'postMessage';

	if( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname', array(
			'selector'              =>  '.site-title a',
			'container_inclusive'   =>  false,
			'render_callback'       =>  'simplent_customize_partial_blogname'
		)   );
		$wp_customize->selective_refresh->add_partial(
			'blogdescription', array(
			'selector'              =>  '.site-description',
			'container_inclusive'   =>  false,
			'render_callback'       =>  'simplent_customize_partial_blogdescription'
		)   );
	}

}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Simplent 1.0
 * @see simplent_customize_register()
 *
 * @return void
 */
function simplent_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Simplent 1.0
 * @see simplent_customize_register()
 *
 * @return void
 */
function simplent_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function simplent_header_style() {

	$header_text_color = get_header_textcolor();
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}
	?>
	<style id="simplent-custom-header-styles" type="text/css">
    .site-branding .site-title a,
    .site-description {
        color: #<?php echo esc_attr( $header_text_color ); ?>;
    }
	</style>

	<?php

	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	}

	// If the header text has been hidden.
	?>
	<style type="text/css" id="header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		.site-branding .site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	</style>
	<?php
}