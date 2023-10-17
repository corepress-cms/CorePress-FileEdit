<?php
/*
 * Plugin Name:       Theme & plugin file editor
 * Plugin URI:        https://corepress.org/
 * Description:       Edit theme & plugin files from the admin panel
 * Version:           0.0.1
 * Requires at least: 6.3
 * Requires PHP:      7.2
 * Author:            CorePress Team
 * Author URI:        https://corepress.org/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://corepress.org/compatibility/
 * Network:           true
 */

require_once __DIR__ . '/views/plugin-editor.php';
require_once __DIR__ . '/views/theme-editor.php';

// Add 'Plugin File Editor' to the bottom of the Plugins (non-block themes) or Tools (block themes) menu.
if ( is_multisite() ) {
    add_action( 'network_admin_menu', 'corepress_file_editor_add_submenu_item' );
} else {
    add_action( 'admin_menu', 'corepress_file_editor_add_submenu_item' );
}

function corepress_file_editor_add_submenu_item() {
    add_submenu_page(
		( wp_is_block_theme() && ! is_multisite() ) ? 'tools.php' : 'themes.php',
		'Theme File Editor',
		'Theme File Editor',
        'manage_options',
        'corepress_file_editor_theme',
        'corepress_file_editor_theme_display_editor'
    );
    add_submenu_page(
		( wp_is_block_theme() && ! is_multisite() ) ? 'tools.php' : 'plugins.php',
		'Plugin File Editor',
		'Plugin File Editor',
        'manage_options',
        'corepress_file_editor_plugin',
        'corepress_file_editor_plugin_display_editor'
    );
}
