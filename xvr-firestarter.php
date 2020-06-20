<?php
/**
 * @package  Firestarter
 */
/*
Plugin Name: XVR Firestarter
Plugin URI: http://zabiranik.me
Description: Awesome plugin for wordpress.
Version: 1.0.0
Author: Zabir Ahmed
Author URI: http://zabiranik.me
License: GPLv2 or later
Text Domain: xvr-firestarter
*/

defined( 'ABSPATH' ) or die();

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_firestarter_plugin() {
	XVR\Firestarter\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_firestarter_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_firestarter_plugin() {
	XVR\Firestarter\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_firestarter_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'XVR\\Firestarter\\Init' ) ) {
	XVR\Firestarter\Init::register_services();
}