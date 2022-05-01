<?php
/**
 * Introduction Customizer Options
 *
 * @package mik
 */

// Add introduction section
$wp_customize->add_section( 'mik_introduction_section', array(
	'title'             => esc_html__( 'Introduction Section','mik' ),
	'description'       => esc_html__( 'Introduction Setting Options', 'mik' ),
	'panel'             => 'mik_homepage_sections_panel',
) );

// introduction menu enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[enable_introduction]', array(
	'default'           => mik_theme_option('enable_introduction'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[enable_introduction]', array(
	'label'             => esc_html__( 'Enable Introduction', 'mik' ),
	'section'           => 'mik_introduction_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// introduction pages drop down chooser control and setting
$wp_customize->add_setting( 'mik_theme_options[introduction_content_page]', array(
	'sanitize_callback' => 'mik_sanitize_page_post',
) );

$wp_customize->add_control( new Mik_Dropdown_Chosen_Control( $wp_customize, 'mik_theme_options[introduction_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'mik' ),
	'section'           => 'mik_introduction_section',
	'choices'			=> mik_page_choices(),
) ) );

// introduction readmore label drop down chooser control and setting
$wp_customize->add_setting( 'mik_theme_options[introduction_readmore_label]', array(
	'default'          	=> mik_theme_option('introduction_readmore_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'mik_theme_options[introduction_readmore_label]', array(
	'label'             => esc_html__( 'Readmore Label', 'mik' ),
	'section'           => 'mik_introduction_section',
	'type'				=> 'text',
) );
