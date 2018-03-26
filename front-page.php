<?php
/**
 *
 * Template Name: Front page
 *
 * @package     Emma Verde
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     NonCommercial Creative Common Attribution.
 *
 */

 namespace emmaverde;

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

 add_filter( 'body_class', __NAMESPACE__ . '\add_custom_body_class', 1 );
 /**
  * Description.
  *
  * @since 1.0.0
  *
  * @param array $body_classes Array of body classes
  *
  * @return array
  */
 function add_custom_body_class( array $body_classes ) {
 	$body_classes[] = 'custom-front-page';

 	return $body_classes;
 }

 add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


 add_action( 'genesis_entry_content', __NAMESPACE__ . '\render_front_page_widgets' );
 /**
  * Renders out the pre-footer.
  *
  * @since 1.0.0
  *
  * @return void
  */
 function render_front_page_widgets() {
 	genesis_widget_area( 'front-page-primary', array(
 		'before' => '<div class="front-page-primary"><div class="wrap">',
 		'after'  => '</div></div>',
 	) );

  genesis_widget_area( 'front-page-lifestyle', array(
    'before' => '<div class="front-page-lifestyle"><div class="wrap">',
    'after'  => '</div></div>',
  ) );

  genesis_widget_area( 'front-page-travel', array(
    'before' => '<div class="front-page-travel"><div class="wrap">',
    'after'  => '</div></div>',
  ) );

  genesis_widget_area( 'front-page-beauty', array(
    'before' => '<div class="front-page-beauty"><div class="wrap">',
    'after'  => '</div></div>',
  ) );

  genesis_widget_area( 'front-page-youtube', array(
    'before' => '<div class="front-page-youtube"><div class="wrap">',
    'after'  => '</div></div>',
  ) );

  genesis_widget_area( 'front-page-instagram', array(
    'before' => '<div class="front-page-instagram"><div class="wrap">',
    'after'  => '</div></div>',
  ) );
 }

remove_action( 'gsfc_post_content', array( 'GS_Featured_Content', 'do_post_content' ) );
remove_action( 'gsfc_post_content', array( 'GS_Featured_Content', 'do_post_image' ) );
remove_action( 'gsfc_after_post_content', array( 'GS_Featured_Content', 'do_post_meta' ) );

add_action( 'gsfc_post_content', array( 'GS_Featured_Content', 'do_post_image' ), 6 );
add_action( 'gsfc_post_content', array( 'GS_Featured_Content', 'do_post_content' ), 9 );
add_action( 'gsfc_post_content', array( 'GS_Featured_Content', 'do_post_meta' ), 8 );

genesis();
