<?php
/**
 * About Template
 *
 * Template Name: About
*
 * @package     emmaverde
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */
namespace emmaverde;


//remove all actions for a blank canvas
remove_action( 'genesis_header_right', 'genesis_do_nav' );
remove_action( 'genesis_header', 'genesis_do_nav', 12 );
remove_action( 'genesis_before_header', 'genesis_do_subnav' );
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
//remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_before_footer', 'emmaverde\Structure\render_footer_widgets' );
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
remove_action( 'genesis_footer', 'emmaverde\Structure\to_top', 6);



add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
function add_body_class( $classes ) {
	$classes[] = 'page-about-emma';

	return $classes;
}


// add the next page button
add_action( 'genesis_entry_footer', __NAMESPACE__ . '\backtoblog' );
function backtoblog() { ?>
          <div class="bouton-retour-au-blog">
           <a href="<?php echo home_url(); ?>">retour au blog</a>
           </div>
          <div class="bouton-contact">
            <a href="http://localhost:8888/emmaverde/contact/">contact</a>
          </div>
<?php }



genesis();
