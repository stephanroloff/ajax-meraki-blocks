jQuery(document).ready(function($) {
    $('#mi-formulario').submit(function(event) {
        event.preventDefault();

        var datos = {
            action: 'post_data_to_usermeta', // Nombre de la acción en el servidor
            mi_parametro: {
                valor_texto: $('#mi-valor').val(),
                user_id: $('#user-id').val()
            },
            security: my_script_vars.security
        };

        $.post(my_script_vars.ajax_url, datos, function(response) {
            $('#resultado').html(response); 
        });
    });
});

