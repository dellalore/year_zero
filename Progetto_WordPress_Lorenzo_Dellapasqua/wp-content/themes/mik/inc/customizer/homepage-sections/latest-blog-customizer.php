<?php
/**
 * latest blog Customizer Options
 *
 * @package mik
 */

// Add blog section
$wp_customize->add_section( 'mik_latest_blog_section', array(
	'title'             => esc_html__( 'Latest Blog Section','mik' ),
	'description'       => esc_html__( 'Latest Blog Page Options', 'mik' ),
	'panel'             => 'mik_homepage_sections_panel',
) );

// latest blog menu enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[enable_latest_blog]', array(
	'default'           => mik_theme_option('enable_latest_blog'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[enable_latest_blog]', array(
	'label'             => esc_html__( 'Enable Latest Blog', 'mik' ),
	'section'           => 'mik_latest_blog_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// latest blog title dot enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[enable_latest_blog_dot]', array(
	'default'           => mik_theme_option('enable_latest_blog_dot'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[enable_latest_blog_dot]', array(
	'label'             => esc_html__( 'Enable Dot After Title', 'mik' ),
	'section'           => 'mik_latest_blog_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'mik_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> mik_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( 'mik_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'mik' ),
	'description'       => esc_html__( 'Note: This title is displayed when your homepage displays option is set to latest posts.', 'mik' ),
	'section'           => 'mik_latest_blog_section',
	'type'				=> 'text',
) );

// alignment control and setting
$wp_customize->add_setting( 'mik_theme_options[blog_layout]', array(
	'default'          	=> mik_theme_option('blog_layout'),
	'sanitize_callback' => 'mik_sanitize_select',
) );

$wp_customize->add_control( 'mik_theme_options[blog_layout]', array(
	'label'             => esc_html__( 'Layout', 'mik' ),
	'section'           => 'mik_latest_blog_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'left-align' 		=> esc_html__( 'Left Align', 'mik' ),
		'center-align' 		=> esc_html__( 'Center Align', 'mik' ),
	),
) );

// column control and setting
$wp_customize->add_setting( 'mik_theme_options[blog_column_type]', array(
	'default'          	=> mik_theme_option('blog_column_type'),
	'sanitize_callback' => 'mik_sanitize_select',
) );

$wp_customize->add_control( 'mik_theme_options[blog_column_type]', array(
	'label'             => esc_html__( 'Column', 'mik' ),
	'section'           => 'mik_latest_blog_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'column-2' 		=> esc_html__( 'Two Column', 'mik' ),
		'column-3' 		=> esc_html__( 'Three Column', 'mik' ),
	),
) );
