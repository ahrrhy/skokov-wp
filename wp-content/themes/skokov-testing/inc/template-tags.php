<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package skokov-testing
 */

if ( ! function_exists( 'skokov_testing_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function skokov_testing_posted_on() {

	$time_string = sprintf(
		esc_attr( get_the_date( 'M. d, Y' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'M. d, Y' ) ),
		esc_html( get_the_modified_date() )
	);

	$byline = sprintf(
        esc_html_x( 'by %s', 'post author', 'skokov-testing' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'skokov-testing' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '</span><span class="byline"><i class="fa fa-heart" aria-hidden="true">0</i> ' . $byline . ' / </span> <span class="comments"> 0 comments </span>/' . '<span class="posted-on"> ' . $posted_on; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'skokov_testing_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function skokov_testing_entry_footer() {
	// Hide category and tag text for pages.
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'skokov-testing' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function skokov_testing_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'skokov_testing_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'skokov_testing_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so skokov_testing_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so skokov_testing_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in skokov_testing_categorized_blog.
 */
function skokov_testing_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'skokov_testing_categories' );
}
add_action( 'edit_category', 'skokov_testing_category_transient_flusher' );
add_action( 'save_post',     'skokov_testing_category_transient_flusher' );
