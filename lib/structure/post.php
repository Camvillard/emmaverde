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
 * Unregister all of the post default events.
 *
 * @since 1.4.8
 *
 * @return void
 */
function unregister_post_events() {
	//remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
	//remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
}


//  displays the featured image
add_action( 'genesis_entry_header', __NAMESPACE__ . '\featured_post_image', 12 );
	function featured_post_image() {
		the_post_thumbnail('blog-featured');
	}

//* Customize the post info : sous le titre
add_filter( 'genesis_post_info', __NAMESPACE__ . '\info_filter' );
	function info_filter ($post_info) {
				$post_info = '[post_date label="Publié le "][post_categories before=" / " sep=", "]';
				return $post_info;
}

//* Customize the post metas : après l'article
add_filter( 'genesis_post_meta', __NAMESPACE__ . '\meta_filter' );
	function meta_filter ($post_metas) {
				$post_metas = '[post_categories before=" catégories /" sep=", "][post_tags before="étiquettes /" sep ", "]';
				return $post_metas;
}





add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\setup_author_box_gravatar_size' );
/**
 * Modify size of the Gravatar in the author box.
 *
 * @since 1.0.0
 *
 * @param $size
 *
 * @return int
 */
function setup_author_box_gravatar_size( $size ) {

	return 90;
}
