<?php
/**
 * Call to action hook
 *
 * @package mik
 */

if ( ! function_exists( 'mik_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Mik 1.0.0
    */
    function mik_add_cta_section() {

        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'mik_section_status', 'enable_cta', '' );

        if ( ! $cta_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'mik_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render cta section now.
        mik_render_cta_section( $section_details );
    }
endif;
add_action( 'mik_primary_content_action', 'mik_add_cta_section', 10 );


if ( ! function_exists( 'mik_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Mik 1.0.0
    * @param array $input cta section details.
    */
    function mik_get_cta_section_details( $input ) {

        $content = array();
        $page_id = mik_theme_option( 'cta_content_page' );
        
        $args = array(
            'post_type'         => 'page',
            'page_id'           =>  absint( $page_id ),
            'posts_per_page'    => 1,
            );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// cta section content details.
add_filter( 'mik_filter_cta_section_details', 'mik_get_cta_section_details' );


if ( ! function_exists( 'mik_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Mik 1.0.0
   *
   */
   function mik_render_cta_section( $content_details = array() ) {
        $readmore = mik_theme_option( 'cta_btn_label', '' );

        if ( empty( $content_details ) )
            return;

        foreach ( $content_details as $content ) : ?>
        	<div id="cta-section" class="relative homepage-section align-center" <?php if ( ! empty( $content['image'] ) ) { echo 'style=" background-image: url( ' . esc_url( $content['image'] ) . ' ) "'; } ?> >
                <div class="overlay"></div>
                <div class="entry-container">
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                    </header>
                    <?php if ( ! empty( $readmore ) ) : ?>
                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $readmore ); ?></a>
                    <?php endif; ?>
                </div>
            </div><!-- #cta-section -->
        <?php endforeach;
    }
endif;