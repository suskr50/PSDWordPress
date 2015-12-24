<link rel='stylesheet' id='camera-css' type='text/css' media='all' href='<?php echo plugins_url("all-in-one-slider/sliders/camera/css/camera.css");?>' >
<div class="fluid_container">
<div class="camera_wrap camera_azure_skin" id="camera_wrap_1-<?php $sid = uniqid(); echo $sid; ?>">

    <?php $n = 0;
    foreach ($slides as $slide): ?>
    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($slide->ID)); ?>

        <div data-thumb="<?php echo plugins_url('all-in-one-slider') ?>/timthumb.php?w=100&h=75&src=<?php echo $url; ?>" data-src="<?php echo plugins_url('all-in-one-slider') ?>/timthumb.php?w=<?php echo $sw;?>&h=<?php echo $sh;?>&src=<?php echo $url; ?>#" >
            <div class="camera_caption fadeFromBottom">
            	<?php echo $slide->post_content;?>
            </div>
        </div>

<?php endforeach; ?>

</div>
</div>

<script type='text/javascript' src='<?php echo plugins_url("all-in-one-slider/sliders/camera/js/jquery.mobile.customized.min.js");?>' ></script>
<script type='text/javascript' src='<?php echo plugins_url("all-in-one-slider/sliders/camera/js/jquery.easing.1.3.js");?>'  ></script> 
<script type='text/javascript' src='<?php echo plugins_url("all-in-one-slider/sliders/camera/js/camera.js");?> '></script>

<script>
    jQuery(function(){
			
        jQuery('#camera_wrap_1-<?php echo $sid; ?>').camera({
            pagination: false,
            thumbnails: true,
            height: '<?php echo $sh;?>px',
            loader: 'bar'
        });

       /* jQuery('#camera_wrap_2').camera({
            height: '400px',
            loader: 'bar',
            pagination: false,
            thumbnails: false
        });*/
    });
</script>