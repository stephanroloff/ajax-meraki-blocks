//JAVASCRIPT JUST FRONTEND

jQuery(document).ready(function ($) {
    $('#load-api').click(function () {
        $.ajax({
            type: 'POST',
            url: ajax_load_api.ajaxurl,
            data: {
                action: 'load_api'
            },
            success: function (response, textStatus, XMLHttpRequest) {
                $('#load-response').html(response);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $('#load-response').html(errorThrown);
            }
        });
    });
});
