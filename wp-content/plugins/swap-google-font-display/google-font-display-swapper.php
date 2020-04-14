<?php

/**
 * The plugin bootstrap file
 * 
 * @package google-font-display-swapper
 * @version 1.0.1
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * Plugin Name:       Swap Google Fonts Display
 * Plugin URI:        https://wordpress.org/plugins/swap-google-font-display/
 * Description:       Inject font-display: swap to Google Fonts to ensure text remains visible during webfont load
 * Version:           1.0.1
 * Author:            Gijo Varghese
 * Author URI:        https://wpspeedmatters.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       google-font-display-swapper
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'GOOGLE_FONT_DISPLAY_SWAPPER_VERSION', '1.0.1' );

// Capture head
function google_fonts_ds_capture_head() {
    ob_start();
}
add_action('wp_head','google_fonts_ds_capture_head',0);


// Inject display swap to Google Fonts
function google_fonts_ds_inject_display_swap() {
    $head = ob_get_clean();

	// Remove existing display swaps
    $head = str_replace("&#038;display=swap", "", $head);
	
	// Add font-display=swap as a querty parameter to Google fonts
    $head = str_replace("googleapis.com/css?family", "googleapis.com/css?display=swap&family", $head);

    echo $head;
}
add_action('wp_head','google_fonts_ds_inject_display_swap', PHP_INT_MAX); 


// Add custom links in plugins list
function google_fonts_ds_links($links)
{
    $plugin_shortcuts = array(
        '<a href="https://www.buymeacoffee.com/gijovarghese" target="_blank" style="color:#3db634;">Buy developer a coffee</a>'
    );
    return array_merge($links, $plugin_shortcuts);
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'google_fonts_ds_links');