<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Evitar acceso directo
}

function spw_admin_notices() {
    settings_errors('spw_messages');
}
add_action('admin_notices', 'spw_admin_notices');

// Guardar las configuraciones si se envió el formulario
if (isset($_POST['spw_save_settings'])) {
    if (!current_user_can('manage_options')) {
        wp_die(__('No tienes permisos suficientes para acceder a esta página.'));
    }

    check_admin_referer('spw_settings_nonce');

    // Sanitizar y guardar los valores
    update_option('spw_server_url', sanitize_text_field($_POST['server_url']));
    update_option('spw_api_key', sanitize_text_field($_POST['api_key']));
    update_option('spw_api_secret', sanitize_text_field($_POST['api_secret']));

    // Mostrar mensaje de éxito
    add_settings_error(
        'spw_messages',
        'spw_message',
        __('Configuración guardada exitosamente.', 'sdk-plugnmeet-wp'),
        'updated'
    );
}

// Obtener valores actuales
$server_url = get_option('spw_server_url', 'http://localhost:8080');
$api_key = get_option('spw_api_key', 'plugnmeet');
$api_secret = get_option('spw_api_secret', 'zumyyYWqv7KR2kUqvYdq4z4sXg7XTBD2ljT6');

?>

<div class="wrap">
    <h1><?php echo __('SDK Plugin PlugNmeet WP', 'sdk-plugnmeet-wp'); ?></h1>
    
    <div class="spw-header">
        <nav>
            <ul>
                <li><a href="<?php echo admin_url('admin.php?page=sdk_plugnmeet_wp_home'); ?>"><?php _e('Inicio', 'sdk-plugnmeet-wp'); ?></a></li>
                <li><a href="<?php echo admin_url('admin.php?page=sdk_plugnmeet_wp_docs'); ?>"><?php _e('Documentación', 'sdk-plugnmeet-wp'); ?></a></li>
            </ul>
        </nav>
    </div>

    <!-- Bloques de contenido -->
    <div class="spw-card">
        <h2><?php _e('Inicio', 'sdk-plugnmeet-wp'); ?></h2>
        <p><?php _e('Plugin para facilitar el manejo de la API de PlugNmeet.', 'sdk-plugnmeet-wp'); ?></p>
    </div>

    <div class="spw-card">
        <h2><?php _e('Configuración de PlugNMeet API', 'sdk-plugnmeet-wp'); ?></h2>
        <form method="post" class="spw-form">
            <?php wp_nonce_field('spw_settings_nonce'); ?>
            <table class="form-table spw-form-table" role="presentation">
                <tr>
                    <th scope="row">
                        <label for="server_url"><?php _e('URL del Servidor', 'sdk-plugnmeet-wp'); ?></label>
                    </th>
                    <td>
                        <input name="server_url" type="url" id="server_url" 
                               value="<?php echo esc_attr($server_url); ?>" 
                               class="regular-text">
                        <p class="description">
                            <?php _e('URL del servidor PlugNMeet (ejemplo: http://localhost:8080)', 'sdk-plugnmeet-wp'); ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="api_key"><?php _e('API Key', 'sdk-plugnmeet-wp'); ?></label>
                    </th>
                    <td>
                        <input name="api_key" type="text" id="api_key" value="<?php echo esc_attr($api_key); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="api_secret"><?php _e('API Secret', 'sdk-plugnmeet-wp'); ?></label>
                    </th>
                    <td>
                        <input name="api_secret" type="password" id="api_secret" value="<?php echo esc_attr($api_secret); ?>" class="regular-text">
                    </td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="spw_save_settings" class="button button-primary spw-button" 
                       value="<?php esc_attr_e('Guardar Cambios', 'sdk-plugnmeet-wp'); ?>">
            </p>
        </form>
    </div>

    <div class="spw-card spw-info">
        <h2><?php _e('Información del Plugin', 'sdk-plugnmeet-wp'); ?></h2>
        <p><?php _e('Este plugin proporciona una integración con la API de PlugNMeet para WordPress.', 'sdk-plugnmeet-wp'); ?></p>
        <p><?php _e('Para más información sobre cómo configurar tu servidor PlugNMeet, visita:', 'sdk-plugnmeet-wp'); ?> 
           <a href="https://www.plugnmeet.org" target="_blank">PlugNMeet Official</a>
        </p>
    </div>
</div>
