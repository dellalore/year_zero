<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mik
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="page-header">
		<?php 
			mik_article_category();
			the_title( '<h1 class="page-title">', '</h1>' ); 
		?>
	</header><!-- .entry-header -->
	
    <div class="entry-container">
    	<div class="entry-meta">
			<?php mik_posted_on(); ?>
		</div><!-- .entry-meta -->
		
		<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mik' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<div class="entry-meta">
            <?php mik_entry_footer(); ?>
        </div><!-- .entry-meta -->
	</div><!-- .entry-container -->
</article><!-- #post-<?php the_ID(); ?> -->
