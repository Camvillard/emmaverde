<?php
/**
 * Footer HTML markup structure
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
function unregister_footer_events() {
	//remove_action( 'genesis_footer', 'genesis_do_footer' );
}

add_action( 'genesis_before_footer', __NAMESPACE__ . '\render_footer_widgets' );
/**
 * Renders out the pre-footer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_footer_widgets() {
 genesis_widget_area( 'footer-instagram', array(
	 'before' => '<div class="footer-instagram"><div class="wrap">',
	 'after'  => '</div></div>',
 ) );
}

//* Change the footer text
add_filter('genesis_footer_creds_text', __NAMESPACE__ . '\footer_creds_filter');
function footer_creds_filter( $creds ) {
	$creds = '<a href="https://emmaverde.com/mentions-legales">mentions legales</a></br>[footer_copyright after=" Emma Verde"] &middot; tous droits réservés</br><div class="credits-text"><p class="love">site imaginé et créé avec <i class="icon ion-heart"></i> par <a href="https://www.camillevillard.com" target="_blank">camille villard</a></p></div>';
	return $creds;
}

// // Add To Top button
// add_action( 'genesis_footer', __NAMESPACE__ . '\to_top', 6);
// 	function to_top() {
// 	 echo '<div class="to-top-button"><a href="#" title="Back To Top">&#9650;</a></div>';
// }
