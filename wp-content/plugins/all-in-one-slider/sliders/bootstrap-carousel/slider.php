<script type="text/javascript" src="<?php echo plugins_url("all-in-one-slider/sliders/bootstrap-carousel/js/bootstrap.min.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo plugins_url("all-in-one-slider/sliders/bootstrap-carousel/css/bootstrap.css"); ?>">
<div id="myCarousel-<?php $sid = uniqid(); echo $sid; ?>" class="carousel slide">
    <ol class="carousel-indicators">
        <?php $n=0; foreach($slides as $slide): ?>
        <li data-target="#myCarousel-<?php echo $sid; ?>" data-slide-to="<?php echo $n; ?>" <?php if($n++==0) echo 'class="active"'; ?>></li>
        <?php endforeach; ?>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
        <?php $n=0; foreach($slides as $slide): ?>
        <div class="<?php if($n++==0) echo 'active '; ?>item">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($slide->ID) ); ?>
            <img src="<?php echo plugins_url('all-in-one-slider') ?>/timthumb.php?w=<?php echo $sw;?>&h=<?php echo $sh;?>&src=<?php echo $url;?>" />

        <div class="carousel-caption">
          <h4><?php echo $slide->post_title;?></h4>   
  	  <p><?php echo $slide->post_content;?></p>          
        </div>
        </div>
        <?php endforeach; ?>

    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel-<?php echo $sid; ?>" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel-<?php echo $sid; ?>" data-slide="next">&rsaquo;</a>
</div>