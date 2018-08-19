<?php get_header(); ?>

<?php
/**
 * Simplent Layout Options
 */
$simplent_site_layout    =   get_theme_mod( 'simplent_layout_options_setting' );
$simplent_layout_class   =   'col-md-8 col-sm-12';

if( $simplent_site_layout == 'left-sidebar' && is_active_sidebar( 'sidebar-1' ) ) :
	$simplent_layout_class = 'col-md-8 col-sm-12  site-main-right';
elseif( $simplent_site_layout == 'no-sidebar' || !is_active_sidebar( 'sidebar-1' ) ) :
	$simplent_layout_class = 'col-md-8 col-sm-12 col-md-offset-2';
endif;

?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main <?php echo esc_attr($simplent_layout_class); ?>" role="main">

			<?php
			// Start the loop
			while( have_posts() ) : the_post();

                // Include the single post content template.
                get_template_part( 'template-parts/content', 'single' );

                if( is_singular( 'attachment' ) ) {
	                // Parent post navigation.
                    the_post_navigation( array(
                            'prev_text'     =>  _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'simplent' ),
                    ) );
                } elseif( is_singular( 'post' ) ) {
	                // Previous/next post navigation.
                    the_post_navigation( array(
                            'next_text'     =>  '<span class="meta-nav" aria-hidden="true">' . __( '下一篇', 'simplent' ) . '</span>' . '<span class="screen-reader-text">' . __( 'Next post:', 'simplent' ) . '</span> ' . '<span class="post-title">%title</span>' ,
                            'prev_text'     =>  '<span class="meta-nav" aria-hidden="true">' . __( '上一篇', 'simplent' ) . '</span>' . '<span class="screen-reader-text">' . __( 'Previous post:', 'simplent' ) . '</span> ' . '<span class="post-title">%title</span>' ,
                    ) );
                }

                // If comments are open or we have at least one comment, load up the comment template.
                if( comments_open() || get_comments_number() ) {
                    comments_template();
                }

            // End the loop
			endwhile;

			?>

		</main><!-- .site-main -->
		<?php get_sidebar(); ?>
	</div><!-- content-area -->

<?php get_footer(); ?>