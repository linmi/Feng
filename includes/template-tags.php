<?php

/**
 * Displays an optional post thumbnail.
 *
 * @since Simplent 1.0
 */
function simplent_post_thumbnail() {
	if( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if( is_singular() ) : ?>

		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->

	<?php else : ?>

		<a class="entry-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php the_post_thumbnail( 'post-thumbnail', array(
				'alt'       =>  the_title_attribute( 'echo=0' )
			) ); ?>
		</a>

	<?php endif; // End is_singular()
}

/**
 * Displays the optional excerpt.
 *
 * @since Simplent 1.0
 */
function simplent_excerpt( $class = 'entry-summary' ) {
    $class = esc_attr( $class );

    if( ! is_single() ) : ?>
        <div class="<?php echo $class; ?>">
            <?php the_excerpt(); ?>
        </div>
    <?php endif;
}

/**
 * Prints HTML with meta information
 *
 * @since Simplent 1.0
 */
function simplent_entry_meta() {

    $author_id  =   get_the_author_meta( 'ID' );
    $author_url =   get_author_posts_url( $author_id );

	// printf( '<span class="author-info"><a href="%1$s">%2$s</a></span>', $author_url, get_the_author_meta( 'display_name', $author_id ) );

	simplent_entry_date();
	simplent_entry_footer();

}

function simplent_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"> %2$s</span>',
		esc_attr_x( 'Posted on', 'Used before publish date.', 'simplent' ),
		$time_string
	);
}

function simplent_page_navigation() {

    if( get_next_posts_link() || get_previous_posts_link() ) :
    ?>

        <div class="pagination">
            <span class="nav-next pull-left"><?php previous_posts_link( '&larr; ' . esc_attr__( 'Newer posts', 'simplent' ) ); ?></span>
            <span class="nav-previous pull-right"><?php next_posts_link( esc_attr__( 'Older posts', 'simplent' ) . ' &rarr;' ); ?></span>
        </div>

<?php
    endif;
}

function simplent_entry_footer() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = __( ', ', 'simplent' );

	// Get Categories for posts.
    $categories_list = get_the_category_list( $separate_meta );

	// Get Tags for posts.
    // $tags_list = get_the_tag_list( '', $separate_meta );

	// We don't want to output .entry-footer if it will be empty, so make sure its not.
    if( ( $categories_list || $tags_list ) || get_edit_post_link() ) :

        // echo '<footer class="entry-footer clearfix">';

        //if( 'post' === get_post_type() && is_single() ) {

            if( $categories_list || $tags_list ) {

                    // echo '<span class="cat-tags-links">';

	                // Make sure there's more than one category before displaying.
                    if( $categories_list ) {
                        echo '<span class="cat-links">' . '<span class="screen-reader-text">' . esc_attr__( 'Categories', 'simplent' ) . '</span>' . $categories_list . '</span>';
                    }

	            if( 'post' === get_post_type() && is_single() ) {
		            if ( $tags_list ) {
			            echo '<span class="tags-links">' . '<span class="screen-reader-text">' . esc_attr__( 'Tags', 'simplent' ) . '</span>' . $tags_list . '</span>';
		            }
	            }

                    // echo '</span>';

                }

        //}

	    edit_post_link(
		    sprintf(
		    /* translators: %s: Name of current post */
			    __( '编辑文章<span class="screen-reader-text"> "%s"', 'simplent' ),
			    get_the_title()
		    ),
		    '<span class="edit-link">',
		    '</span>'
	    );

        // echo '</footer>';

    endif;
}

function simplent_custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'simplent_custom_excerpt_more' );