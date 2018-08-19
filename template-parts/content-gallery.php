<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
		<?php the_title( sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <div class="entry-info">
			<?php simplent_entry_meta(); ?>
        </div>
    </header>

    <div class="entry-content">
        <?php if( get_post_gallery() ) : ?>
        <div class="entry-gallery">
            <?php
            $gallery_carousel_handle    =   get_theme_mod( 'simplent_gallery_carousel_handle' );
            if( $gallery_carousel_handle ) :
            $gallery    =   get_post_gallery( get_the_ID(), false );
            ?>
                <?php if( isset($gallery['size']) == "full" ) : ?>
                    <div id="carousel-gallery-<?php echo get_the_ID(); ?>" class="carousel slide" data-interval="false">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        $count_indicators   =   0;
                        foreach( $gallery['src'] as $src ) : ?>
                        <li data-target="#carousel-gallery-<?php echo get_the_ID(); ?>" class="<?php echo ($count_indicators == 0) ? 'active' : 'none'; ?>" data-slide-to="<?php echo $count_indicators; ?>"></li>
                        <?php $count_indicators++; endforeach; ?>
                    </ol>

                    <!-- Wrapper for slides -->

                    <div class="carousel-inner" role="listbox">
                        <?php
                        $count_images  =   0;

                        foreach( $gallery['src'] as $src ) :
                            ?>
                            <div class="item<?php echo ($count_images == 0) ? ' active' : ''; ?>">
                                <img src="<?php echo esc_attr($src); ?>" alt="...">
                            </div>
                        <?php $count_images++; endforeach; ?>
                    </div>


                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-gallery-<?php echo get_the_ID(); ?>" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-gallery-<?php echo get_the_ID(); ?>" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <?php endif;
            else :
                echo get_post_gallery( get_the_ID(), true );
            endif; ?>

        </div>
        <?php endif; ?>

        <?php simplent_excerpt(); ?>
    </div><!-- .entry-content -->

	<?php simplent_entry_footer(); ?>

</article>