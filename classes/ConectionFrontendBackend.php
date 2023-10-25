<?php

namespace AjaxMerakiBlocks;

/**
 * This class represents the process of conecting the frontend and backend in Ajax with Wordpress.
 */
if(! class_exists('AjaxMerakiBlocks\ConectionFrontendBackend')){
    class ConectionFrontendBackend {

        function __construct($server_action, $server_function){
            array($this, 'enqueue_my_scripts');

            add_action("wp_ajax_$server_action", $server_function);
            add_action("wp_ajax_nopriv_$server_action", $server_function);
        }

        function enqueue_my_scripts() {       
            add_action('wp_enqueue_scripts', function(){
                $my_script_vars = array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'security' => wp_create_nonce('mi-ajax-nonce')
                );
                wp_localize_script('my-general-script', 'my_script_vars', $my_script_vars);
            });
        }
    }
}
