<?php
/**
 * Plugin Name: SDK PlugNmeet WP
 * Plugin URI: ***
 * Description: Plugin para manejar peticiones a la API de PlugNMeet desde WordPress.
 * Version: 1.0.0
 * Author: lugr4
 * Author URI: ***
 * License: GPLv2
 * Text Domain: sdk-plugnmeet-wp
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
// Definir constantes del plugin
define( 'SPW_VERSION', '1.0.0' );
define( 'SPW_SLUG', 'sdk_plugnmeet_wp' );

define( 'SPW_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SPW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Función de inicialización del plugin
function spw_init() {
    // Registrar la función para mostrar mensajes de admin
    add_action('admin_notices', 'spw_display_admin_notices');
}
add_action('init', 'spw_init');

// Función para mostrar mensajes de admin
function spw_display_admin_notices() {
    if (isset($_GET['page']) && $_GET['page'] === SPW_SLUG . '_home') {
        settings_errors('spw_messages');
    }
}

// Cargar estilos de administración
function spw_enqueue_admin_styles($hook) {
    if (strpos($hook, SPW_SLUG) !== false) {
        wp_enqueue_style(
            'spw-admin-styles',
            SPW_PLUGIN_URL . 'assets/css/admin-styles.css',
            array(),
            SPW_VERSION
        );
    }
}
add_action('admin_enqueue_scripts', 'spw_enqueue_admin_styles');

//Cargar codigos
require_once SPW_PLUGIN_DIR . 'includes/admin/admin-menu.php';
require_once SPW_PLUGIN_DIR . 'includes/api-setup.php';
require_once SPW_PLUGIN_DIR . 'includes/objects-scripts.php';

function imprimir_scripts_ajax() {
    $script_ajax = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    );
    echo "<script type='text/javascript'>var ajaxurl = " . json_encode($script_ajax) . ";</script>";
}
// Llamar a la función en el gancho wp_head
add_action('wp_head', 'imprimir_scripts_ajax');



