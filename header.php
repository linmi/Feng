<!doctype html>
<html <?php language_attributes(); ?>>
<head class="no-js">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php
$simple_search_icon_handle      =   get_theme_mod( 'simple_search_icon_handle', 1 );
if( $simple_search_icon_handle ) :
?>
    <div class="search-popup">
        <span class="search-popup-close"><i class="fa fa-times"></i></span>
        <?php get_search_form(); ?>
    </div><!-- .search-popup -->
<?php endif; ?>

<div id="page" class="site">
    <div class="site-inner">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'simplent' ); ?></a>

        <header id="masthead" class="site-header" role="banner">

        <?php if( simplent_social_search_check() == 1 ) : ?>
            <div class="container">
                <div class="header-links">
                    <?php if( get_theme_mod( 'simplent_search_icon_handle', 1 ) ) : ?>
                        <span class="btn-search fa fa-search icon-button-search"></span>
                    <?php endif; ?>
	                <?php simplent_social_icons_output(); ?>
                </div><!-- .header-link -->
            </div>
        <?php endif; ?>

        <div class="site-header-main">
            <div class="site-branding">
                <?php if( function_exists( 'the_custom_logo' ) ) : the_custom_logo(); endif;

                if( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </h1>
                <?php else : ?>
                    <p class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </p>
                <?php endif;
                $description = get_bloginfo( 'description', 'display' );
                if( $description || is_customize_preview() ) :
                ?>
                    <p class="site-description"><?php echo esc_attr($description); ?></p>
                <?php endif; ?>

            </div><!-- .site-branding -->

            <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <div class="menu-wrapper">
                <button id="menu-toggle" class="menu-toggle toggled-on" aria-expanded="true" aria-controls="site-navigation social-navigation">Menu</button>
                <div id="site-header-menu" class="site-header-menu clearfix">

                        <nav id="site-navigation" class="main-navigation container" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'simplent' ); ?>">
				            <?php
				            wp_nav_menu( array(
					            'theme_location' => 'primary',
					            'menu_class'     => 'primary-menu',
					            'fallback_cb'    =>  false
				            ) );
				            ?>
                        </nav><!-- .main-navigation -->
                </div><!-- .site-header-menu -->
            </div><!-- .menu-wrapper -->
            <?php endif; ?>

        </div><!-- .site-header-main -->


    <?php if( is_front_page() || is_home() ) : if( has_custom_header() ) : ?>
        <!-- Header Image -->
        <div class="header-image"
             style="background-image: url(<?php header_image() ?>);">
        </div>
    <?php endif; endif; ?>

</header>

        <div id="content" class="site-content container">