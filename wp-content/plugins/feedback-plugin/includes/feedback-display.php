<?php
function feedback_form_append_to_post($content) {
    if (is_single()) {
        $form = do_shortcode('[feedback_form]');
        $content .= $form;
    }
    return $content;
}
add_filter('the_content', 'feedback_form_append_to_post');


function display_feedback_list($content) {
    global $wpdb;
    $post_id = get_the_ID(); 
    $table_name = $wpdb->prefix . 'feedback';
    $feedbacks = $wpdb->get_results($wpdb->prepare(
        "SELECT user_name, feedback FROM $table_name WHERE post_id = %d ORDER BY submitted_at DESC",
        $post_id
    ));
    if (!empty($feedbacks)) {
        $feedback_html = '<h3>Feedback from Readers:</h3>';
        $feedback_html .= '<ul class="feedback-list">';
        
        foreach ($feedbacks as $feedback) {
            $feedback_html .= '<li>';
            $feedback_html .= '<strong>' . esc_html($feedback->user_name) . ' says:</strong>';
            $feedback_html .= '<p>' . esc_html($feedback->feedback) . '</p>';
            $feedback_html .= '</li>';
        }
        
        $feedback_html .= '</ul>';
    } else {
        $feedback_html = '<p>No feedback available for this post yet.</p>';
    }
    return $content . $feedback_html;
}
add_filter('the_content', 'display_feedback_list');
