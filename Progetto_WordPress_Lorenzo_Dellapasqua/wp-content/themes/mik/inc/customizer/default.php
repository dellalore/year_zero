<?php
/**
 * Default Theme Customizer Values
 *
 * @package mik
 */

function mik_get_default_theme_options() {
	$mik_default_options = array(
		// default options

		// Slider
		'enable_slider'			=> true,
		'slider_entire_site'	=> false,
		'slider_arrow'			=> true,
		'slider_auto_slide'		=> false,
		'slider_btn_label' 		=> esc_html__( 'Read Blog', 'mik' ),

		// Introduction
		'enable_introduction'	=> false,
		'introduction_readmore_label' => esc_html__( 'Read Blog', 'mik' ),

		// Featured
		'enable_featured'		=> false,
		'enable_featured_dot'	=> true,
		'featured_title'		=> esc_html__( 'Featured', 'mik' ),

		// Call to action
		'enable_cta'			=> false,
		'cta_btn_label'			=> esc_html__( 'Read Blog', 'mik' ),

		// Latest Blog
		'enable_latest_blog'	=> true,
		'enable_latest_blog_dot' => true,
		'latest_blog_title'		=> esc_html__( 'Latest Blogs', 'mik' ),
		'blog_column_type'		=> 'column-3',
		'blog_layout'			=> 'left-align',

		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; 2020 | All Rights Reserved.', 'mik' ),

		// blog / archive
		'excerpt_count'			=> 25,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'archive_layout'		=> 'left-align',
		'column_type'			=> 'column-2',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,
		'show_read_time'		=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'enable_header_search'	=> true,
		'enable_loader'			=> false,
		'loader_type'			=> 'spinner-dots',
		'site_layout'			=> 'full',
	);

	$output = apply_filters( 'mik_default_theme_options', $mik_default_options );
	return $output;
}