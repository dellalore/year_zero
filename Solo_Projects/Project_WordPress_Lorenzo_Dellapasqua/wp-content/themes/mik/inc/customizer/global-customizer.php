<?php
/**
 * Global Customizer Options
 *
 * @package mik
 */

// Add Global section
$wp_customize->add_section( 'mik_global_section', array(
	'title'             => esc_html__( 'Global Setting','mik' ),
	'description'       => esc_html__( 'Global Setting Options', 'mik' ),
	'panel'             => 'mik_theme_options_panel',
) );

// site layout setting and control.
$wp_customize->add_setting( 'mik_theme_options[site_layout]', array(
	'sanitize_callback'   => 'mik_sanitize_select',
	'default'             => mik_theme_option('site_layout'),
) );

$wp_customize->add_control(  new Mik_Radio_Image_Control ( $wp_customize, 'mik_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'mik' ),
	'section'             => 'mik_global_section',
	'choices'			  => mik_site_layout(),
) ) );

// loader setting and control.
$wp_customize->add_setting( 'mik_theme_options[enable_loader]', array(
	'default'           => mik_theme_option( 'enable_loader' ),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[enable_loader]', array(
	'label'             => esc_html__( 'Enable Loader', 'mik' ),
	'section'           => 'mik_global_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'mik_theme_options[loader_type]', array(
	'default'          	=> mik_theme_option('loader_type'),
	'sanitize_callback' => 'mik_sanitize_select',
) );

$wp_customize->add_control( 'mik_theme_options[loader_type]', array(
	'label'             => esc_html__( 'Loader Type', 'mik' ),
	'section'           => 'mik_global_section',
	'type'				=> 'select',
	'choices'			=> mik_get_spinner_list(),
) );
