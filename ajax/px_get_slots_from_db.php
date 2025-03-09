<?php 

add_action('wp_ajax_px_get_parking_types', 'px_get_parking_types');
add_action('wp_ajax_nopriv_px_get_parking_types', 'px_get_parking_types');

function px_get_parking_types()
{
    if (!isset($_POST['check_in']) || !isset($_POST['check_out'])) {
        wp_send_json_error(["error" => "Fehlende Parameter"]);
        wp_die();
    }

    $pxdb = new PxBookingDB();
    $response = $pxdb->px_get_slot_informations($_POST['check_in'], $_POST['check_out']);

    wp_send_json_success($response);
    wp_die();
}
