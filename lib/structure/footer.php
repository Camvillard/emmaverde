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
	$creds = '<a href="http://www.camillevillard.com">mentions legales</a> &middot; <a href="http://www.camillevillard.com">soutenir le blog</a></br>[footer_copyright after=" Emma Verde"] &middot; <p class="love">logo, petits dessins et site fabriqués avec <i class="icon ion-heart"></i> par <a href="http://www.camillevillard.com" target="_blank">camille villard</a></p>';
	return $creds;
}
