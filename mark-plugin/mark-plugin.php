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

class MarkPlugin {

    public $plugin;
    
    function __construct() {
        $this->plugin = plugin_basename(__FILE__);
    }

    // function __construct() {
    //     add_action('init', [$this, 'custom_post_type']);
    // }

    // public function custom_post_type() {
    //     register_post_type('book', ['public' => true, 'label' => 'books']);
    // }

    function register() {
        add_action('admin_enqueue_scripts', array ($this, 'enqueue'));

        add_action('admin_menu', array($this, 'add_admin_pages'));

        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    public function settings_link($links) {
        $settings_link = '<a href="admin.php?page=mark_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    public function add_admin_pages() {
        add_menu_page('Mark Plugin', 'Mark', 'manage_options', 'mark_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
    }

    public function admin_index() {
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';

    }

    public function activate() {
        require_once plugin_dir_path(__FILE__) . 'inc/mark-plugin-activate.php';
        MarkPluginActivate::activate();
    }

    

    function enqueue() {
        wp_enqueue_style('mypluginstyle', plugins_url('assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('assets/myscript.js', __FILE__));
    }
}

if ( class_exists('MarkPlugin') ) {
    $markPlugin = new MarkPlugin();
    $markPlugin->register();
}

//activation 
register_activation_hook( __FILE__, array( $markPlugin, 'activate' ) );

//deactivation
require_once plugin_dir_path(__FILE__) . 'inc/mark-plugin-deactivate.php';
register_deactivation_hook( __FILE__, array( 'MarkPluginDeactivate', 'deactivate' ) );

//uninstall
// register_uninstall_hook( __FILE__, array( $markPlugin, 'uninstall' ) );