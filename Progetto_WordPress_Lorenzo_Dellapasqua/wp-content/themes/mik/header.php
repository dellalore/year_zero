<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mik
 */

/**
 * mik_doctype_action hook
 *
 * @hooked mik_doctype -  10
 *
 */
do_action( 'mik_doctype_action' );

/**
 * mik_head_action hook
 *
 * @hooked mik_head -  10
 *
 */
do_action( 'mik_head_action' );

/**
 * mik_body_start_action hook
 *
 * @hooked mik_body_start -  10
 *
 */
do_action( 'mik_body_start_action' );
 
/**
 * mik_page_start_action hook
 *
 * @hooked mik_page_start -  10
 * @hooked mik_loader -  20
 *
 */
do_action( 'mik_page_start_action' );

/**
 * mik_header_start_action hook
 *
 * @hooked mik_header_start -  10
 *
 */
do_action( 'mik_header_start_action' );

/**
 * mik_site_branding_action hook
 *
 * @hooked mik_site_branding -  10
 *
 */
do_action( 'mik_site_branding_action' );

/**
 * mik_primary_nav_action hook
 *
 * @hooked mik_primary_nav -  10
 *
 */
do_action( 'mik_primary_nav_action' );

/**
 * mik_header_ends_action hook
 *
 * @hooked mik_header_ends -  10
 *
 */
do_action( 'mik_header_ends_action' );

/**
 * mik_site_content_start_action hook
 *
 * @hooked mik_site_content_start -  10
 *
 */
do_action( 'mik_site_content_start_action' );

/**
 * mik_primary_content_action hook
 *
 * @hooked mik_add_slider_section -  10
 *
 */
do_action( 'mik_primary_content_action' );