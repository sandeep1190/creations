jQuery(document).ready(function ($) {
    $('#customForm').on('submit', function (e) {
        e.preventDefault();

        // Create FormData object
        var formData = new FormData(this);
        formData.append('action', 'submit_custom_form');
        formData.append('security', customForm.nonce);

        // AJAX request
        $.ajax({
            url: customForm.ajax_url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    $('#form-message').text(response.data).show();
                    $('#form-error').hide();
                    $('#customForm')[0].reset(); // Reset the form
                } else {
                    $('#form-error').text(response.data).show();
                    $('#form-message').hide();
                }
            },
            error: function () {
                $('#form-error').text('An unexpected error occurred.').show();
                $('#form-message').hide();
            }
        });
    });
});
