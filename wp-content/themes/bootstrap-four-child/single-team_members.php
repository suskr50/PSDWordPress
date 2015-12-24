<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Bootstrap4
 * @since Bootstrap4
 */
get_header(); ?>

<!-- BLOG PAGE -->
<h1> here ia am </h1>
<?php query_posts('pagename=team-members')?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h2><?php the_content(); ?></h2>
			<?php endwhile; // end of the loop. ?>

<?php
get_footer();

    