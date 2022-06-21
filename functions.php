<?php
/**
 * WordPress Workshop Theme Functions
 *
 * @package WordPress Workshop
 */

/**
 * Enqueue theme style
 */
add_action( 'wp_enqueue_scripts', 'wp_learn_enqueue_scripts' );
/**
 * Enqueue scripts callback
 */
function wp_learn_enqueue_scripts() {
	wp_enqueue_style( 'wordpress-theme-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0' );
}

add_action( 'after_setup_theme', 'wp_learn_setup_theme' );
function wp_learn_setup_theme() {
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
}

add_filter( 'the_content', 'wp_learn_the_content', 9999 );
function wp_learn_the_content( $content ) {
	// do something with $content
	$additional_content = '<!-- wp:paragraph --><p>Filtered through <i>the_content</i></p><!-- /wp:paragraph -->';
	$content            = $content . $additional_content;
	return $content;
}

add_action( 'save_post', 'wp_learn_amend_post_meta', 10, 3 );
function wp_learn_amend_post_meta( $post_ID, $post, $update ) {
	if ( true === $update ) {
		update_post_meta( $post_ID, 'post_saved', date( 'Y-m-d H:i:s' ) );
	}
}

add_filter( 'body_class', 'my_body_class', 10, 2 );
function my_body_class( $classes, $class ) {
	error_log( print_r( array( $classes, $class ), true ) );
	return $classes;
}