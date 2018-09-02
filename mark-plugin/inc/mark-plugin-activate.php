<?php

/**
* @package MarkPlugin
*/

class MarkPluginActivate {
    public static function activate() {
        flush_rewrite_rules();
    }
}