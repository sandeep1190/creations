jQuery(document).ready(function ($) {
    $('#submitForm').on('click', function (e) {
        e.preventDefault(); // Prevent page refresh on form submit

        // Clear previous messages
        $('#formMessage').text('');

        // Collect form data
        var formData = {
            action: 'submit_contact_form',
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            comments: $('#comments').val(),
        };

        // Send AJAX request
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    $('#formMessage').css('color', 'green').text(response.data);
                    $('#contactForm')[0].reset(); // Reset form
                } else {
                    $('#formMessage').css('color', 'red').text(response.data);
                }
            },
            error: function () {
                $('#formMessage').css('color', 'red').text('An unexpected error occurred.');
            },
        });
    });
});
