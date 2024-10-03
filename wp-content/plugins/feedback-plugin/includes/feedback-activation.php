<?php
function feedback_plugin_activate() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'feedback'; 
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        post_id bigint(20) NOT NULL,
        user_name varchar(255) NOT NULL,
        user_email varchar(255) NOT NULL,
        feedback text NOT NULL,
        submitted_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
function feedback_plugin_deactivate() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'feedback';
    $sql = "DROP TABLE IF EXISTS $table_name;";
    $wpdb->query($sql);
}
