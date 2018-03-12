<?php
/**
 * Description
 *
 * @package     emmaverde
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */
namespace emmaverde\Structure;

/**
 * Unregister default archive events.
 *
 * @since 1.5.0
 *
 * @return void
 */
function unregister_search_events() {
	// nothing to unregister.
}


add_filter( 'genesis_search_text', __NAMESPACE__ . '\search_button_icon' );
/**
 * Add Dashicon to search form button
 *
 * @since 1.0.0
 *
 */
function search_button_icon( $text ) {
	return esc_attr( '&#xf179;' );
}
