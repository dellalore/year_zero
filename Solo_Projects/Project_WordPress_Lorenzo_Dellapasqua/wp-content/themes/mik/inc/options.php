<?php
/**
 * Options functions
 *
 * @package mik
 */

if ( ! function_exists( 'mik_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function mik_show_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'mik' ),
            'off'       => esc_html__( 'No', 'mik' )
        );
        return apply_filters( 'mik_show_options', $arr );
    }
endif;

if ( ! function_exists( 'mik_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function mik_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'mik' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'mik_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function mik_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'mik' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'mik_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function mik_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => true,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'mik' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'mik_tag_choices' ) ) :
    /**
     * List of tags for category choices.
     * @return Array Array of tag ids and name.
     */
    function mik_tag_choices() {
        $args = array(
                'taxonomy' => 'post_tag',
                'hide_empty' => true,
            );
        $tags = get_terms( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'mik' );
        foreach ( $tags as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'mik_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function mik_site_layout() {
        $mik_site_layout = array(
            'full'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full.png',
            'boxed'   => esc_url( get_template_directory_uri() ) . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'mik_site_layout', $mik_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'mik_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function mik_sidebar_position() {
        $mik_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() ) . '/assets/uploads/right.png',
            'no-sidebar'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full.png',
            'no-sidebar-content' => esc_url( get_template_directory_uri() ) . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'mik_sidebar_position', $mik_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'mik_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function mik_get_spinner_list() {
        $arr = array(
            'spinner-two-way'       => esc_html__( 'Two Way', 'mik' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'mik' ),
            'spinner-dots'          => esc_html__( 'Dots', 'mik' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'mik' ),
        );
        return apply_filters( 'mik_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'mik_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function mik_selected_sidebar() {
        $mik_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'mik' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'mik' ),
        );

        $output = apply_filters( 'mik_selected_sidebar', $mik_selected_sidebar );

        return $output;
    }
endif;

