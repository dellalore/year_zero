<?php
/**
 * Featured Customizer Options
 *
 * @package mik
 */

// Add featured section
$wp_customize->add_section( 'mik_featured_section', array(
	'title'             => esc_html__( 'Featured Section','mik' ),
	'description'       => esc_html__( 'Featured Setting Options', 'mik' ),
	'panel'             => 'mik_homepage_sections_panel',
) );

// featured enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[enable_featured]', array(
	'default'           => mik_theme_option('enable_featured'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[enable_featured]', array(
	'label'             => esc_html__( 'Enable Featured', 'mik' ),
	'section'           => 'mik_featured_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// featured title dot enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[enable_featured_dot]', array(
	'default'           => mik_theme_option('enable_featured_dot'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[enable_featured_dot]', array(
	'label'             => esc_html__( 'Enable Dot After Title', 'mik' ),
	'section'           => 'mik_featured_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// featured title control and setting
$wp_customize->add_setting( 'mik_theme_options[featured_title]', array(
	'default'          	=> mik_theme_option('featured_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'mik_theme_options[featured_title]', array(
	'label'             => esc_html__( 'Title', 'mik' ),
	'section'           => 'mik_featured_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 3; $i++ ) :

	// featured posts drop down chooser control and setting
	$wp_customize->add_setting( 'mik_theme_options[featured_content_post_' . $i . ']', array(
		'sanitize_callback' => 'mik_sanitize_page_post',
	) );

	$wp_customize->add_control( new Mik_Dropdown_Chosen_Control( $wp_customize, 'mik_theme_options[featured_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'mik' ), $i ),
		'section'           => 'mik_featured_section',
		'choices'			=> mik_post_choices(),
	) ) );

endfor;
