<?php
/*
Plugin Name: Feedback Plugin
Description: A simple plugin that allows users to submit feedback on posts.
Version: 1.0
Author: Yogesh
*/

if (!defined('ABSPATH')) {
    exit;
}
require_once plugin_dir_path(__FILE__) . 'includes/feedback-activation.php';
require_once plugin_dir_path(__FILE__) . 'includes/feedback-database.php';
require_once plugin_dir_path(__FILE__) . 'includes/feedback-form.php';
require_once plugin_dir_path(__FILE__) . 'includes/feedback-display.php';
require_once plugin_dir_path(__FILE__) . 'includes/feedback-admin.php';

register_activation_hook(__FILE__, 'feedback_plugin_activate');
register_deactivation_hook(__FILE__, 'feedback_plugin_deactivate');

function feedback_plugin_init() {
    wp_enqueue_script('feedback-plugin-js', plugin_dir_url(__FILE__) . 'assets/js/feedback-plugin.js', array('jquery'), null, true);
    wp_localize_script('feedback-plugin-js', 'feedback_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('init', 'feedback_plugin_init');