<?php

/**
* @package MarkPlugin
*/

class MarkPluginDeactivate {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}