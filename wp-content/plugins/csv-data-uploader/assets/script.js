jQuery(document).ready(function () {
    jQuery('#cdu-frm-upload').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        jQuery.ajax({
            url: cdu_object.ajax_url,
            data: formData,
            dataType: "json",
            method: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
                // console.log(response);
                if (response.status) {
                    jQuery('#show_upload_message').text(response.message).css({
                        color: "green"
                    });
                    jQuery('#cdu-frm-upload')[0].reset();
                }
            }
        });
    });
});