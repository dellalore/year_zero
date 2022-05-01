<?php
/**
 * demo import
 *
 * @package mik
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function mik_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Get demo content files for CollarBiz Theme.', 'mik' ),
    esc_url( 'https://sharkthemes.com/downloads/mik' ), esc_html__( 'Click Here', 'mik' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'mik_intro_text' );
