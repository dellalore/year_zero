<?php
/**
 * Introduction hook
 *
 * @package mik
 */

if ( ! function_exists( 'mik_add_introduction_section' ) ) :
    /**
    * Add introduction section
    *
    *@since Mik 1.0.0
    */
    function mik_add_introduction_section() {

        // Check if introduction is enabled on frontpage
        $introduction_enable = apply_filters( 'mik_section_status', 'enable_introduction', '' );

        if ( ! $introduction_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Get introduction section details
        $section_details = array();
        $section_details = apply_filters( 'mik_filter_introduction_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render introduction section now.
        mik_render_introduction_section( $section_details );
    }
endif;
add_action( 'mik_primary_content_action', 'mik_add_introduction_section', 10 );


if ( ! function_exists( 'mik_get_introduction_section_details' ) ) :
    /**
    * introduction section details.
    *
    * @since Mik 1.0.0
    * @param array $input introduction section details.
    */
    function mik_get_introduction_section_details( $input ) {

        $content = array();
        $page_id = mik_theme_option( 'introduction_content_page' );
        
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
                $page_post['excerpt']   = mik_trim_content( 30 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : '';

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
// introduction section content details.
add_filter( 'mik_filter_introduction_section_details', 'mik_get_introduction_section_details' );


if ( ! function_exists( 'mik_render_introduction_section' ) ) :
  /**
   * Start introduction section
   *
   * @return string introduction content
   * @since Mik 1.0.0
   *
   */
   function mik_render_introduction_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $readmore = mik_theme_option('introduction_readmore_label');

        foreach ( $content_details as $content ) : ?>

            <div id="introduction" class="relative homepage-section">
                <div class="wrapper page-section right-align">
                    <article class="hentry">
                        <div class="post-wrapper">
                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>                                  
                                </div><!-- .entry-content -->

                                <?php if ( ! empty( $readmore ) ) : ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $readmore ); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div><!-- .entry-container -->

                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>
                        </div><!-- .post-wrapper -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #introduction -->

        <?php endforeach;
    }
endif;