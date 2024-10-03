jQuery(document).ready(function($) {
    $('#feedback-form').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize() + '&action=submit_feedback';
        $.post(feedback_ajax.ajax_url, formData, function(response) {
            $('#feedback-response').html(response.data);
        });
    });
});


