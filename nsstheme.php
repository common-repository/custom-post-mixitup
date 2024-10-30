<?php
/*
  Plugin Name: Custom post mixItup
  Plugin URI:  https://wordpress.org/plugins/custom-post-mixItup
  Description: Custom post mixItup, if you use it. you can easily create a custom post, taxonomics and put your required title content and images
  Version:     1.1
  Author:      nsstheme
  Author URI:  https://saiful5721.wordpress.com/about
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Text Domain: nsstheme-mix
 */

/**
  copyRight by Nsstheme
 */
/* protected */
if (!defined('ABSPATH'))
    exit;

//define
define( 'NSS_PLUGIN_VERSION', '1.1' );
define('NSS_CPM_PLUGIN_URL', plugin_dir_url(__FILE__));

/* required */
class nss_file_load_setup
{
	//library method
	function __construct()
	{
		$this->nss_include();
	}
	//user method
	function nss_include()
	{
		require_once plugin_dir_path( __FILE__ )."mentor/nss_cpm_custom_post.php";
		require_once plugin_dir_path( __FILE__ )."mentor/nss_cpm_addstyle.php";
		require_once plugin_dir_path( __FILE__ )."mentor/nss_cpm_all_display.php";
	}
}
new nss_file_load_setup();