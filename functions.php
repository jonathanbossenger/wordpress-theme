<?php
// theme functions

/**
 * Enqueue theme style
 */
wp_enqueue_style( 'wordpress-theme-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0' );

/**
 * Add theme supports, through the after_setup_theme action
 *
 * https://developer.wordpress.org/reference/hooks/after_setup_theme/
 */
add_action( 'after_setup_theme', 'wp_learn_theme_setup' );
function wp_learn_theme_setup() {
	/**
	 * Add theme support for a specific feature
	 *
	 * https://developer.wordpress.org/reference/functions/add_theme_support/
	 */
	add_theme_support(
		'post-formats',
		array(
			'link',
			'aside',
			'gallery',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		)
	);
}

/**
 * Modify the post content through the_content filter
 *
 * https://developer.wordpress.org/reference/hooks/the_content/
 */
add_filter( 'the_content', 'wp_learn_amend_content' );
function wp_learn_amend_content( $content ) {
	$additional_content = '<!-- wp:paragraph --><p>Filtered through <i>the_content</i></p><!-- /wp:paragraph -->';
	$content            = $content . $additional_content;

	return $content;
}