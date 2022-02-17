<?php
/*
Plugin Name: IDS Social Media links
Plugin URI: https://wordpress.org/plugins/
Description: Shotcodes and Widget for Social Media links
Version: 1.0
Author: Muhammad Anees Adrees
Author URI: http://www.ideasdotsmart.com
*/

if(!defined('ABSPATH'))
{
    exit;
}
require_once(plugin_dir_path(__FILE__).'/includes/ids-sl-script.php');
require_once(plugin_dir_path(__FILE__).'/includes/ids-sl-shortcode-script.php');
require_once(plugin_dir_path(__FILE__).'/includes/ids-sl-class.php');


function register_ids_sl(){

    register_widget('Ids_Sl_Widget');
}

add_action('widgets_init','register_ids_sl')

?>