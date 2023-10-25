<?php

namespace AjaxMerakiBlocks;

if(! class_exists('AjaxMerakiBlocks\RegisterBlocks')){
    class RegisterBlocks {

        function __construct(){
            add_action( 'init', array($this, 'create_ajax_blocks'));
        }

        function create_ajax_blocks() {

            $current_directory = dirname(__FILE__); //Currently Route
            $blocks_directory = dirname($current_directory) . '/build'; //One Route above


            if (is_dir($blocks_directory)) {
                $block_files = scandir($blocks_directory);

                foreach ($block_files as $file) {
                    // Ignore files that are not directories and those that begin with a dot
                    if ((!is_dir($blocks_directory . '/' . $file)) || $file[0] === '.') {
                        continue;
                    }

                    $block_path = $blocks_directory . '/' . $file;
                    register_block_type($block_path);
                }
            }

            // $current_directory = dirname(__FILE__); // Currently Route
            // $parent_directory = dirname($current_directory); // Route one level above

            // register_block_type( $parent_directory . '/build/ajax-get-block' );
            // register_block_type( $parent_directory . '/build/ajax-get-rest-block' );
            // register_block_type( $parent_directory . '/build/ajax-get-db-block' );
            // register_block_type( $parent_directory . '/build/ajax-post-db-block' );
        }
    }
}




