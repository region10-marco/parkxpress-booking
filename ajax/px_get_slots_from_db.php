<?php


add_action('wp_ajax_px_get_parking_types', 'px_get_parking_types');
add_action('wp_ajax_nopriv_px_get_parking_types', 'px_get_parking_types');

function px_get_parking_types()
{


    if (!isset($_POST['check_in']) || !isset($_POST['check_out'])) {
        echo json_encode(["error" => "Fehlende Parameter"]);
        wp_die();
    }

    $db = new PxBookingDB();
    $data = $db->getParkingTypes(sanitize_text_field($_POST['check_in']), sanitize_text_field($_POST['check_out']));

    echo json_encode($data);
    wp_die();
}
?>
