<div class="wrap">

    <h2>Sliders <a href="#" id="create-slider" class="button button-primary" >Create New Slider</a></h2>


    <script>
        jQuery(function() {
            var sliderid = '';
            var storage = jQuery('#dialog-form').html();
                jQuery( "#sortable1, #sortable2" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();

            jQuery( "#dialog-confirm" ).dialog({
                autoOpen: false,
                resizable: false,
                height:200,
                modal: true,
                buttons: {
                    "Confirm Delete": function() {

                        jQuery("#dialog-confirm").html('Deleting...');
                        jQuery.post(ajaxurl,{action:'del_slider',sliderid:sliderid},function(){
                        jQuery("#row_"+sliderid).fadeOut();
                        jQuery("#dialog-confirm").dialog( "close" );
                        jQuery("#dialog-confirm").html('<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>This slider will be deleted.Are you sure?</p>');
                        });

                    },
                    Cancel: function() {
                        jQuery( this ).dialog( "close" );
                    }
                }
            });


            jQuery( "#dialog-form" ).dialog({
                autoOpen: false,
                height: 500,
                width: 800,
                modal: true,
                buttons: {
                    "Save Slider": function() {
                        jQuery('#w8').fadeIn();
                        jQuery('#save-slider-form').ajaxSubmit({
                            url:ajaxurl ,
                            success: function(res){
                                jQuery('#w8').fadeOut();
                                sliderid = res;
                                if(sliderid!='updated')
                                //jQuery('#slider-list tbody tr:last').after('<tr><td>'+jQuery('#slider_name').val()+'</td><td><a rel="'+sliderid+'" class="edit-slider" href="#">Edit</a></td><td><a rel="' +sliderid+ '" class="del-slider" href="#">Delete</a></td></tr>');
                                jQuery('#slider-list tbody tr:last').after('<tr id="row_'+sliderid+'"><td>'+jQuery('#slider_name').val()+'</td><td><input type="text" value=\"[aios_render slider_id='+sliderid+']\" size="35" style="text-align: center;font-size: 11px;width: 200px" /></td><td><a rel='+sliderid+' class="edit-slider button button-small" href="#">Edit</a> <a rel='+sliderid+' class="del-slider button button-small" href="#">Delete</a></td></tr>');
                                jQuery('#dialog-form').html(storage);
                                jQuery( "#sortable1, #sortable2" ).sortable({
                                    connectWith: ".connectedSortable"
                                }).disableSelection();
                                jQuery( "#dialog-form" ).dialog( "close" );
                            }
                        });

                    },
                    Cancel: function() {
                        jQuery('#dialog-form').html(storage);
                        jQuery( "#sortable1, #sortable2" ).sortable({
                            connectWith: ".connectedSortable"
                        }).disableSelection();
                        jQuery( this ).dialog( "close" );
                    }
                }
            });

            jQuery( "#create-slider" ).click(function(e) {
                e.preventDefault();
                jQuery( "#dialog-form" ).dialog( 'option', 'title','Create New Slider');
                jQuery( "#dialog-form" ).dialog( "open" );
                jQuery( "#dialog-form" ).html( "<img style='padding-left:370px;padding-top:150px;' src='<?php echo plugins_url().'/all-in-one-slider/images/ajax-loader.gif'; ?>'>" );
                
                jQuery.post(ajaxurl,{action:'create_slider'},function(res){
                    jQuery("#dialog-form").html(res);
                    jQuery( "#sortable1, #sortable2" ).sortable({
                            connectWith: ".connectedSortable"
                        }).disableSelection();
                });

                return false;
            });
            
            jQuery( ".edit-slider" ).click(function() {
                var sliderid = jQuery(this).attr('rel');
                jQuery( "#dialog-form" ).dialog( 'option', 'title','Edit Slider');
                jQuery( "#dialog-form" ).dialog( 'option', 'height',600);
                jQuery( "#dialog-form" ).dialog( "open" );
                jQuery( "#dialog-form" ).html( "<img style='padding-left:370px;padding-top:150px;' src='<?php echo plugins_url().'/all-in-one-slider/images/ajax-loader.gif'; ?>'>" );
       
                jQuery.post(ajaxurl,{action:'edit_slider',sliderid:sliderid},function(res){
                   jQuery('#dialog-form').html(res);
                   jQuery( "#sortable1, #sortable2" ).sortable({
                            connectWith: ".connectedSortable"
                        }).disableSelection();
                });
                return false;
            });


            jQuery( ".del-slider").click(function(){
                sliderid = jQuery(this).attr('rel');
                jQuery( "#dialog-confirm" ).dialog( 'option', 'height',250);
                jQuery( "#dialog-confirm" ).dialog('open');
                return false;
            });

        });
    </script>

    <style>
        #sortable1,
        #sortable2{
            padding:10px;
            max-height: 300px;
            min-width: 300px;
            max-width: 300px;
            border:1px dashed #999999;
            overflow: auto;
        }

        #sortable1 li,
        #sortable2 li{
            cursor: pointer;
            padding:5px;
        }
        .promo{
       width:97%;
       overflow:hidden;
       margin:5px;
       background: #fafafa;
       border: 1px solid #ccc;
       display: block;
       float: left;
       text-align: center;
       -webkit-border-radius: 6px;
       -moz-border-radius: 6px;
       border-radius: 6px;
       text-decoration:none;
   }
   .promo h3{
       margin: 0px;
       background: #ccc;
       -webkit-border-top-left-radius: 5px;
       -webkit-border-top-right-radius: 5px;
       -moz-border-radius-topleft: 5px;
       -moz-border-radius-topright: 5px;
       border-top-left-radius: 5px;
       border-top-right-radius: 5px;
       padding:5px;
       text-decoration: none;
       color:#333
   }
    .promo img{
        padding-top: 10px;
        padding-bottom: 10px
    }
    </style>
    <div style="width:70%;float: left;margin-top: 20px;">
    <table class="widefat" id="slider-list">
        <thead><tr><th>Slider Name</th><th>Short-code</th><th>Action</th></thead>
        <tbody>
            <tr></tr>
        <?php
        $slider = get_option('aois_sliders', array());
        foreach ($slider as $id=>$s) {
            echo "<tr id='row_{$id}'><td>{$s[name]}</td><td><input type='text' value=\"[aios_render slider_id='{$id}']\" size='35' style='text-align: center;font-size: 11px;width: 200px' /></td><td><a rel='{$id}' class='edit-slider button button-small' href='#'>Edit</a> <a rel='{$id}' class='del-slider button button-small' href='#'>Delete</a></td></tr>";
        }
        ?>  
        </tbody>
    </table>
    </div>
    <div  style="float: right;width: 350px;">
        <a href="http://wpeden.com/" class="promo" target="_blank"><h3>WordPress Themes & Plugins Collection</h3><img src="<?php echo plugins_url('all-in-one-slider/images/wpeden.png'); ?>" /></a>
        <a href="http://liveform.org/" class="promo" target="_blank"><h3>Drag & Drop Form Builder</h3><img vspace="12" src="<?php echo plugins_url('all-in-one-slider/images/liveform.png'); ?>" /></a>
        <a href="http://wpeden.com/minimax-wordpress-page-layout-builder-plugin/" class="promo" target="_blank"><h3>MiniMax Page Layout Builder</h3><img src="<?php echo plugins_url('all-in-one-slider/images/minimax.png'); ?>" /></a>
        <a href="http://www.wpdownloadmanager.com/" class="promo" target="_blank"><h3>WordPress Download Manager Pro</h3><img src="<?php echo plugins_url('all-in-one-slider/images/wpdm.png'); ?>" /></a>
        
        <div style="clear: both;"></div>
    </div>      
    

    <div id="dialog-form" title="Slider">    
        <table width="100%">

            <tr>

                <td valign="top">
                Available Slides:<br/>
                    <ul id="sortable1" class="connectedSortable">

                        <?php
                        $slides = get_posts(array("post_type" => "slide", "posts_per_page" => 9999));
                        foreach ($slides as $slide) {

                            echo "<li  class=\"ui-state-default\">" . $slide->post_title . "<input type='hidden' name='active_slide[]' value='{$slide->ID}' /></li>";
                        }
                        ?>

                    </ul>
                </td>
                <td valign="top">
                    <form method="post" id="save-slider-form">

                        <input type="hidden" name="action" value="save_slider" />
                        <input type="hidden" name="id" id="sid" value="" />
                        Slider Name:<br/>
                        <input type="text" name="slider_name" id="slider_name" value="" /><br/>
                        Slider Library:<br/>
                        <?php
                        $libdir = ABSPATH.'wp-content/plugins/all-in-one-slider/sliders/'; //echo $libdir;
                        $dirs = scandir($libdir)?>
                        <select name="slider_lib">
                            <?php foreach($dirs as $dir): if(file_exists($libdir.$dir.'/slider.php')){ ?>
                            <option value="<?php echo $dir; ?>"><?php echo ucwords(str_replace("-"," ",$dir)); ?></option>

                            <?php } endforeach; ?>
                        </select><br/>

                        Width:<br/>
                        <input type="text" name="slider_width" id="slider_name" placeholder="e.g. 1000" value="" /><br/>
                        Height:<br/>
                        <input type="text" name="slider_height" id="slider_name" placeholder="e.g. 400" value="" /><br/>
                        Slides:
                        <ul id="sortable2" class="connectedSortable">

                        </ul> 
                    </form>
                    <div id="w8" style="display: none"><img src="<?php echo admin_url('/images/loading.gif'); ?>" /> Please Wait...</div>

                </td>

            </tr>

        </table>
    </div>

    <div id="dialog-confirm"  title="Delete Slider?">
        <p>
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            This slider will be deleted. Are you sure?
        </p>
    </div>

</div>