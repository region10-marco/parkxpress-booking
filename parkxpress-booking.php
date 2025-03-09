<?php
/**
 * Plugin Name: ParkXpress Buchungstool
 * Description: Buchungsmodul für ParkXpress.
 * Version: 1.0
 * Author: Marco Hinkelmann
 */

// Autoloader oder require_once für Klassen
require_once plugin_dir_path(__FILE__) . 'classes/class-px-shortcode.php';
require_once plugin_dir_path(__FILE__) . 'classes/class-px-db.php';
require_once plugin_dir_path(__FILE__) . 'ajax/px_get_slots_from_db.php';


// Skripte und Styles einbinden
function mb_enqueue_scripts() {
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    wp_enqueue_script('mb-script', plugin_dir_url(__FILE__) . 'js/parkxpress.js', array('jquery'), '1.0', true);
    wp_enqueue_style('mb-style', plugin_dir_url(__FILE__) . 'css/parkxpress.css');
    wp_localize_script('mb-script', 'px_ajax', array('url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'mb_enqueue_scripts');


new PxShortcode();
// Shortcode-Handler
