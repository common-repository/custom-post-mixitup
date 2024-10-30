<?php
/* protected */
if (!defined('ABSPATH'))
    exit;

/**
  copyRight by Nsstheme
 */

//class define
class nss_cpm_addstyle {

    //construct
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'nss_cmp_mix_added'));
    }

    //methods
    public function nss_cmp_mix_added() {
        wp_register_style('plugin-style', NSS_CPM_PLUGIN_URL . 'assets/css/plugin-style.css');
        wp_enqueue_style('plugin-style');

        wp_enqueue_script('jquery');

        wp_register_script('nss_custom', NSS_CPM_PLUGIN_URL . 'assets/js/nss_custom.js', array('jquery'), '', TRUE);
        wp_enqueue_script('nss_custom');

        wp_register_script('jquery.mixitup', NSS_CPM_PLUGIN_URL . 'assets/js/jquery.mixitup.js', array('jquery'), '', TRUE);
        wp_enqueue_script('jquery.mixitup');
    }

}//end class
new nss_cpm_addstyle();