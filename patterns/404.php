<?php
/**
 * Title: 404
 * Slug: monk/404
 * Inserter: no
 */
?>

<!-- wp:heading {"level":1,"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"}}}} -->
	<h1 style="text-align:center"><?php echo esc_html_x( '404', 'Error code for a webpage that is not found.', 'monk' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
	<p style="text-align:center;margin-top:0;margin-bottom:var(--wp--preset--spacing--large);"><?php echo esc_html_x( 'This page could not be found.', 'Message to convey that a webpage could not be found', 'monk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"5px"}}}} -->
	<div class="wp-block-group" style="margin-top:5px">
		<!-- wp:search {"label":"<?php echo esc_html_x( 'Search', 'label', 'monk' ); ?>","placeholder":"<?php echo esc_attr_x( 'Search...', 'placeholder for search field', 'monk' ); ?>","showLabel":false,"width":100,"widthUnit":"%","buttonText":"<?php esc_attr_e( 'Search', 'monk' ); ?>","buttonUseIcon":true,"align":"center"} /-->
	</div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"var(--wp--preset--spacing--large)"} -->
	<div style="height:var(--wp--preset--spacing--large)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
