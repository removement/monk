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
		$block_styles = array(
			'core/list' => array(
				'no-bullets' => __( 'No Bullets', __NAMESPACE__ )
			),
			'core/code' => array(
				'dark' => __( 'Dark', __NAMESPACE__ )
			),
			'core/details' => array(
				'gray' => __( 'Gray', __NAMESPACE__ ),
				'dark' => __( 'Dark', __NAMESPACE__ )
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
endif;
add_action( 'init', __NAMESPACE__ . '\block_styles' );