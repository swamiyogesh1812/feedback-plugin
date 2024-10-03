<?php
global $wpdb;
$table_name = $wpdb->prefix . 'feedback'; 

$recent_feedback = $wpdb->get_results("SELECT f.user_name, f.feedback, p.post_title, p.ID
    FROM {$table_name} AS f
    LEFT JOIN {$wpdb->posts} AS p ON f.post_id = p.ID
    WHERE p.post_status = 'publish'
    ORDER BY f.submitted_at DESC
    LIMIT 5
");

if (!empty($recent_feedback)) : ?>
    <section class="latest-feedback">
        <h2>Latest Feedback</h2>
        <ul class="feedback-list">
            <?php foreach ($recent_feedback as $feedback) : ?>
                <li>
                    <strong><?php echo esc_html($feedback->user_name); ?> on 
                        <a href="<?php echo get_permalink($feedback->ID); ?>">
                            <?php echo esc_html($feedback->post_title); ?>
                        </a>:</strong>
                    <p><?php echo esc_html($feedback->feedback); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php else : ?>
    <p>No feedback available yet.</p>
<?php endif; ?>
