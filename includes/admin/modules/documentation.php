<?php
if (!defined('ABSPATH')) {
    exit; // Evitar acceso directo
}
?>

<div class="wrap">
    <h1><?php echo __('Documentación del SDK', 'sdk-plugnmeet-wp'); ?></h1>
    
    <div class="spw-header">
        <nav>
            <ul>
                <li><a href="<?php echo admin_url('admin.php?page=sdk_plugnmeet_wp_home'); ?>"><?php _e('Inicio', 'sdk-plugnmeet-wp'); ?></a></li>
                <li><a href="<?php echo admin_url('admin.php?page=sdk_plugnmeet_wp_docs'); ?>"><?php _e('Documentación', 'sdk-plugnmeet-wp'); ?></a></li>
            </ul>
        </nav>
    </div>

    <!-- Introducción -->
    <div class="spw-card">
        <h2><?php _e('Integración con Páginas de WordPress', 'sdk-plugnmeet-wp'); ?></h2>
        <p><?php _e('Para integrar la funcionalidad de PlugNMeet en tus páginas de WordPress, necesitarás incluir el siguiente código en tu tema o plugin:', 'sdk-plugnmeet-wp'); ?></p>
        
        <h3><?php _e('1. Estructura HTML Necesaria', 'sdk-plugnmeet-wp'); ?></h3>
        <div class="spw-code-block">
            <pre class="spw-code">&lt;!-- Asegúrate de tener estas etiquetas en tu header -->
&lt;head>
    &lt;meta charset="&lt;?php bloginfo('charset'); ?>">
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0">
    &lt;?php wp_head(); ?>
&lt;/head>

&lt;body &lt;?php body_class(); ?>>
    &lt;!-- Tus botones o elementos de interfaz -->
    &lt;button id="getactiveInfoRoom">Get Active Room Info&lt;/button>
    &lt;button id="createRoom">Create room&lt;/button>

    &lt;?php wp_footer(); ?>
&lt;/body></pre>
        </div>

        <h3><?php _e('2. Código JavaScript', 'sdk-plugnmeet-wp'); ?></h3>
        <p><?php _e('Añade este código JavaScript para manejar las interacciones:', 'sdk-plugnmeet-wp'); ?></p>
        <div class="spw-code-block">
            <pre class="spw-code">jQuery(document).ready(function ($) {
    $('#getactiveInfoRoom').on('click', function (event) {
        event.preventDefault();
        const params = ActiveRoomInfoParams({
            room_id: 'id_room',
        });
        
        $.ajax({
            url: ajaxurl.ajaxurl,
            type: 'POST',
            data: {
                action: 'process_active_room_info',
                params: JSON.stringify(params)
            },
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });

    $('#createRoom').on('click', function (event) {
        event.preventDefault();
        const metadata = createRooMetadata({
            room_title: 'Title API',
        });
        const params = createRoomParams({
            room_id: 'id_room',
            max_participants: 10,
            metadata: metadata
        });
        
        $.ajax({
            url: ajaxurl.ajaxurl,
            type: 'POST',
            data: {
                action: 'process_create_room',
                params: JSON.stringify(params)
            },
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });
});</pre>
        </div>

        <h3><?php _e('Notas Importantes', 'sdk-plugnmeet-wp'); ?></h3>
        <ul class="spw-info-list">
            <li><?php _e('El plugin ya incluye la variable ajaxurl necesaria para las llamadas AJAX.', 'sdk-plugnmeet-wp'); ?></li>
            <li><?php _e('Las funciones ActiveRoomInfoParams y createRoomParams están disponibles globalmente.', 'sdk-plugnmeet-wp'); ?></li>
            <li><?php _e('Asegúrate de tener jQuery cargado en tu tema.', 'sdk-plugnmeet-wp'); ?></li>
            <li><?php _e('Las credenciales de API deben estar configuradas en la página de configuración del plugin.', 'sdk-plugnmeet-wp'); ?></li>
        </ul>
    </div>

    <!-- Ejemplos Adicionales -->
    <div class="spw-card spw-info">
        <h2><?php _e('Ejemplos de Parámetros', 'sdk-plugnmeet-wp'); ?></h2>
        <h3><?php _e('Crear una Sala', 'sdk-plugnmeet-wp'); ?></h3>
        <pre class="spw-code">const metadata = createRooMetadata({
    room_title: 'Mi Sala',
    welcome_message: '¡Bienvenido a la sala!',
    room_features: {
        allow_webcams: true,
        mute_on_start: false,
        allow_screen_share: true
    }
});</pre>

        <h3><?php _e('Consultar Información de Sala', 'sdk-plugnmeet-wp'); ?></h3>
        <pre class="spw-code">const params = ActiveRoomInfoParams({
    room_id: 'sala_123',
    fetch_participants: true
});</pre>
    </div>

    <!-- Recursos Adicionales -->
    <div class="spw-card">
        <h2><?php _e('Recursos Adicionales', 'sdk-plugnmeet-wp'); ?></h2>
        <ul>
            <li><a href="https://www.plugnmeet.org" target="_blank"><?php _e('Documentación Oficial de PlugNMeet', 'sdk-plugnmeet-wp'); ?></a></li>
            <li><a href="https://github.com/mynaparrot/plugNmeet-sdk-php" target="_blank"><?php _e('SDK PHP de PlugNMeet', 'sdk-plugnmeet-wp'); ?></a></li>
        </ul>
    </div>
</div>

<style>
.spw-code-block {
    margin: 20px 0;
}

.spw-code {
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    padding: 15px;
    font-family: monospace;
    white-space: pre-wrap;
    overflow-x: auto;
    font-size: 14px;
    line-height: 1.5;
}

.spw-info-list {
    background: #f0f6fc;
    border-left: 4px solid #72aee6;
    padding: 15px 15px 15px 35px;
    margin: 20px 0;
}

.spw-info-list li {
    margin-bottom: 10px;
}
</style> 