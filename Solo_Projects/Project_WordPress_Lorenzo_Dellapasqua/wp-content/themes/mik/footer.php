<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mik
 */

/**
 * mik_site_content_ends_action hook
 *
 * @hooked mik_site_content_ends -  10
 *
 */
do_action( 'mik_site_content_ends_action' );

/**
 * mik_footer_start_action hook
 *
 * @hooked mik_footer_start -  10
 *
 */
do_action( 'mik_footer_start_action' );

/**
 * mik_site_info_action hook
 *
 * @hooked mik_site_info -  10
 *
 */
do_action( 'mik_site_info_action' );

/**
 * mik_footer_ends_action hook
 *
 * @hooked mik_footer_ends -  10
 * @hooked mik_slide_to_top -  20
 *
 */
do_action( 'mik_footer_ends_action' );

/**
 * mik_page_ends_action hook
 *
 * @hooked mik_page_ends -  10
 *
 */
do_action( 'mik_page_ends_action' );

wp_footer();

/**
 * mik_body_html_ends_action hook
 *
 * @hooked mik_body_html_ends -  10
 *
 */
do_action( 'mik_body_html_ends_action' );
