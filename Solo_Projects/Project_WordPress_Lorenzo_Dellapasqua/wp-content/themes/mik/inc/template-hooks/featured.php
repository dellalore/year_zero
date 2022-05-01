<?php
/**
 * Featured hook
 *
 * @package mik
 */

if ( ! function_exists( 'mik_add_featured_section' ) ) :
    /**
    * Add featured section
    *
    *@since Mik 1.0.0
    */
    function mik_add_featured_section() {

        // Check if featured is enabled on frontpage
        $featured_enable = apply_filters( 'mik_section_status', 'enable_featured', '' );

        if ( ! $featured_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Get featured section details
        $section_details = array();
        $section_details = apply_filters( 'mik_filter_featured_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render featured section now.
        mik_render_featured_section( $section_details );
    }
endif;
add_action( 'mik_primary_content_action', 'mik_add_featured_section', 10 );


if ( ! function_exists( 'mik_get_featured_section_details' ) ) :
    /**
    * featured section details.
    *
    * @since Mik 1.0.0
    * @param array $input featured section details.
    */
    function mik_get_featured_section_details( $input ) {

        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 3; $i++ )  :
            $post_ids[] = mik_theme_option( 'featured_content_post_' . $i );
        endfor;

        $args = array(
            'post_type'         => 'post',
            'post__in'          =>  ( array ) $post_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            'ignore_sticky_posts' => true,
            );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = mik_trim_content( 25 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// featured section content details.
add_filter( 'mik_filter_featured_section_details', 'mik_get_featured_section_details' );


if ( ! function_exists( 'mik_render_featured_section' ) ) :
  /**
   * Start featured section
   *
   * @return string featured content
   * @since Mik 1.0.0
   *
   */
   function mik_render_featured_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $dot = mik_theme_option( 'enable_featured_dot' );
        $title = mik_theme_option( 'featured_title', '' );
        ?>
    	<div id="featured-posts" class="relative homepage-section">
            <div class="wrapper page-section">
                <?php if ( ! empty( $title ) ) : ?>
                    <header class="page-header">
                        <h2 class="section-title <?php echo $dot ? 'add-separator' : ''; ?>"><?php echo esc_html( $title ); ?></h2>
                    </header>
                <?php endif; ?>

                <div class="section-content center-align column-3">
                    <?php foreach ( $content_details as $content ) : ?>
                            <article class="hentry">
                                <div class="post-wrapper">
                                    <?php if ( ! empty( $content['image'] ) ) : ?>
                                        <div class="featured-image">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                            </a>
                                        </div><!-- .recent-image -->
                                    <?php endif; ?>

                                    <div class="entry-container">
                                        <div class="entry-meta">
                                            <span class="posted-on">
                                                <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                    <time>
                                                        <?php 
                                                            echo mik_get_svg( array( 'icon' => 'calendar' ) );
                                                            echo esc_html( get_the_date( '', $content['id'] ) ); 
                                                        ?>
                                                    </time>
                                                </a>
                                            </span>
                                        </div>

                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>

                                        <div class="entry-content">
                                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                        </div><!-- .entry-content -->

                                    </div><!-- .entry-container -->
                                </div><!-- .post-wrapper -->
                            </article>
                        <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #featured-posts -->
    <?php 
    }
endif;