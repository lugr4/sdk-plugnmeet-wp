<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Evitar acceso directo
}

// Registrar los menús en el dashboard
add_action( 'admin_menu', 'spw_add_admin_menu' );

function spw_add_admin_menu() {
    $menu_slug = SPW_SLUG;
    add_menu_page(
        __( 'PlugNmeet-API WP', 'sdk-plugnmeet-wp' ), 
        __( 'PlugNmeet-API WP', 'sdk-plugnmeet-wp' ), 
        'manage_options', 
        SPW_SLUG, 
        'spw_admin_home_page', 
        'dashicons-shield-alt', 
        61 
    );

    // Submenú Home
    add_submenu_page(
        SPW_SLUG,
        __( 'Inicio', 'sdk-plugnmeet-wp' ),
        __( 'Inicio', 'sdk-plugnmeet-wp' ),
        'manage_options',
        SPW_SLUG.'_home',
        'spw_admin_home_page'
    );

    // Submenú Documentación
    add_submenu_page(
        SPW_SLUG,
        __('Documentación', 'sdk-plugnmeet-wp'),
        __('Documentación', 'sdk-plugnmeet-wp'),
        'manage_options',
        SPW_SLUG.'_docs',
        'spw_admin_docs_page'
    );

    // Eliminar el submenú duplicado que WordPress genera automáticamente
    add_action('admin_head', function() use ($menu_slug) {
        remove_submenu_page(SPW_SLUG, SPW_SLUG);
    });
}

function spw_admin_home_page() {
    include SPW_PLUGIN_DIR . 'includes/admin/modules/home-page.php';
}

function spw_admin_docs_page() {
    include SPW_PLUGIN_DIR . 'includes/admin/modules/documentation.php';
}


