<?php

namespace AjaxMerakiBlocks;

if(! class_exists('AjaxMerakiBlocks\AjaxPostToDatabase')){
    class AjaxPostToDatabase {

        function __construct(){
            add_action('wp_enqueue_scripts', array($this, 'enqueue_my_scripts'));

            add_action('wp_ajax_mi_funcion_ajax', array($this,'mi_funcion_ajax'));
            add_action('wp_ajax_nopriv_mi_funcion_ajax', array($this,'mi_funcion_ajax'));
        }

        function mi_funcion_ajax() {
            check_ajax_referer('mi-ajax-nonce', 'security');
            
            // Obtén el arreglo enviado desde el frontend
            $mi_parametro = $_POST['mi_parametro'];
            
            // Accede a los valores dentro del arreglo
            $valor_texto = sanitize_text_field($mi_parametro['valor_texto']);
            $user_id = absint($mi_parametro['user_id']);
            
            // Devuelve una respuesta al cliente
            echo 'Respuesta exitosa 1: ' . $valor_texto;
            echo '<pre>';
            echo 'Respuesta exitosa 2: ' . $user_id;
        
            wp_die();
        }

        function enqueue_my_scripts() {
            wp_enqueue_script('mi-script-post', MY_PLUGIN_PATH . '/src/ajax-post-db-block/frontend.js', array('jquery'), '1.0', true);
        
            $my_script_vars = array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'security' => wp_create_nonce('mi-ajax-nonce')
            );
        
            wp_localize_script('mi-script-post', 'my_script_vars', $my_script_vars);
        }
    }
}
