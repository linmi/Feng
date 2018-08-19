<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-info">
			<?php simplent_entry_meta(); ?>
		</div>
	</header>

    <div class="entry-content">
	    <?php
	    $content    =   apply_filters( 'the_content', get_the_content() );
	    $video      =   false;
	    if( !strpos( $content, 'wp-playlist-script' ) ) {
		    $video  =   get_media_embedded_in_content( $content, array(
			    'video', 'object', 'embed', 'iframe'
		    ) );
	    }
	    if( $video ) {
		    printf( '<div class="entry-video">%1$s</div>', $video[0] );
	    }
	    ?>
	    <?php simplent_excerpt(); ?>
	    <?php simplent_entry_footer(); ?>
    </div><!-- .entry-content -->
</article>
