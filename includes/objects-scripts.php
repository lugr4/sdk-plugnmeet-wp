<?php

// Cargar scripts de objetos
function spw_enqueue_scripts() {
    wp_enqueue_script( 'spw-activeRoomInfo-js', SPW_PLUGIN_URL . 'assets/js/sdk/Objects/activeRoomInfo.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'spw-activeRoomsInfo-js', SPW_PLUGIN_URL . 'assets/js/sdk/Objects/activeRoomsInfo.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'spw-createRoom-js', SPW_PLUGIN_URL . 'assets/js/sdk/Objects/createRoom.js', array('jquery'), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'spw_enqueue_scripts' );