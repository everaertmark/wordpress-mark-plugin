<?php

/**
 * @package MarkPlugin
*/

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController{

    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function register() {
        $this->settings = new SettingsApi();  

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage("Dashboard")->addSubPages($this->subpages)->register();
    }

    public function setPages() {
        $this->pages = array(
            array(
                'page_title' => 'Mark plugin',
                'menu_title' => 'Mark',
                'capability' => 'manage_options',
                'menu_slug' => 'mark_plugin',
                'callback' => array( $this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function setSubPages() {
        $this->subpages = array(
            array(
                'parent_slug' => 'mark_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'mark_cpt',
                'callback' => array( $this->callbacks, 'cptDashboard')
            ),
            array(
                'parent_slug' => 'mark_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'mark_taxonomies',
                'callback' => array( $this->callbacks, 'taxonomiesDashboard')
            ),
            array(
                'parent_slug' => 'mark_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'mark_widgets',
                'callback' => array( $this->callbacks, 'widgetsDashboard')
            )
        );
    }

    public function setSettings() {
        $args = array(
            array(
                'option_group' => 'mark_options_group',
                'option_name' => 'text_example',
                'callback' => array( $this->callbacks, 'markOptionsGroup')
            ),
            array(
                'option_group' => 'mark_options_group',
                'option_name' => 'first_name'
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections() {
        $args = array(
            array(
                'id' => 'mark_admin_index',
                'title' => 'Settings',
                'callback' => array( $this->callbacks, 'markAdminSection'),
                'page' => 'mark_plugin'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields() {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array( $this->callbacks, 'markTextExample'),
                'page' => 'mark_plugin',
                'section' => 'mark_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'first_name',
                'title' => 'First name',
                'callback' => array( $this->callbacks, 'markTextFirstName'),
                'page' => 'mark_plugin',
                'section' => 'mark_admin_index',
                'args' => array(
                    'label_for' => 'first_name',
                    'class' => 'example-class'
                )
            )

        );

        $this->settings->setFields($args);
    }
}