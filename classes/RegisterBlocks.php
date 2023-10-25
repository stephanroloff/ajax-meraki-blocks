<?php

namespace AjaxMerakiBlocks;

if(! class_exists('AjaxMerakiBlocks\RegisterBlocks')){
    class RegisterBlocks {

        function __construct(){
            add_action( 'init', array($this, 'create_ajax_blocks'));
        }

        function create_ajax_blocks() {

            // $folder = dirname(__FILE__) . '/build';
            // $name_folder = array();
            // $files = scandir($folder);
        
            // foreach($files as $file) {
            //     if(is_dir($folder . '/' . $file)) {
            //         $name_folder[] = $file;
            //     }
            // }
        
            // foreach ($name_folder as $key => $value) {
            //     if($value == "." || $value == ".." || $value == "images") continue;
            //     register_block_type( dirname(__FILE__) . '/build' . '/' . $value );
            // }


            $current_directory = dirname(__FILE__); // Currently Route
            $parent_directory = dirname($current_directory); // Route one level above

            register_block_type( $parent_directory . '/build/ajax-get-block' );
            register_block_type( $parent_directory . '/build/ajax-get-rest-block' );
            register_block_type( $parent_directory . '/build/ajax-get-db-block' );
            register_block_type( $parent_directory . '/build/ajax-post-db-block' );
        }
    }
}
