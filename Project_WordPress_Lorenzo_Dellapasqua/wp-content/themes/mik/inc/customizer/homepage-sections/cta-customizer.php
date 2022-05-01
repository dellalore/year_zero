<?php
/**
 * Call to Action Customizer Options
 *
 * @package mik
 */

// Add cta section
$wp_customize->add_section( 'mik_cta_section', array(
	'title'             => esc_html__( 'Call to Action Section','mik' ),
	'description'       => esc_html__( 'Call to Action Setting Options', 'mik' ),
	'panel'             => 'mik_homepage_sections_panel',
) );

// cta menu enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[enable_cta]', array(
	'default'           => mik_theme_option('enable_cta'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[enable_cta]', array(
	'label'             => esc_html__( 'Enable Call to Action', 'mik' ),
	'section'           => 'mik_cta_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'mik_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'mik_sanitize_page_post',
) );

$wp_customize->add_control( new Mik_Dropdown_Chosen_Control( $wp_customize, 'mik_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'mik' ),
	'section'           => 'mik_cta_section',
	'choices'			=> mik_page_choices(),
) ) );

// cta btn label drop down chooser control and setting
$wp_customize->add_setting( 'mik_theme_options[cta_btn_label]', array(
	'default'           => mik_theme_option('cta_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'mik_theme_options[cta_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'mik' ),
	'section'           => 'mik_cta_section',
	'type'				=> 'text',
) );