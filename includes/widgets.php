<?php

function simplent_widgets_init() {
	register_sidebar( array(
		'name'              =>  esc_html__( 'Sidebar', 'simplent' ),
		'id'                =>  'sidebar-1',
		'description'       =>  esc_html__( 'Add widgets here to appear in your sidebar.', 'simplent' ),
		'before_widget'     =>  '<section id="%1$s" class="widget %2$s">',
		'after_widget'      =>  '</section>',
		'before_title'      =>  '<h4 class="widget-title">',
		'after_title'       =>  '</h4>'
	) );
}