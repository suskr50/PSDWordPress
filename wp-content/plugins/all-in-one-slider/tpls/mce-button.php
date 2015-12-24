<?php
add_filter('mce_external_plugins', "aios_tinyplugin_register");
add_filter('mce_buttons', 'aios_tinyplugin_add_button', 0);
 
function aios_tinyplugin_add_button($buttons)
{
    array_push($buttons, "separator", "aios_tinyplugin");
    return $buttons;
}

function aios_tinyplugin_register($plugin_array)
{
    $url = plugins_url("all-in-one-slider/js/editor_plugin.js");

    $plugin_array['aios_tinyplugin'] = $url;
    return $plugin_array;
}


function aios_free_tinymce(){
    global $wpdb;
    if(!isset($_GET['aios_action'])||$_GET['aios_action']!='aios_tinymce_button') return false;
    ?>
<html>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<title>Insert Slider</title>
<style type="text/css">
*{font-family: Tahoma !important; font-size: 9pt; letter-spacing: 1px;}
select,input{padding:5px;font-size: 9pt !important;font-family: Tahoma !important; letter-spacing: 1px;margin:5px;}
.button{
    background: #7abcff; /* old browsers */

background: -moz-linear-gradient(top, #7abcff 0%, #60abf8 44%, #4096ee 100%); /* firefox */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#7abcff), color-stop(44%,#60abf8), color-stop(100%,#4096ee)); /* webkit */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7abcff', endColorstr='#4096ee',GradientType=0 ); /* ie */
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
border:0px solid #FFF;
color: #FFF;
cursor: pointer;
}
 
.input{
 width: 340px;   
 background: #EDEDED; /* old browsers */

background: -moz-linear-gradient(top, #EDEDED 24%, #fefefe 81%); /* firefox */

background: -webkit-gradient(linear, left top, left bottom, color-stop(24%,#EDEDED), color-stop(81%,#fefefe)); /* webkit */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#EDEDED', endColorstr='#fefefe',GradientType=0 ); /* ie */
border:1px solid #aaa; 
color: #000;
}
.button-primary{cursor: pointer;}
fieldset{padding: 10px;}
</style> 
<style type="text/css">    
.wpdm-pro legend{
    font-size:10pt;
}
.wpdm-pro .nav a:active,
.wpdm-pro .nav a:hover,
.wpdm-pro .nav a{
    outline:none !important;
}
.wpdm-pro button,
.wpdm-pro input[type=submit],
.wpdm-pro input[type=button],
.wpdm-pro input[type=text]{
    line-height:26px;
    min-height:26px;
    margin-bottom: 10px;
    
}
.wpdm-pro .btn small{
    font-size: 65%;
}
#wpdmcats {
    height:300px;
    overflow: auto;
    border:1px solid #eeeeee;
    border-radius:4px;
    margin: 0px;
    padding: 10px;
}
#wpdmcats li label{
    display: inline;
    font-size:11px;
}
#wpdmcats li{
    list-style: none;
}

.nav-tabs li a{
    text-transform: uppercase;
    font-weight: bold;
}

.drag-drop-inside{
    text-align: center;
    padding:5px;
    border:2px dashed #ddd;
    margin:5px 0px;
}

.tab{
    padding:10px 20px;
    text-decoration: none;
    margin: 0px;
     
    display: block;
    float: left;
}

.tab:first-child{
    border-right:0px
}
.tab.active{ 
    background:#ffffff;
    
}

#qbtn b{
    font-weight: normal;
}
#qbtn input,
#qbtn textarea{
    margin:0px;
    margin-bottom: 10px;
}

.tab-pane{
    background: #ffffff;
    padding:10px;
}

</style>
<script type="text/javascript" src="<?php echo includes_url('/js/jquery/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo includes_url('/js/jquery/jquery.form.js'); ?>"></script>
<script type="text/javascript" src="<?php echo includes_url('/js/tinymce/tiny_mce_popup.js'); ?>"></script>

                <script type="text/javascript">
                    
                    jQuery(function(){  
                                      
                    var sliderlib ='', width = '', height = '';
                    jQuery('#addtopost').click(function(){
                     
                    var win = window.dialogArguments || opener || parent || top;                     
                    if(jQuery('#slider_lib').val()!="") sliderlib = ' slider_lib="'+jQuery('#slider_lib').val()+'" ';
                    if(jQuery('#width').val()!="") width = ' width="'+jQuery('#width').val()+'" ';
                    if(jQuery('#height').val()!="") height = ' height="'+jQuery('#height').val()+'" ';

                    win.send_to_editor('[aios_render slider_id="'+jQuery('#slider').val()+'"'+sliderlib+width+height+']');
                    tinyMCEPopup.close();
                    return false;                   
                    });

                              
                });
                </script>
                 
</head>

<body>


    Slider Name:<br/>
    <select name="slider_name" id="slider">
    <?php
    $sliders = get_option('aois_sliders',array());
    //print_r($sliders);
    foreach($sliders as $id => $slider):
    ?>
        <option value="<?php echo $id; ?>"><?php echo $slider['name']; ?></option>
    <?php endforeach; ?>
    </select><br/>

    Slider Libs:<br/>
    <?php
    $libdir = ABSPATH.'wp-content/plugins/all-in-one-slider/sliders/'; //echo $libdir;
    $dirs = scandir($libdir)?>
    <select name="slider_lib" id="slider_lib">
        <option value="">Default</option>
        <?php foreach($dirs as $dir): if(file_exists($libdir.$dir.'/slider.php')){ ?>
            <option value="<?php echo $dir; ?>"><?php echo ucwords(str_replace("-"," ",$dir)); ?></option>

        <?php } endforeach; ?>
    </select><br/>

    Width:<br/>
    <input type="text" name="slider_width" id="width" placeholder="e.g. 1000" value="" /><br/>
    Height:<br/>
    <input type="text" name="slider_height" id="height" placeholder="e.g. 400" value="" /><br/>

    <button id="addtopost">Insert Slider</button>

</body>

</html>
    
    <?php
    
    die();
}
 

add_action('init', 'aios_free_tinymce');

