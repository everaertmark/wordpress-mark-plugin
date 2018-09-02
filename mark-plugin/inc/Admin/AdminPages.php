<?php

namespace Inc\Admin;

class AdminPages {

    function __construct() {

    }

    public function settings_link($links) {
        $settings_link = '<a href="admin.php?page=mark_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}