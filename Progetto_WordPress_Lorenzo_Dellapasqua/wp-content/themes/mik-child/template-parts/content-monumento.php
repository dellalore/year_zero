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
				//aggiungo sotto il content i custom fields -> output testo + get_post_meta
			?>
				<?php echo ("<br><b>Mappa: </b>".get_post_meta(get_the_ID(),'mappa', true));?> <!-- result field metatag -> id, str.k, >T.F.	-->
				<?php echo ("<br><b>Anno Realizzazione: </b>").(get_post_meta(get_the_ID(),'anno_realizzazione', true));?> <!-- result field metatag 	-->
				<?php echo ("<br><b>Periodo Storico: </b>").(get_post_meta(get_the_ID(),'periodo_storico', true));?> <!-- result field metatag 	-->
				<?php echo ("<br><b>Autore: </b>").(get_post_meta(get_the_ID(),'autore', true));?> <!-- result field metatag -->
		<?php
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
