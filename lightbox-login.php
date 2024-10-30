<?php
/*
 * Plugin Name: Lightbox Login
 * Plugin URI: http://atomicbroadcast.net/lightbox-login/
 * Description: A simple shortcode that will require a user to login to view a page.
 * Author: Andrew Dixon
 * Author URI: http://atomicbroadcast.net
 * Version: 0.2
 */
/*****************************************************************************
 * constants and globals                                                     *
 *****************************************************************************/
if (!defined( 'LIGHTBOX_URL' )) {
  define( 'LIGHTBOX_URL', plugin_dir_url( __FILE__ ) );
}
if (!defined( 'LIGHTBOX_DIR' )) {
  define( 'LIGHTBOX_DIR', dirname( __FILE__ ) );
}
/*****************************************************************************
 * include files                                                             *
 *****************************************************************************/
require_once( LIGHTBOX_DIR . '/app/model/debug.model.php' );
require_once( LIGHTBOX_DIR . '/lib/Mixer.php' );
require_once( LIGHTBOX_DIR . '/app/controller/login.controller.php' );
/*****************************************************************************
 * instantiate loginController                                               *
 *****************************************************************************/
$loginController = new LoginController();
?>
