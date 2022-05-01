<?php
/**
 * Page Customizer Options
 *
 * @package mik
 */

// Add excerpt section
$wp_customize->add_section( 'mik_page_section', array(
	'title'             => esc_html__( 'Page Setting','mik' ),
	'description'       => esc_html__( 'Page Setting Options', 'mik' ),
	'panel'             => 'mik_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'mik_theme_options[sidebar_page_layout]', array(
	'sanitize_callback'   => 'mik_sanitize_select',
	'default'             => mik_theme_option('sidebar_page_layout'),
) );

$wp_customize->add_control(  new Mik_Radio_Image_Control ( $wp_customize, 'mik_theme_options[sidebar_page_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'mik' ),
	'section'             => 'mik_page_section',
	'choices'			  => mik_sidebar_position(),
) ) );
