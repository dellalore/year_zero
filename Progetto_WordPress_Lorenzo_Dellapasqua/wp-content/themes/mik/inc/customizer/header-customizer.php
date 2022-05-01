<?php
/**
 * Header Customizer Options
 *
 * @package mik
 */

// Add header section
$wp_customize->add_section( 'mik_header_section', array(
	'title'             => esc_html__( 'Header Section','mik' ),
	'description'       => esc_html__( 'Header Setting Options', 'mik' ),
	'panel'             => 'mik_theme_options_panel',
) );

// header search setting and control.
$wp_customize->add_setting( 'mik_theme_options[enable_header_search]', array(
	'default'           => mik_theme_option( 'enable_header_search' ),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[enable_header_search]', array(
	'label'             => esc_html__( 'Enable Search in Header', 'mik' ),
	'section'           => 'mik_header_section',
	'on_off_label' 		=> mik_show_options(),
) ) );
