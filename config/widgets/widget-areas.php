<?php
/**
 * Sidebars and widget area runtime configuration
 *
 * @package     emmaverde\widgets
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */
namespace emmaverde\widgets;

return array(
	'unregister_widget_areas' => array(
		'sidebar',
		'sidebar-alt',
	),

	'register_widget_areas' => array(
		array(
			'id'          => 'front-page-primary',
			'name'        => __( 'zone primaire', 'ktc' ),
			'description' => __( 'zone de widget pour afficher le billet à la une', 'emmaverde' ),
		),

		array(
			'id'          => 'front-page-lifestyle',
			'name'        => __( 'zone lifestyle', 'ktc' ),
			'description' => __( 'zone de widget pour afficher les derniers billets lifestyle', 'emmaverde' ),
		),

		array(
			'id'          => 'front-page-travel',
			'name'        => __( 'zone voyage', 'ktc' ),
			'description' => __( 'zone de widget pour afficher le dernier billet voyage', 'emmaverde' ),
		),

		array(
			'id'          => 'front-page-beauty',
			'name'        => __( 'zone beauté', 'ktc' ),
			'description' => __( 'zone de widget pour afficher les derniers billets beauté', 'emmaverde' ),
		),

		array(
			'id'          => 'front-page-youtube',
			'name'        => __( 'zone youtube', 'ktc' ),
			'description' => __( 'zone de widget pour afficher la derniére vidéo', 'emmaverde' ),
		),

		array(
			'id'          => 'footer-instagram',
			'name'        => __( 'zone instagram', 'ktc' ),
			'description' => __( 'zone de widget pour afficher le feed instagram', 'emmaverde' ),
		),

	),
);
