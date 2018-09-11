<?php

/**
 * @package MarkPlugin
 */
/*
Plugin Name: Mark Plugin
Plugin URI: http://google.com
Description: First attempt of creating a custom plugin 
Version: 1.0.1
Author: Mark Everaert
Author URI: http://everaertdesign.nl
License: GPLv2 or later
Text domain: Mark plugin
*/

if (!defined('ABSPATH')) {  
    die('No access given');
}

if (file_exists(dirname(__FILE__). '/vendor/autoload.php')) {
    require_once dirname(__FILE__). '/vendor/autoload.php';
}

function activate_mark_plugin() {
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_mark_plugin');

function deactivate_mark_plugin() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_mark_plugin');

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}