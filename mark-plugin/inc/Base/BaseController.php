<?php

/**
* @package MarkPlugin
*/

namespace Inc\Base;

class BaseController {
    
    public $plugin_path;

    public $plugin_url;

    public $plugin;

    public function __construct() {
        $this->plugin_path = plugin_dir_path(dirname(__DIR__));
        $this->plugin_url = plugin_dir_url(dirname(__DIR__));
        $this->plugin = plugin_basename(dirname(__DIR__));
    }
}