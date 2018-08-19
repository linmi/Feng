<?php

// Includes
include( get_template_directory() . '/includes/setup.php' );
include( get_template_directory() . '/includes/widgets.php' );
include( get_template_directory() . '/includes/template-tags.php' );
include( get_template_directory() . '/includes/front/enqueue.php' );

include( get_template_directory() . '/includes/theme-customizer.php' );
include( get_template_directory() . '/includes/customizer/sanitize.php' );
include( get_template_directory() . '/includes/customizer/default.php' );
include( get_template_directory() . '/includes/customizer/layout.php' );
include( get_template_directory() . '/includes/customizer/misc.php' );
include( get_template_directory() . '/includes/customizer/social.php' );


// Hooks
add_action( 'after_setup_theme', 'simplent_theme_setup' );
add_action( 'widgets_init', 'simplent_widgets_init' );
add_action( 'wp_enqueue_scripts', 'simplent_theme_enqueue' );
add_action( 'customize_register', 'simplent_customize_register' );