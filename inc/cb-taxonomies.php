<?php
/**
 * Custom taxonomies for Case Studies.
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;


/**
 * Registers custom taxonomies for Case Studies.
 */
function cb_register_taxes() {
    $args = array(
        'label'              => 'CS Sector',
        'labels'             => array(
            'name'          => 'CS Sectors',
            'singular_name' => 'CS Sector',
        ),
        'public'             => true,
        'publicly_queryable' => false,
        'hierarchical'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'query_var'          => true,
        'rewrite'            => false,
        'show_admin_column'  => true,
        'show_in_rest'       => true,
        'show_tagcloud'      => false,
        'show_in_quick_edit' => true,
        'show_in_graphql'    => false,
    );
    register_taxonomy( 'cssector', array( 'case-studies' ), $args );

    $args = array(
        'label'              => 'CS Service',
        'labels'             => array(
            'name'          => 'CS Services',
            'singular_name' => 'CS Service',
        ),
        'public'             => true,
        'publicly_queryable' => false,
        'hierarchical'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'query_var'          => true,
        'rewrite'            => false,
        'show_admin_column'  => true,
        'show_in_rest'       => true,
        'show_tagcloud'      => false,
        'show_in_quick_edit' => true,
        'show_in_graphql'    => false,
    );
    register_taxonomy( 'csservice', array( 'case-studies' ), $args );
}
add_action( 'init', 'cb_register_taxes' );
