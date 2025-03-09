# PlugNMeet SDK for WordPress

## Aviso Importante
Este plugin es un desarrollo independiente a partir del desarrollo oficial del SDK para PHP de https://github.com/mynaparrot y no está oficialmente asociado con el equipo de PlugNMeet. Ha sido creado como una herramienta de integración por desarrolladores externos para facilitar el uso de PlugNMeet en WordPress.

## Descripción
Este plugin de WordPress proporciona una capa de integración para utilizar el SDK de PlugNMeet en un entorno WordPress, permitiendo la comunicación con un servidor dedicado de PlugNMeet a través de llamadas AJAX. El plugin está diseñado para desarrolladores que desean integrar funcionalidades de PlugNMeet en sus sitios WordPress utilizando su propio servidor dedicado.

## Estado Actual
El plugin actualmente proporciona:
- Integración del SDK de PlugNMeet en WordPress
- Soporte para llamadas AJAX al servidor dedicado de PlugNMeet
- Configuración básica para credenciales de API
- Base para desarrollo de integraciones personalizadas

## Requisitos Previos
- WordPress 5.0 o superior
- PHP 7.4 o superior
- Servidor dedicado de PlugNMeet (consultar en [PlugNMeet Official](https://www.plugnmeet.org))
- Credenciales de API del servidor PlugNMeet

## Instalación
1. Descarga o clona el repositorio en tu directorio de plugins de WordPress:
2. Navega a tu panel de WordPress
3. Ve a **Plugins > Plugins Instalados**
4. Localiza "PlugNMeet SDK WP" y haz clic en **Activar**

Alternativamente:
1. Descarga el plugin como archivo `.zip`
2. Súbelo en el panel de WordPress en **Plugins > Añadir Nuevo > Subir Plugin**
3. Activa el plugin

## Configuración
1. Una vez activado, ve a la sección de configuración del plugin
2. Ingresa las credenciales de API de tu servidor PlugNMeet:
   - URL del servidor
   - API Key
   - API Secret

## Uso para Desarrolladores
El plugin proporciona una base para realizar llamadas AJAX al servidor PlugNMeet:

### Ejemplo de Uso Básico
```JS
// Ejemplo de llamada AJAX para obtener información de la sala activa
jQuery(document).ready(function ($) {
    $('#btn').on('click', function (event) {
        event.preventDefault();
        /*Prepare params*/
        const params = ActiveRoomInfoParams({
            room_id: 'room01',
        });
        //Preapare json with params
        const paramsjson = JSON.stringify(params);

        // Do AJAX
        $.ajax({
            url: ajaxurl.ajaxurl, //WP admin ajax 
            type: 'POST',
            data: {
                action: 'process_active_room_info', //Action (Actions list)
                params: paramsjson //params
            },
            success: function (response) {
                // Manejar la respuesta del servidor
                if (response) {
                    console.log(response);
                }
            },
            error: function (error) {
                console.error('Error en la solicitud AJAX:', error);
            }
        });
    });
});
```

## Servidor Dedicado
Este plugin requiere un servidor dedicado de PlugNMeet. Para información sobre cómo configurar tu propio servidor, visita la [documentación oficial de PlugNMeet](https://www.plugnmeet.org).

## Soporte y Contribución
- Para reportar problemas, utiliza la sección de Issues en GitHub
- Las contribuciones son bienvenidas mediante Pull Requests
- Para soporte técnico, contacta al desarrollador

## Limitaciones Actuales
- El plugin está enfocado en proporcionar una capa de integración básica
- No incluye interfaz administrativa completa (solo configuración de credenciales)
- Requiere conocimientos de desarrollo para su implementación
- Necesita un servidor dedicado de PlugNMeet

## Licencia
Este proyecto está licenciado bajo GPLv2 o posterior

## Créditos
- Desarrollado por lugr4
- Basado en el SDK oficial de PlugNMeet por mynaparrot
- PlugNMeet es una marca registrada de sus respectivos propietarios
- Este es un desarrollo independiente no afiliado oficialmente con PlugNMeet

## Changelog
### 1.0.0
- Lanzamiento inicial
- Integración del SDK de PlugNMeet
- Soporte para llamadas AJAX
- Configuración básica de credenciales API


