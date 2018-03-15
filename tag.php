<?php
/**
 * archives pour les étiquettes
 *
 * @package     KnowTheCode\GoPro
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace emmaverde\tag;

//remove_action( 'genesis_entry_header', 'genesis_post_info', 9 );
//remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_entry_header', 'genesis_post_info', 6 );

// change les métas des articles
add_filter( 'genesis_post_info', __NAMESPACE__ . '\change_infos');
  function change_infos ($infos_des_articles) {
    $infos_des_articles = '[post_date label="publié le "]';
    return $infos_des_articles;
}

// change les métas des articles
add_filter( 'genesis_post_meta', __NAMESPACE__ . '\change_metas');
  function change_metas ($meta_des_articles) {
    $meta_des_articles = '[post_categories before="catégories / "]';
    return $meta_des_articles;
}


 // Run the Genesis loop.
 genesis();
