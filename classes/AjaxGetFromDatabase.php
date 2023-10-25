<?php

namespace AjaxMerakiBlocks;

/**
 * This class represents the process of saving data in the Wordpress database.
 */
if(! class_exists('AjaxMerakiBlocks\AjaxGetFromDatabase')){
    class AjaxGetFromDatabase {

        function __construct(){
            $ConectionFrontendBackend = new ConectionFrontendBackend('get_data_from_usermeta', array($this, 'get_data_from_usermeta'));
        }

        function get_data_from_usermeta() {
            $user_id = get_current_user_id();
            $meta_key = 'days_of_the_year';
            
            if ($user_id) {
                $user_data = get_user_meta($user_id, $meta_key, true);
                echo json_encode($user_data);
            } else {
                echo 'Unauthenticated user';
            }
            wp_die();
        }

    }
}
