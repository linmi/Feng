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
		    $audio  =   get_media_embedded_in_content( $content, array(
			    'audio', 'iframe'
		    ) );
	    }
	    if( $audio ) {
		    printf( '<div class="entry-audio">%1$s</div>', $audio[0] );
	    }
	    ?>
	    <?php simplent_excerpt(); ?>
    </div><!-- .entry-content -->

    <?php simplent_entry_footer(); ?>

</article>
