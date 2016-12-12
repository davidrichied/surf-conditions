<?php
/*
Plugin Name: Surf Conditions
Plugin URI: https://richiedmedia.com
Description: Get surf conditions from an external API.
Version: 1.0
Author: David Richied
Author URI: https://richiedmedia.com
Text Domain: surf_conditions
Domain Path: /lang/
License: GPL2
*/

require_once 'gateway.php';

add_action('wp_enqueue_scripts', array(Surf_Conditions::manageScripts(), 'enqueueSC_Scripts'));

// Setup Shortcodes
add_action( 'plugins_loaded', array( Surf_Conditions::addShortcode(), 'hook' ) );

if (is_admin()) {
	add_action( 'admin_menu', array( Surf_Conditions::mySettingsPage(), 'add_plugin_page' ) );
	add_action( 'admin_init', array( Surf_Conditions::mySettingsPage(), 'page_init' ) );	
}

add_action('wp_ajax_sc_get_api_data', array(Surf_Conditions::ajaxFunctions(), 'sc_get_api_data'));
add_action('wp_ajax_nopriv_sc_get_api_data', array(Surf_Conditions::ajaxFunctions(), 'sc_get_api_data'));