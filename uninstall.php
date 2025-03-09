<?php
/**
 * Archivo de desinstalación del plugin SDK PlugNmeet WP
 *
 * Este archivo se ejecuta cuando el plugin es desinstalado.
 * Elimina todas las opciones y datos guardados por el plugin.
 */

// Si WordPress no llama este archivo directamente, salir
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Asegurarse de que la función existe
if (!function_exists('delete_option')) {
    require_once(ABSPATH . 'wp-admin/includes/option.php');
}

// Eliminar todas las opciones guardadas por el plugin
$options_to_delete = array(
    'spw_server_url',
    'spw_api_key',
    'spw_api_secret'
);

foreach ($options_to_delete as $option) {
    delete_option($option);
}

// Limpiar cualquier transient que podamos haber creado
delete_transient('settings_updated');

// Limpiar la caché
wp_cache_flush();
