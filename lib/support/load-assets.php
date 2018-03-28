<?php
/**
 * Asset loader handler.
 *
 * @package     emmaverde
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */
namespace emmaverde;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue Scripts and Styles.
 *
 * @since 1.0.2
 *
 * @return void
 */
function enqueue_assets() {

	wp_enqueue_style( CHILD_TEXT_DOMAIN . '-fonts', '//fonts.googleapis.com/css?family=Dawning+of+a+New+Day|Inconsolata:400|Poppins:300,300i,500,500i&amp;subset=latin-ext', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-responsive-menu', CHILD_URL . '/assets/js/responsive-menu.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_style( 'ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), CHILD_THEME_VERSION );

	$localized_script_args = array(
		'mainMenu' => __( 'Menu', CHILD_TEXT_DOMAIN ),
		'subMenu'  => __( 'Menu', CHILD_TEXT_DOMAIN ),
	);
	wp_localize_script( CHILD_TEXT_DOMAIN . '-responsive-menu', 'emmaverdeL10n', $localized_script_args );
}
