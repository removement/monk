<?php
/**
* @package Monk
* @link    https://removement.com/
* @since Monk 0.6.0
*/

/*
* Enqueue the theme style sheet
*/
function monk_enqueue_styles() {

	wp_enqueue_style( 'monk', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

}
add_action( 'wp_enqueue_scripts', 'monk_enqueue_styles' );


/**
* Sets up theme defaults and registers support for various WordPress features.
* @since Monk 0.6.0
* @return void
*/

if ( ! function_exists( 'monk_setup' ) ) {

	function monk_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'monk', get_template_directory() . '/languages' );

		// Enqueue editor styles.
		add_editor_style( get_template_directory_uri() . '/style.css' );

		// Disable core block inline styles.
		add_filter( 'should_load_separate_core_block_assets', '__return_false' );

		// Remove core patterns.
		remove_theme_support( 'core-block-patterns' );

	}
}
add_action( 'after_setup_theme', 'monk_setup' );


/**
 * Register block styles.
 * @since 0.6.0
 */
function monk_register_block_styles() {

	$block_styles = array(
		'core/list'  => array(
			'no-bullets' => __( 'No Bullets', 'monk' ),
		),
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}
}
add_action( 'init', 'monk_register_block_styles' );