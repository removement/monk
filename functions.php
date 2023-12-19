<?php
/**
* @package Monk
* @link    https://removement.com/
* @since Monk 0.6.0
*/

namespace monk;

/**
 * Enqueue styles.
 */
function enqueue_style_sheet() {
	wp_enqueue_style( sanitize_title( __NAMESPACE__ ), get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_style_sheet' );


/**
* Sets up theme defaults and registers support for various WordPress features.
* @since Monk 0.6.0
* @return void
*/


function setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'monk', get_template_directory() . '/languages' );

	// Enqueue editor styles.
	add_editor_style( get_template_directory_uri() . '/style.css' );

	// Disable core block inline styles.
	add_filter( 'should_load_separate_core_block_assets', '__return_false' );

	// Remove core patterns.
	remove_theme_support( 'core-block-patterns' );

}
add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );


/**
 * Register block styles.
 * @since 0.6.0
 */
if ( ! function_exists( 'block_styles' ) ) :
	function block_styles() {

		register_block_style(
			'core/list',
			array(
				'name'         => 'no-bullets',
				'label'        => __( 'No Bullets', __NAMESPACE__ ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-no-bullets,
				ol.is-style-no-bullets {
					padding-left: 0;
				}
				
				ul.is-style-no-bullets li:not(:first-child),
				ol.is-style-no-bullets li:not(:first-child) {
					margin-top: var(--wp--preset--spacing--1-small)
				}',

			)
		);
		
	}
endif;
add_action( 'init', __NAMESPACE__ . '\block_styles' );