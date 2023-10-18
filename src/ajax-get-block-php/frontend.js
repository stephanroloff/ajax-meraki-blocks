//JAVASCRIPT JUST FRONTEND

jQuery(document).ready(function ($) {
    $('#cargar-api').click(function () {
        $.ajax({
            type: 'POST',
            url: ajax_load_api.ajaxurl,
            data: {
                action: 'cargar_api'
            },
            success: function (response) {
                $('#resultado-carga').html(response);
            }
        });
    });
});
