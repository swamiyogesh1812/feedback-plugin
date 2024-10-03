<?php
function feedback_plugin_save_feedback($post_id, $user_name, $user_email, $feedback) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'feedback';
    $wpdb->insert($table_name, [
        'post_id' => $post_id,
        'user_name' => sanitize_text_field($user_name),
        'user_email' => sanitize_email($user_email),
        'feedback' => sanitize_textarea_field($feedback)
    ]);
}

function feedback_plugin_get_feedback($post_id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'feedback';

    return $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM $table_name WHERE post_id = %d ORDER BY submitted_at DESC", 
        $post_id
    ));
}
