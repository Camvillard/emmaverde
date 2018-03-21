<?php
/**
 *
 * @package Emma Verde
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

 namespace emmaverde;

//* Add post navigation (requires HTML5 theme support)
add_post_type_support( 'post', __NAMESPACE__ . '\prev_next_post_nav' );
add_action( 'genesis_after_entry_content', __NAMESPACE__ . '\prev_next_post_nav', 8 );

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
