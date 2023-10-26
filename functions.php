<?php
/**
 * Plugin Name:       AJAX Meraki Blocks
 * Description:       Example block written with ESNext standard and JSX support – build step required.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       meraki
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

 namespace AjaxMerakiBlocks;

 require __DIR__ . '/vendor/autoload.php';
 define('MY_PLUGIN_PATH', plugin_dir_url(__FILE__));
 
 $RegisterBlocks = new RegisterBlocks();
 $AjaxGetFromRestApi = new AjaxGetFromRestApi();
 $AjaxPostToDatabase = new AjaxPostToDatabase();
 $AjaxGetFromDatabase = new AjaxGetFromDatabase();

 
 
 
