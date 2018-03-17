<?php
/**
 * Header HTML markup structure
 *
 * @package     emmaverde
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */
namespace emmaverde\Structure;

/**
 * Unregister default navigation events.
 *
 * @since 1.3.0
 *
 * @return void
 */
function unregister_header_events() {
}

add_action( 'genesis_after_header', __NAMESPACE__ . '\render_social_widget' );
/**
 * Renders out the pre-footer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_social_widget() {
 genesis_widget_area( 'header-social', array(
	 'before' => '<div class="header-social"><div class="wrap">',
	 'after'  => '</div></div>',
 ) );
}
