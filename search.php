<?php get_header(); ?>

<?php
/**
 * Simplent Layout Options
 */
$simplent_site_layout    =   get_theme_mod( 'simplent_layout_options_setting' );
$simplent_layout_class   =   'col-md-8 col-sm-12';

if( $simplent_site_layout == 'left-sidebar' && is_active_sidebar( 'sidebar-1' ) ) :
	$simplent_layout_class = 'col-md-8 col-sm-12 site-main-right';
elseif( $simplent_site_layout == 'no-sidebar' || !is_active_sidebar( 'sidebar-1' ) ) :
	$simplent_layout_class = 'col-md-8 col-sm-12 col-md-offset-2';
endif;

?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main <?php echo esc_attr($simplent_layout_class); ?>" role="main">

			<?php
			if( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
                        <?php
                        /* translators: %s: search query */
                        printf( esc_attr__( 'Search Results for: %s', 'simplent') , '<span>' . esc_html( get_search_query() ) . '</span>' );
                        ?>
                    </h1>
				</header>

				<?php
				// Start the loop
				while( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

					// End the loop
				endwhile;

				simplent_page_navigation();

			else :
			get_template_part( 'template-parts/content', 'none' );
			?>
			<?php endif; ?><!-- have_post() -->

		</main><!-- .site-main -->
		<?php get_sidebar(); ?>
	</div><!-- content-area -->

<?php get_footer(); ?>