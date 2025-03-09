<?php
/**
 * Plugin Name: ParkXpress
 * Description: Buchungsmodul für ParkXpress.
 * Version: 1.0
 * Author: Marco Hinkelmann
 */

// Autoloader oder require_once für Klassen
require_once plugin_dir_path(__FILE__) . 'classes/class-px-shortcode.php';

// Skripte und Styles einbinden
function mb_enqueue_scripts() {
    wp_enqueue_script('mb-script', plugin_dir_url(__FILE__) . 'js/parkxpress.js', array('jquery'), '1.0', true);
    wp_enqueue_style('mb-style', plugin_dir_url(__FILE__) . 'css/parkxpress.css');
}
add_action('wp_enqueue_scripts', 'mb_enqueue_scripts');


new PxShortcode();
// Shortcode-Handler
