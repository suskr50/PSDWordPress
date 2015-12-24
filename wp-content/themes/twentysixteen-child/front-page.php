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


		<section class="service-wrap">
		

			<?php query_posts('category_name=services&posts_per_page=3')?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="desc-box">	
				<div class="price-wrap">	
					<h1> <?php the_title();?> </h1>
					<hr>
					<?php the_content();?>
					<a href="#" > Sign Up </a>
					</div>
				</div>
			<?php endwhile; // end of the loop. ?>
			<?php wp_reset_query(); // resets the altered query back to the original ?>
			
     
	              <div class="contact-us">
	              
	              	<h1> Contact Us </h1>
					<hr>
	              	<?php echo do_shortcode('[contact-form-7 id="13" title="Contact Us"]') ?>
              
            </div>
            <div class="clear"></div>
        </section>






        <!---- Recent Post Section ---->
        <section class="recent-posts">

        	<div class="post-wrapper">
        		<div class="recent-section">
        		
        			<?php query_posts('category_name=blog&posts_per_page=3')?>
        			<h2> Recent Posts </h2>
        			<hr>
        				<?php while ( have_posts() ) : the_post(); ?>
        				<div class="individual-post">   
	        				<?php the_post_thumbnail('thumbnail') ?>
	        				<p><?php the_content(); ?>
	        				<?php the_date();?> <span><?php comments_number();?></span></p>
	        				<hr>
        				</div>
        			<?php endwhile; // end of the loop. ?>
					
        			<?php wp_reset_query(); // resets the altered query back to the original ?>
		
				</div>
        		
        		<div class="clear"></div>
        	</div>

            <div class="feature-wrapper">
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

           
            <div class="work-with-us">
                 <div class="recent-section">
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


        <section class="social-footer">
        	<div class="link-wrapper">
<div class="info-wrapper">
        			
        				<ul><li><h3> Quick Links </h3></li></ul>
<?php $args = array(
	'theme_location'  => '',
	'menu'            => 'Quick Links',
	'container'       => 'div',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'menu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);?>

        			<?php wp_nav_menu( $args ); ?> 
        		</div>
        		<div class="info-wrapper">
        			
        				<ul><li><h3> More Quick Links </h3></li></ul>

        				<?php $args = array(
	
	'menu'            => 'More Links',
	
);?>

        				<?php wp_nav_menu( $args ); ?> 

        		
        		</div>
        		<div class="info-wrapper">

        			<?php query_posts('category_name=blog&posts_per_page=5')?>
        			
        				<ul><li><h3> Featured </h3></li></ul>
<ul>
        				<?php while ( have_posts() ) : the_post(); ?>
        				
        				<li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>

        			<?php endwhile; // end of the loop. ?>

        			<?php wp_reset_query(); // resets the altered que?>
        		</ul>


        	</div>
        	<div class="info-wrapper">
        		
        			
<ul><li><h3> Contact Us </h3></li></ul>

        				<?php $args = array(
	
	'menu'            => 'Contact Us',
	
);?>

        				<?php wp_nav_menu( $args ); ?> 
        	</div> 
        	</div>

        	<div class="keep-contact-wrapper">
        		<div id="keep-contact">
        			<h2> Keep in Contact </h2>
        			<?php echo get_site_url(); ?>
        			<ul>
        				<li><a href="#"><img src="../images/facebook.png"></a></li>
        				<li><a href="#"><img src="images/twitter.png"></a></li>
        				<li><a href="#"><img src="images/rss.png"></a></li>
        				<li><a href="#"><img src="images/youtube.png"></a></li>
        				<li><a href="#"><img src="images/linkedin.png"></a></li>
        				<li><a href="#"><img src="images/digg.png"></a></li>

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

	

</div><!-- .content-area -->

<?php get_footer(); ?>

