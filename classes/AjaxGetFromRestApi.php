<?php

namespace AjaxMerakiBlocks;

if(! class_exists('AjaxMerakiBlocks\AjaxGetFromRestApi')){
    class AjaxGetFromRestApi {

        function __construct(){
            $ConectionFrontendBackend = new ConectionFrontendBackend('get_data_from_rest_api', array($this, 'get_data_from_rest_api'));
        }

        function get_data_from_rest_api() {

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
