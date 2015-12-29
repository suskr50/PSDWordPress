<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sksthemeexp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

<?php
    /* translators: used between list items, there is a space after the comma */
    $category_list = get_the_category_list( __( ', ', 'my-simone' ) );

    if ( sksthemeexp_categorized_blog() ) {
        echo '<div class="category-list">' . $category_list . '</div>';
    }
?>		

		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}


                
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php sksthemeexp_posted_on(); ?>
			
<?php 
    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
        echo '<span class="comments-link">';
        comments_popup_link( __( 'Leave a comment', 'my-simone' ), __( '1 Comment', 'my-simone' ), __( '% Comments', 'my-simone' ) );
        echo '</span>';
    }
?>
                
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'sksthemeexp' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sksthemeexp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php sksthemeexp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
