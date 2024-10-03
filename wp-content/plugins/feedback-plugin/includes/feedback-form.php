<?php
function feedback_form_shortcode() {
    $post_id = get_the_ID();
    
    ob_start(); ?>
    <form id="feedback-form">
        <input type="hidden" name="post_id" value="<?php echo esc_attr($post_id); ?>">

        <label for="user_name">Name</label>
        <br>
        <input type="text" name="user_name" required>
        <br>
        <label for="user_email">Email</label><br>
        <input type="email" name="user_email" required>
        <br>
        <label for="feedback">Feedback</label><br>
        <textarea name="feedback" required></textarea>
        <br>
        <?php wp_nonce_field('feedback_form', 'feedback_nonce'); ?>

        <button type="submit">Submit Feedback</button>
        <div id="feedback-response"></div>
    </form>
    <?php
      return ob_get_clean();
}
add_shortcode('feedback_form', 'feedback_form_shortcode');



function handle_feedback_form_submission() {
    if (!isset($_POST['feedback_nonce']) || !wp_verify_nonce($_POST['feedback_nonce'], 'feedback_form')) {
        wp_send_json_error('Invalid nonce');
        return;
    }

    $user_name  = sanitize_text_field($_POST['user_name']);
    $user_email = sanitize_email($_POST['user_email']);
    $feedback   = sanitize_textarea_field($_POST['feedback']);
    $post_id    = intval($_POST['post_id']);

    if (empty($user_name) || empty($user_email) || empty($feedback)) {
        wp_send_json_error('Please fill in all fields.');
        return;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'feedback';
    $wpdb->insert(
        $table_name,
        array(
            'post_id'      => $post_id,
            'user_name'    => $user_name,
            'user_email'   => $user_email,
            'feedback'     => $feedback,
            'submitted_at' => current_time('mysql'),
        ),
        array(
            '%d',
            '%s',
            '%s',
            '%s',
            '%s',
        )
    );
    wp_send_json_success('Thank you for your feedback!');
}
add_action('wp_ajax_submit_feedback', 'handle_feedback_form_submission');
add_action('wp_ajax_nopriv_submit_feedback', 'handle_feedback_form_submission');
