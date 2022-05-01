<?php
/**
 * Single Post Customizer Options
 *
 * @package mik
 */

// Add excerpt section
$wp_customize->add_section( 'mik_single_section', array(
	'title'             => esc_html__( 'Single Post Setting','mik' ),
	'description'       => esc_html__( 'Single Post Setting Options', 'mik' ),
	'panel'             => 'mik_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'mik_theme_options[sidebar_single_layout]', array(
	'sanitize_callback'   => 'mik_sanitize_select',
	'default'             => mik_theme_option('sidebar_single_layout'),
) );

$wp_customize->add_control(  new Mik_Radio_Image_Control ( $wp_customize, 'mik_theme_options[sidebar_single_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'mik' ),
	'section'             => 'mik_single_section',
	'choices'			  => mik_sidebar_position(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'mik_theme_options[show_single_date]', array(
	'default'           => mik_theme_option( 'show_single_date' ),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[show_single_date]', array(
	'label'             => esc_html__( 'Show Date', 'mik' ),
	'section'           => 'mik_single_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'mik_theme_options[show_single_category]', array(
	'default'           => mik_theme_option( 'show_single_category' ),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[show_single_category]', array(
	'label'             => esc_html__( 'Show Category', 'mik' ),
	'section'           => 'mik_single_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'mik_theme_options[show_single_tags]', array(
	'default'           => mik_theme_option( 'show_single_tags' ),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[show_single_tags]', array(
	'label'             => esc_html__( 'Show Tags', 'mik' ),
	'section'           => 'mik_single_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'mik_theme_options[show_single_author]', array(
	'default'           => mik_theme_option( 'show_single_author' ),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[show_single_author]', array(
	'label'             => esc_html__( 'Show Author', 'mik' ),
	'section'           => 'mik_single_section',
	'on_off_label' 		=> mik_show_options(),
) ) );
