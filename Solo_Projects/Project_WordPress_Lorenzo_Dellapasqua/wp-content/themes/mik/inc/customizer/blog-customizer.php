<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package mik
 */

// Add blog section
$wp_customize->add_section( 'mik_blog_section', array(
	'title'             => esc_html__( 'Archive Page Setting','mik' ),
	'description'       => esc_html__( 'Archive/Search Page Setting Options', 'mik' ),
	'panel'             => 'mik_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'mik_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'mik_sanitize_select',
	'default'             => mik_theme_option('sidebar_layout'),
) );

$wp_customize->add_control(  new Mik_Radio_Image_Control ( $wp_customize, 'mik_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'mik' ),
	'description'         => esc_html__( 'Note: Option for Archive and Search Page.', 'mik' ),
	'section'             => 'mik_blog_section',
	'choices'			  => mik_sidebar_position(),
) ) );

// alignment control and setting
$wp_customize->add_setting( 'mik_theme_options[archive_layout]', array(
	'default'          	=> mik_theme_option('archive_layout'),
	'sanitize_callback' => 'mik_sanitize_select',
) );

$wp_customize->add_control( 'mik_theme_options[archive_layout]', array(
	'label'             => esc_html__( 'Layout', 'mik' ),
	'section'           => 'mik_blog_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'left-align' 		=> esc_html__( 'Left Align', 'mik' ),
		'center-align' 		=> esc_html__( 'Center Align', 'mik' ),
	),
) );

// column control and setting
$wp_customize->add_setting( 'mik_theme_options[column_type]', array(
	'default'          	=> mik_theme_option('column_type'),
	'sanitize_callback' => 'mik_sanitize_select',
) );

$wp_customize->add_control( 'mik_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'mik' ),
	'description'         => esc_html__( 'Note: Option for Archive and Search Page.', 'mik' ),
	'section'           => 'mik_blog_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'column-1' 		=> esc_html__( 'One Column', 'mik' ),
		'column-2' 		=> esc_html__( 'Two Column', 'mik' ),
	),
) );

// pagination control and setting
$wp_customize->add_setting( 'mik_theme_options[pagination_type]', array(
	'default'          	=> mik_theme_option('pagination_type'),
	'sanitize_callback' => 'mik_sanitize_select',
) );

$wp_customize->add_control( 'mik_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'mik' ),
	'section'           => 'mik_blog_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'mik' ),
		'numeric' 		=> esc_html__( 'Numeric', 'mik' ),
	),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'mik_theme_options[excerpt_count]', array(
	'default'          	=> mik_theme_option('excerpt_count'),
	'sanitize_callback' => 'mik_sanitize_number_range',
	'validate_callback' => 'mik_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mik_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'mik' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'mik' ),
	'section'           => 'mik_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'mik_theme_options[show_date]', array(
	'default'           => mik_theme_option( 'show_date' ),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'mik' ),
	'section'           => 'mik_blog_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'mik_theme_options[show_category]', array(
	'default'           => mik_theme_option( 'show_category' ),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'mik' ),
	'section'           => 'mik_blog_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'mik_theme_options[show_author]', array(
	'default'           => mik_theme_option( 'show_author' ),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'mik' ),
	'section'           => 'mik_blog_section',
	'on_off_label' 		=> mik_show_options(),
) ) );

// Archive read time meta setting and control.
$wp_customize->add_setting( 'mik_theme_options[show_read_time]', array(
	'default'           => mik_theme_option( 'show_read_time' ),
	'sanitize_callback' => 'mik_sanitize_switch',
) );

$wp_customize->add_control( new Mik_Switch_Control( $wp_customize, 'mik_theme_options[show_read_time]', array(
	'label'             => esc_html__( 'Show Read Time', 'mik' ),
	'section'           => 'mik_blog_section',
	'on_off_label' 		=> mik_show_options(),
) ) );
