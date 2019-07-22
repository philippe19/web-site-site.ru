<?php 
/*
Plugin Name:  Bootstrap Shortcodes Ultimate
Plugin URI:   https://devshuvo.com
Author:       Akhtarujjaman Shuvo
Author URI:   https://www.facebook.com/akhterjshuvo
Version: 	  4.2.0
Description:  Simple Plugin for Enqueue Bootstrap 4 and Some Helpful Shortcodes.
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
* Including Plugin file for security
* Include_once
* 
* @since 1.0.0
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
function btsu_scripts(){
	wp_enqueue_style('bootstrap', plugin_dir_url(__FILE__).'assets/css/bootstrap.min.css',null,'4.2');
		
	wp_enqueue_script('bootstrap', plugin_dir_url(__FILE__).'assets/js/bootstrap.min.js',array('jquery'),'4.2');
}
add_action('wp_enqueue_scripts','btsu_scripts');
	
// Shortcodes
include_once( dirname( __FILE__ ) . '/inc/shortcodes.php' );