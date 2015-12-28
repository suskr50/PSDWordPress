<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-content" role="main">


<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>




		<section class=" grid col-1">
		

			<?php query_posts('category_name=services&posts_per_page=3')?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="desc-box grid col-14">	
				<div class="price-wrap">	
					<h1> <?php the_title();?> </h1>
					<hr>
					<?php the_content();?>
					<a href="#" > Sign Up </a>
					</div>
				</div>
			<?php endwhile; // end of the loop. ?>
			<?php wp_reset_query(); // resets the altered query back to the original ?>
			
     
	              <div class="contact-us grid col-14">
	              <div class="price-wrap-contact">
	              	<h1> Contact Us </h1>
					<hr>
	              	<?php echo do_shortcode('[contact-form-7 id="13" title="Contact Us"]') ?>
              </div>
            </div>
            <div class="clear"></div>
        </section>






        <!---- Recent Post Section ---->
        <section class="recent-posts grid col-1">

        	<div class="post-wrapper grid col-13">
        		<div class="recent-section">

        			<?php query_posts('category_name=blog&posts_per_page=3')?>
        			<h2> Recent Posts </h2>
        			<hr>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div class="individual-post">   
                       <?php the_post_thumbnail('thumbnail') ?>
                       <div class="individual-post-content">
                          <p><?php $thecontent = get_the_content(); echo $thecontent; ?>
                              <?php $thedate = get_the_date(); ?>
                              <span class="thedate"> <?php echo $thedate;?></span> <span class="thecomments"><?php comments_number();?></span></p>
                              <hr>
                          </div>
                      </div>
                  <?php endwhile; // end of the loop. ?>

                  <?php wp_reset_query(); // resets the altered query back to the original ?>

              </div>

              <div class="clear"></div>
          </div>

          <div class="feature-wrapper grid col-13">
           <div class="recent-section">

              <?php query_posts('category_name=Features&posts_per_page=1')?>


              <?php while ( have_posts() ) : the_post(); ?>
              <h2> <?php the_title();?> </h2>
              <hr>
              <p> <?php the_content();?></p>

          <?php endwhile; // end of the loop. ?>

          <?php wp_reset_query(); // resets the altered query back to the original ?>
      </div>
  </div>


  <div class="work-with-us grid col-13">
   
       <?php query_posts('category_name=Work&posts_per_page=1')?>


       <?php while ( have_posts() ) : the_post(); ?>

       <h2> <?php the_title();?> </h2>
       <hr>
       <?php the_post_thumbnail('thumbnail') ?>
       <p> <?php the_content();?></p>

   <?php endwhile; // end of the loop. ?>

   <?php wp_reset_query(); // resets the altered query back to the original ?>




</div>
</div>
<div class="clear"></div>
</section>



<section class="social-footer grid col-1">


 <div class="link-wrapper grid col-23">
    <div class="info-wrapper grid col-14">

        <ul><li><h3> Quick Links </h3></li></ul>
        <?php $args = array(

         'menu'            => 'Quick Links',

         );?>

         <?php wp_nav_menu( $args ); ?> 
     </div>
     <div class="info-wrapper grid col-14">

        <ul><li><h3> More Quick Links </h3></li></ul>

        <?php $args = array(

         'menu'            => 'More Links',

         );?>

         <?php wp_nav_menu( $args ); ?> 


     </div>
     <div class="info-wrapper grid col-14">

         <?php query_posts('category_name=blog&posts_per_page=5')?>

         <ul><li><h3> Featured </h3></li></ul>
         <ul>
            <?php while ( have_posts() ) : the_post(); ?>

            <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>

            <?php endwhile; // end of the loop. ?>

            <?php wp_reset_query(); // resets the altered que?>
        </ul>
    </div>
<div class="info-wrapper grid col-14">


    <ul><li><h3> Contact Us </h3></li></ul>

    <?php $args = array(

     'menu'            => 'Contact Us',

     );?>

     <?php wp_nav_menu( $args ); ?> 
 </div> 
</div>


<div class="keep-contact-wrapper grid col-13">
  <div id="keep-contact">
   <h2> Keep in Contact </h2>
   <ul>
    <li><a href="#"><img src=<?php echo home_url()."/wp-content/themes/twentysixteen-child/img/facebook.png"?>></a></li>
    <li><a href="#"><img src=<?php echo home_url()."/wp-content/themes/twentysixteen-child/img/rss.png"?>></a></li>
    <li><a href="#"><img src=<?php echo home_url()."/wp-content/themes/twentysixteen-child/img/youtube.png"?>></a></li>
    <li><a href="#"><img src=<?php echo home_url()."/wp-content/themes/twentysixteen-child/img/twitter.png"?>></a></li>
    <li><a href="#"><img src=<?php echo home_url()."/wp-content/themes/twentysixteen-child/img/linkedin.png"?>></a></li>
    <li><a href="#"><img src=<?php echo home_url()."/wp-content/themes/twentysixteen-child/img/digg.png"?>></a></li>

</ul> 
</div>
<div id="mail-wrapper">
   <h2> Mail form goes here </h2>
</div>
</div>
<div class="clear"></div>
</section>

        <br>
        <br>

       


	</main><!-- .site-main -->

<?php get_footer(); ?>	

</div><!-- .content-area -->



