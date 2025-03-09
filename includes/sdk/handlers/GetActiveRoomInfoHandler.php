<?php
add_action('wp_ajax_process_active_room_info', 'process_active_room_info_handler');
add_action('wp_ajax_nopriv_process_active_room_info', 'process_active_room_info_handler');

function process_active_room_info_handler() {
    if (!isset($_POST['params'])) {
        wp_send_json_error('No se recibieron parámetros.');
        exit;
    }
    $params = json_decode(stripslashes($_POST['params']), true);
    $plugNmmetConnect = new plugNmeetConnect();

    try {
        if (!isset($params['room_id']) || empty($params['room_id'])) {
            wp_send_json_error('El parámetro room_id es obligatorio.');
            exit;
        }

        $pnm_response = $plugNmmetConnect-> getActiveRoomInfo($params['room_id']);
        wp_send_json_success($pnm_response);

        exit;
    } catch (Exception $e) {
        wp_send_json_error($e->getMessage());
        exit;
    }
}

?>