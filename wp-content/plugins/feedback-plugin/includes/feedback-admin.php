<?php
function feedback_plugin_admin_menu() {
    add_menu_page('Feedback', 'Feedback', 'manage_options', 'feedback-plugin', 'feedback_plugin_admin_page');
}
add_action('admin_menu', 'feedback_plugin_admin_menu');

function feedback_plugin_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'feedback';
    $feedbacks = $wpdb->get_results("SELECT * FROM $table_name ORDER BY submitted_at DESC");

    echo '<div class="wrap"><h1>Feedback Submissions</h1>';
    echo '<table class="widefat"><thead><tr><th>ID</th><th>Post ID</th><th>Name</th><th>Email</th><th>Feedback</th><th>Date</th></tr></thead><tbody>';

    foreach ($feedbacks as $feedback) {
        echo '<tr>';
        echo '<td>' . esc_html($feedback->id) . '</td>';
        echo '<td>' . esc_html($feedback->post_id) . '</td>';
        echo '<td>' . esc_html($feedback->user_name) . '</td>';
        echo '<td>' . esc_html($feedback->user_email) . '</td>';
        echo '<td>' . esc_html($feedback->feedback) . '</td>';
        echo '<td>' . esc_html($feedback->submitted_at) . '</td>';
        echo '</tr>';
    }

    echo '</tbody></table></div>';
}
