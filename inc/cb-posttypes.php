<?php
/**
 * Register Custom Post Types
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Custom Post Types
 *
 * @return void
 */
function cb_register_post_types() {

    $labels = array(
        'name'          => 'People',
        'singular_name' => 'Person',
    );

    $args = array(
        'label'                 => 'People',
        'labels'                => $labels,
        'description'           => '',
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_rest'          => true,
        'rest_base'             => '',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'has_archive'           => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'menu_icon'             => 'dashicons-open-folder',
        'delete_with_user'      => false,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        'hierarchical'          => false,
        'rewrite'               => false,
        'query_var'             => true,
        'supports'              => array(
			'title',
			'thumbnail',
			'editor',
		),
        'show_in_graphql'       => false,
        'exclude_from_search'   => true,
    );

    register_post_type( 'people', $args );

    $labels = array(
        'name'          => 'Case Studies',
        'singular_name' => 'Case Study',
    );

    $args = array(
        'label'                 => 'Case Studies',
        'labels'                => $labels,
        'description'           => '',
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_rest'          => true,
        'rest_base'             => '',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'has_archive'           => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'menu_icon'             => 'dashicons-open-folder',
        'delete_with_user'      => false,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        'hierarchical'          => false,
        'rewrite'               => array(
			'slug'       => 'case-studies',
			'with_front' => false,
		),
        'query_var'             => true,
        'supports'              => array(
			'title',
			'editor',
		),
        'show_in_graphql'       => false,
        'exclude_from_search'   => true,
    );

    register_post_type( 'case-studies', $args );

    $labels = array(
        'name'          => 'Testimonials',
        'singular_name' => 'Testimonial',
    );

    $args = array(
        'label'                 => 'Testimonials',
        'labels'                => $labels,
        'description'           => '',
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_rest'          => true,
        'rest_base'             => '',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'has_archive'           => false,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'menu_icon'             => 'dashicons-open-folder',
        'delete_with_user'      => false,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        'hierarchical'          => false,
        'rewrite'               => false,
        'query_var'             => true,
        'supports'              => array(
			'title',
			'editor',
		),
        'show_in_graphql'       => false,
        'exclude_from_search'   => true,
    );

    register_post_type( 'testimonials', $args );
}

add_action( 'init', 'cb_register_post_types' );
