<?php
add_action('wp_ajax_process_create_room', 'process_create_room_handler');
add_action('wp_ajax_nopriv_process_create_room', 'process_create_room_handler');

function process_create_room_handler() {
    if (!isset($_POST['params'])) {
        wp_send_json_error('No se recibieron parámetros.');
        exit;
    }
    $requiredParams = array(
        'room_id',
        'max_participants',
        'metadata'
    );

    $params = json_decode(stripslashes($_POST['params']), true);
    $metadata_params = $params['metadata'];
    $plugNmmetConnect = new plugNmeetConnect();

    try {

        $validateParams = validate_required_params($requiredParams, $params);
        if (is_array($validateParams)) {
            wp_send_json_error($validateParams->message);
            exit;
        }

        $createRoomParameters = $plugNmmetConnect->createRoom(
            $params['room_id'],
            $metadata_params['room_title'],
            $metadata_params['welcome_message'],
            $params['max_participants'],
            $metadata_params['webhook_url'],
            array(),
            $params['empty_timeout'],
            $metadata_params['logout_url'],
            ''
        );
        wp_send_json_success($createRoomParameters);
    } catch (Exception $e) {
        wp_send_json_error($e->getMessage());
    }
}

?>