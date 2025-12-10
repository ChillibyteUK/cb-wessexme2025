<?php
/**
 * Populate ACF colour pickers from the theme/global palette.
 *
 * @package cb-wessexme2025
 */

// Field name: bg_colour (change to your field name).
add_filter(
    'acf/load_field/name=bg_colour',
    function ( $field ) {
        $palette = wp_get_global_settings( array( 'color', 'palette', 'theme' ) );
        if ( empty( $palette ) ) {
            $palette = wp_get_global_settings( array( 'color', 'palette', 'default' ) );
        }

        $field['choices']    = array();
        $field['allow_null'] = 1;

        foreach ( (array) $palette as $c ) {
            if ( empty( $c['slug'] ) || empty( $c['name'] ) ) {
                continue;
            }
            $field['choices'][ $c['slug'] ] = $c['name'];
        }
        return $field;
    }
);

// Field name: fg_colour (change to your field name).
add_filter(
    'acf/load_field/name=fg_colour',
    function ( $field ) {
        $palette = wp_get_global_settings( array( 'color', 'palette', 'theme' ) );
        if ( empty( $palette ) ) {
            $palette = wp_get_global_settings( array( 'color', 'palette', 'default' ) );
        }

        $field['choices']    = array();
        $field['allow_null'] = 1;

        foreach ( (array) $palette as $c ) {
            if ( empty( $c['slug'] ) || empty( $c['name'] ) ) {
                continue;
            }
            $field['choices'][ $c['slug'] ] = $c['name'];
        }
        return $field;
    }
);
