<?php

namespace AjaxMerakiBlocks;

/**
 * This class represents the process of saving data in the Wordpress database.
 */
if(! class_exists('AjaxMerakiBlocks\AjaxGetFromDatabase')){
    class AjaxGetFromDatabase {

        function __construct(){
            add_action('wp_enqueue_scripts', array($this, 'enqueue_my_scripts'));

            add_action('wp_ajax_get_data_from_usermeta', array($this,'get_data_from_usermeta'));
            add_action('wp_ajax_nopriv_get_data_from_usermeta', array($this,'get_data_from_usermeta'));
        }

        function enqueue_my_scripts() {
            wp_enqueue_script('mi-script-get', MY_PLUGIN_PATH . '/src/ajax-get-db-block/frontend.js', array('jquery'), '1.0', true);
        
            $my_script_vars = array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'security' => wp_create_nonce('mi-ajax-nonce')
            );
        
            wp_localize_script('mi-script-get', 'my_script_vars', $my_script_vars);
        }

        function get_data_from_usermeta() {
            $user_id = get_current_user_id();
            $meta_key = 'days_of_the_year';
            
            if ($user_id) {
                $user_data = get_user_meta($user_id, $meta_key, true);
                echo json_encode($user_data);
            } else {
                echo 'Usuario no autenticado.';
            }
            wp_die();
        }

    }
}
