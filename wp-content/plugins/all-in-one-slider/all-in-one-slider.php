<?php
/*
Plugin Name: All in One Slider
Plugin URI: http://wpeden.com/product/all-in-one-slider/
Description: All in One Slider
Author: Sourav
Version: 1.1
Author URI: http://wpeden.com
*/
include("tpls/mce-button.php");

function aios_init() {
  $labels = array(
    'name' => 'Slides',
    'singular_name' => 'Slide',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Slide',
    'edit_item' => 'Edit Slide',
    'new_item' => 'New Slide',
    'all_items' => 'All Slides',
    'view_item' => 'View Slide',
    'search_items' => 'Search Slides',
    'not_found' =>  'No Slides found',
    'not_found_in_trash' => 'No Slides found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'All in One Slider'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'slide' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'thumbnail' ),
    'menu_icon' => plugins_url("all-in-one-slider/images/image.png"),
  ); 

  register_post_type( 'slide', $args );
}



function register_my_custom_submenu_page() {
	add_submenu_page( 'edit.php?post_type=slide', 'Sliders', 'Sliders', 'manage_options', 'sliders', 'aios_manager_sliders' ); 
}


function aios_manager_sliders(){
    include("tpls/manage-sliders.php");
} 

function aios_admin_scripts(){
    if($_GET['page']!='sliders') return;
    wp_enqueue_script("jquery");
    wp_enqueue_script("jquery-form");
    wp_enqueue_script("jquery-ui-core");
    wp_enqueue_script("jquery-ui-dialog");
    wp_enqueue_script("jquery-ui-sortable");
    wp_enqueue_style('jquery-ui-style',plugins_url("all-in-one-slider/css/jquery-ui.css"));
}

function aios_enqueue_scripts(){

    wp_enqueue_script("jquery");

}

function aios_save_slider(){
    $slider = get_option('aois_sliders',array());
    $id = uniqid();
    if($_POST['id']) $id = $_POST['id'];
    if($_POST['slider_width']) $sw = $_POST['slider_width']; else $sw = 1000;
    if($_POST['slider_height']) $sh = $_POST['slider_height']; else $sh = 400;
    if($_POST['slider_lib']) $slib = $_POST['slider_lib']; else $slib = 'bootstrap-carousel';
    $slider[$id] = array('name'=>$_POST['slider_name'],'width'=>$sw,'height'=>$sh,'slider_lib'=>$slib,'slides'=>$_POST['active_slide']);
    update_option('aois_sliders',$slider);
    if($_POST['id'])
        echo 'updated';
    else
        echo $id;
    die();
}

function aios_edit_slider(){
    $slider = get_option('aois_sliders',array());
    $slider = $slider[$_REQUEST['sliderid']];
    $current_lib = $slider['slider_lib'];
    //echo $current_lib;
    ?>
    <table width="100%">

        <tr>

            <td valign="top">
            Available Slides:<br/>
                <ul id="sortable1" class="connectedSortable">

                    <?php
                    $slides = get_posts(array("post_type" => "slide", "posts_per_page" => 9999));

                    foreach ($slides as $slide) {
                        $flag = true;
                        foreach($slider['slides'] as $sid){
                            $slide_ = get_post($sid);
                            if($slide_->ID == $slide->ID){
                               $flag = false;
                                break;
                            }
                        }
                        if($flag == false)
                            continue;
                        //$url = wp_get_attachment_url(get_post_thumbnail_id($slide->ID));
                        echo "<li  class=\"ui-state-default\">" . $slide->post_title . "<input type='hidden' name='active_slide[]' value='{$slide->ID}' /></li>";
                        }
                    ?>

                </ul>
            </td>
            <td valign="top">
                <form method="post" id="save-slider-form">


                        <input type="hidden" name="action" value="save_slider" />
                        <input type="hidden" name="id" id="sid" value="<?php echo $_REQUEST['sliderid']; ?>" />
                        Slider Name:<br/>
                        <input type="text" name="slider_name" id="slider_name" value="<?php echo $slider['name']; ?>" /><br/>

                        Slider Libs:<br/>
                        <?php
                        $libdir = ABSPATH.'wp-content/plugins/all-in-one-slider/sliders/'; //echo $libdir;
                        $dirs = scandir($libdir)?>
                        <select name="slider_lib">
                            <?php foreach($dirs as $dir): if(file_exists($libdir.$dir.'/slider.php')){ ?>
                                <option <?php if($dir == $current_lib) echo "selected"; ?> value="<?php echo $dir; ?>"><?php echo ucwords(str_replace("-"," ",$dir)); ?></option>

                            <?php } endforeach; ?>
                        </select><br/>

                        Width:<br/>
                        <input type="text" name="slider_width" id="slider_name" value="<?php echo $slider['width']; ?>" /><br/>
                        Height:<br/>
                        <input type="text" name="slider_height" id="slider_name" value="<?php echo $slider['height']; ?>" /><br/>
                        Slides:
                        <ul id="sortable2" class="connectedSortable">
                        <?php foreach($slider['slides'] as $sid){
                            $slide = get_post($sid);
                            echo "<li  class=\"ui-state-default\">" . $slide->post_title . "<input type='hidden' name='active_slide[]' value='{$slide->ID}' /></li>"; 
                        }   ?>     
                        </ul>


                </form>
                <div id="w8" style="display: none"><img src="<?php echo admin_url('/images/loading.gif'); ?>" /> Please Wait...</div>

            </td>

        </tr>

    </table>
    <?php
    die();
}
function aios_create_slider(){
    $slider = get_option('aois_sliders',array());
  
    //echo $current_lib;
    ?>
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
    <?php
    die();
}

function aios_del_slider(){
    $slider = get_option('aois_sliders',array());
    unset($slider[$_REQUEST['sliderid']]);
    update_option('aois_sliders',$slider);
}

function aios_generate_slider($params = array('slider_id'=>null, 'slider_lib'=>null,'width'=>null,'height'=>null)){
        extract($params);
        $slider = get_option('aois_sliders',array());
        $slider = $slider[$slider_id];
        $sw = isset($width)? $width : $slider['width'];
        $sh = isset($height) ? $height : $slider['height'];
        $slib = isset($slider_lib) ? $slider_lib : $slider['slider_lib'];

        foreach($slider['slides'] as $sid){
            $slides[] = get_post($sid);
        }

    include(dirname(__FILE__)."/sliders/{$slib}/slider.php");
}

add_action("admin_enqueue_scripts","aios_admin_scripts");
add_action("wp_enqueue_scripts","aios_enqueue_scripts");
add_action( 'init', 'aios_init' );
add_action('admin_menu', 'register_my_custom_submenu_page');
add_action("wp_ajax_save_slider","aios_save_slider");
add_action("wp_ajax_create_slider","aios_create_slider");
add_action("wp_ajax_edit_slider","aios_edit_slider");
add_action("wp_ajax_del_slider","aios_del_slider");
add_shortcode("aios_render","aios_generate_slider");
