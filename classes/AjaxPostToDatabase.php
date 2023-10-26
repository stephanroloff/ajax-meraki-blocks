<?php

namespace AjaxMerakiBlocks;

/**
 * This class represents the process of saving data in the Wordpress database.
 */
if(! class_exists('AjaxMerakiBlocks\AjaxPostToDatabase')){
    class AjaxPostToDatabase {

        function __construct(){
            $ConectionFrontendBackend = new ConectionFrontendBackend('post_data_to_usermeta', array($this, 'post_data_to_usermeta'));
        }

        function post_data_to_usermeta() {
            check_ajax_referer('mi-ajax-nonce', 'security');
            $mi_parametro = $_POST['mi_parametro'];
            $this->saveData($mi_parametro);
            wp_die();
        }

        function saveData($mi_parametro){
            
            $valor_texto = sanitize_text_field($mi_parametro['valor_texto']);
            $user_id = absint($mi_parametro['user_id']);
            $meta_key = 'days_of_the_year';
            
            if (metadata_exists('user', $user_id, $meta_key)) {

                $meta_value = get_user_meta($user_id, $meta_key, true);

                date_default_timezone_set('Europe/Berlin');
                $fechaHoraActual = date('Y-m-d H:i:s');
                array_push($meta_value, $fechaHoraActual);

                echo 'Metadato existe, te lo mostramos:';
                echo '<br>';
                echo 'user_id: ' . $user_id;
                echo '<br>';
                echo 'meta_key: ' . $meta_key;
                echo '<br>';
                echo '<pre>';
                var_dump($meta_value);
                echo '</pre>';
                echo '<br>';

                update_user_meta($user_id, $meta_key, $meta_value);
                
                // delete_user_meta($user_id, $meta_key);
                // echo 'Dato Borrado con exito';
            } else {
                echo 'Metadata doesnt exist, we create it...';
                date_default_timezone_set('Europe/Berlin');
                $fechaHoraActual = date('Y-m-d H:i:s');

                $array_fechas = array($fechaHoraActual);
                var_dump($array_fechas);

                add_user_meta($user_id, $meta_key, $array_fechas);

                echo '<br>';
                echo 'user_id: ' . $user_id;
                echo '<br>';
                echo 'meta_key: ' . $meta_key;
                echo '<br>';
                echo 'meta value: ' . $fechaHoraActual;
            }
        }
    }
}
