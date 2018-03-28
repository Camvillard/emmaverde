<?php
/**
 *
 * @package     Emma Verde
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     NonCommercial Creative Common Attribution.
 *
 */

 namespace emmaverde;

//* Add post navigation (requires HTML5 theme support)
add_post_type_support( 'post', __NAMESPACE__ . '\prev_next_post_nav' );
add_action( 'genesis_entry_footer', __NAMESPACE__ . '\prev_next_post_nav', 12 );

function prev_next_post_nav() {

	genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'single-entry-pagination',
	) );

	echo '<div class="article-pre">';
	previous_post_link( '%link', 'article précédent' );
	echo '</div>';

	echo '<div class="article-suiv">';
	next_post_link( '%link', 'article suivant' );
	echo '</div>';

	genesis_markup( array(
		'close'    => '</div>',
		'context' => 'single-entry-pagination',
	) );
}

genesis();
