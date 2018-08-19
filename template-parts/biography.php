<?php
/**
 * The template part for displaying an Author biography
 *
 * @since Simplent 1.0
 */
?>

<div class="entry-author-info clearfix">
	<div class="author-avatar">
		<?php
		/**
		* Filter the Simplent author bio avatar size.
		*
		* @since Simplent 1.0
		*
		* @param int $size The avatar height and width size in pixels.
		*/

		$author_bio_avatar_size = apply_filters( 'simplent_author_bio_avatar_size', 72 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<p class="author-title">
			<?php echo get_the_author_posts_link(); ?>
		</p>
		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->
	</div><!-- .author-description -->
</div><!-- .author-info -->
