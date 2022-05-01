<?php
/**
 * Footer Customizer Options
 *
 * @package mik
 */

// Add footer section
$wp_customize->add_section( 'mik_footer_section', array(
	'title'             => esc_html__( 'Footer Section','mik' ),
	'description'       => esc_html__( 'Footer Setting Options', 'mik' ),
	'panel'             => 'mik_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'mik_theme_options[slide_to_top]', array(
	'default'           => mik_theme_option('slide_to_top'),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[slide_to_top]', array(
	'label'             => esc_html__( 'Show Slide to Top', 'mik' ),
	'section'           => 'mik_footer_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// copyright text
$wp_customize->add_setting( 'mik_theme_options[copyright_text]',
	array(
		'default'       		=> mik_theme_option('copyright_text'),
		'sanitize_callback'		=> 'mik_santize_allow_tags',
	)
);
$wp_customize->add_control( 'mik_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'mik' ),
		'section'    			=> 'mik_footer_section',
		'type'		 			=> 'textarea',
    )
);
