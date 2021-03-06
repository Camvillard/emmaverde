<?php
/**
 * Setup your child theme
 *
 * @package     emmaverde
 * @since       1.0.3
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */
namespace emmaverde;



add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );
/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */
function setup_child_theme() {

	$config = Support\get_configuration_parameters();
	adds_theme_supports( $config['add_theme_support'] );
	unregister_layouts( $config['genesis_unregister_layout'] );
	add_filter( 'edit_post_link', '__return_empty_string' );
	unregister_genesis_callbacks();
}


/**
 * Adds theme supports to the site.
 *
 * @since 1.0.0
 *
 * @param array $config Theme supports configuration
 *
 * @return void
 */
function adds_theme_supports( array $config ) {
	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

/**
 * Unregister the Genesis Layouts.
 *
 * @since 1.0.0
 *
 * @param array $layouts Layouts to unregister.
 *
 * @return void
 */
function unregister_layouts( array $layouts ) {
	foreach( $layouts  as $layout ) {
		genesis_unregister_layout( $layout );
	}
	// temporary fix for Genesis bug 06.22.2016
	genesis_set_default_layout( 'content-sidebar' );
}

/**
 * Unregister Genesis callbacks.  We do this here because the child theme loads before Genesis.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_genesis_callbacks() {
	Structure\unregister_header_events();
	Structure\unregister_nav_events();
	Structure\unregister_post_events();
	Structure\unregister_archive_events();
	Structure\unregister_footer_events();
	Structure\unregister_sidebar_events();
}



add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_settings_defaults' );
/**
 * Set theme settings defaults.
 *
 * @since 1.0.0
 *
 * @param array $defaults
 *
 * @return array
 */
function set_theme_settings_defaults( array $defaults ) {
	$config   = get_theme_settings_defaults();
	$defaults = wp_parse_args( $config, $defaults );
	return $defaults;
}


add_action( 'after_switch_theme', __NAMESPACE__ . '\update_theme_settings_defaults' );
/**
 * Sets the theme setting defaults.
 *
 * @since 1.0.0
 *
 * @return void
 */
function update_theme_settings_defaults() {
	$config = get_theme_settings_defaults();
	if ( function_exists( 'genesis_update_settings' ) ) {
		genesis_update_settings( $config );
	}
	update_option( 'posts_per_page', $config['blog_cat_num'] );
}


/**
 * Get the theme settings defaults.
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_theme_settings_defaults() {
	return Support\get_configuration_parameters( 'theme_default_settings' );
}



add_filter( 'theme_page_templates', __NAMESPACE__ . '\remove_genesis_page_templates' );
/**
 * Remove Genesis Blog page template.
 *
 * @param array $page_templates Existing recognised page templates.
 *
 * @return array Amended recognised page templates.
 */
function remove_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}

// Add Image Sizes.
add_image_size( 'principal-image', 1400, 800, true );
add_image_size( 'portrait-image', 680, 907, true );
add_image_size( 'small-portrait-image', 310, 413, true );
