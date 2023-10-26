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
            $user = new User();
            $user_id = $user->get_id();
            
            if ($user_id) {
                $user_data = $user->get_user_metadata_by_meta_key('days_of_the_year');
                echo json_encode($user_data);
            } else {
                echo 'Unauthenticated user';
            }
            wp_die();
        }

    }
}
