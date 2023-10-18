<?php
/**
 * Plugin Name:       AJAX Meraki Blocks
 * Description:       Example block written with ESNext standard and JSX support – build step required.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       meraki
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

define('MY_PLUGIN_PATH',plugin_dir_url(__FILE__));

require_once(__DIR__ . '/register_blocks.php');  

function load_api_with_ajax() {
    wp_enqueue_script('my-script', MY_PLUGIN_PATH . '/ajax-get-block-php/frontend.js', array('jquery'), '1.0', true);

    wp_localize_script('my-script', 'ajax_load_api', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}

add_action('wp_enqueue_scripts', 'load_api_with_ajax');

// Función para cargar datos desde una API REST
function cargar_data_desde_api() {

    $api_url = 'https://pokeapi.co/api/v2/pokemon/'; // Reemplaza con la URL de tu API

    $response = wp_remote_get($api_url);

    if (is_array($response) && !is_wp_error($response)) {
        $data = wp_remote_retrieve_body($response);
        echo $data; // Devuelve los datos al script AJAX
    } else {
        echo 'No se pudieron cargar los datos.';
    }

    die();
}

add_action('wp_ajax_cargar_api', 'cargar_data_desde_api');
add_action('wp_ajax_nopriv_cargar_api', 'cargar_data_desde_api');

