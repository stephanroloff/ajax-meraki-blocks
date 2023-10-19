<?php

namespace AjaxMerakiBlocks;

if(! class_exists('AjaxMerakiBlocks\AjaxGetFromRestApi')){
    class AjaxGetFromRestApi {

        function __construct(){
            add_action('wp_enqueue_scripts', array($this, 'load_api_with_ajax'));

            add_action('wp_ajax_load_api', array($this, 'load_data_from_api'));
            add_action('wp_ajax_nopriv_load_api', array($this,'load_data_from_api'));
        }

        function load_api_with_ajax() {
            wp_enqueue_script('my-script', MY_PLUGIN_PATH . '/ajax-get-rest-block/frontend.js', array('jquery'), '1.0', true); //ARREGLAR??

            wp_localize_script('my-script', 'ajax_load_api', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            ));
        }

        function load_data_from_api() {

            $api_url = 'https://pokeapi.co/api/v2/pokemon/'; 

            $response = wp_remote_get($api_url);

            if (is_array($response) && !is_wp_error($response)) {
                $data = wp_remote_retrieve_body($response);
                echo $data;
            } else {
                echo 'It was not possible to load the data';
            }

            die();
        }

    }
}
