<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Eliminar todas las opciones guardadas por el plugin
delete_option('spw_server_url');
delete_option('spw_api_key');
delete_option('spw_api_secret');

// Limpiar cualquier transient que podamos haber creado
delete_transient('settings_updated');
