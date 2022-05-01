<?php
/**
 * Slider Customizer Options
 *
 * @package mik
 */

// Add slider section
$wp_customize->add_section( 'mik_slider_section', array(
	'title'             => esc_html__( 'Slider Section','mik' ),
	'description'       => esc_html__( 'Slider Setting Options', 'mik' ),
	'panel'             => 'mik_homepage_sections_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[enable_slider]', array(
	'default'           => mik_theme_option('enable_slider'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'mik' ),
	'section'           => 'mik_slider_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// slider social menu enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[slider_entire_site]', array(
	'default'           => mik_theme_option('slider_entire_site'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[slider_entire_site]', array(
	'label'             => esc_html__( 'Show Entire Site', 'mik' ),
	'section'           => 'mik_slider_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[slider_arrow]', array(
	'default'           => mik_theme_option('slider_arrow'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'mik' ),
	'section'           => 'mik_slider_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// slider auto slide control enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[slider_auto_slide]', array(
	'default'           => mik_theme_option('slider_auto_slide'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[slider_auto_slide]', array(
	'label'             => esc_html__( 'Auto Slide', 'mik' ),
	'section'           => 'mik_slider_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// slider btn label chooser control and setting
$wp_customize->add_setting( 'mik_theme_options[slider_btn_label]', array(
	'default'          	=> mik_theme_option('slider_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'mik_theme_options[slider_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'mik' ),
	'section'           => 'mik_slider_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// slider posts drop down chooser control and setting
	$wp_customize->add_setting( 'mik_theme_options[slider_content_post_' . $i . ']', array(
		'sanitize_callback' => 'mik_sanitize_page_post',
	) );

	$wp_customize->add_control( new Mik_Dropdown_Chosen_Control( $wp_customize, 'mik_theme_options[slider_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'mik' ), $i ),
		'section'           => 'mik_slider_section',
		'choices'			=> mik_post_choices(),
	) ) );

endfor;
