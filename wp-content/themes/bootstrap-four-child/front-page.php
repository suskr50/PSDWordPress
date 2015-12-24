<?php
/**
 * The template for displaying the homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Bootstrap 4
 * @since Bootstrap 1.0
 */

get_header(); ?>



<div id="top">
	<div class="container" >

		<div class="row" >
			<div class="top-text">
				<div class="col-md-10 col-md-offset-1">
					<h1> Our Mission </h1>
					<?php query_posts('pagename=home')?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h2><?php the_content(); ?></h2>
			<?php endwhile; // end of the loop. ?>


				</div>
			</div>

		</div>

	</div> 
</div>

<div class="container" id="about-wrap">

	<div class="row" id="about-text" >
		<div class="col-md-10 col-md-offset-1" >

			<h1> About </h1>
			<?php query_posts('pagename=about')?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h2><?php the_content(); ?></h2>
			<?php endwhile; // end of the loop. ?>


		</div>
	</div>
</div>


<div id="team-wrap">
	<div class="container" >
		<div class="row" id="team-title">
			<h1> TEAM </h1>
		</div>
		<div class="row">

			<?php query_posts('posts_per_page=3&post_type=team_members')?>
			<?php while ( have_posts() ) : the_post(); 
			$image1 = get_field("image1");
			?>

			<div class="col-md-4  team-member">
				<?php echo wp_get_attachment_image($image1,'medium'); ?>
				<h2><?php the_title(); ?><br/>
					<?php the_content(); ?></h2>
				</div>

			<?php endwhile; // end of the loop. ?>
		</div>

		<div class="row">
    <div class="col-md-2 col-md-offset-5">
    <button> Hire Us </button>
  </div>
</div>
	</div>

</div>

<div class="container" id="map-wrap">

	
			
			<?php query_posts('pagename=map')?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h2><?php the_content(); ?></h2>
			<?php endwhile; // end of the loop. ?>


	
</div>


  <section id="footer">
  	<p> </p>
  	<hr>
  	<?php echo wp_nav_menu()?>
  	<p>Privacy Policy    |    Terms and Conditions    |    © Company.LLC 2015 </p>
    
  </section>


<?php get_footer(); ?>