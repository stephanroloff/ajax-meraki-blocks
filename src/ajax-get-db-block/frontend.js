jQuery(document).ready(function($) {

    $.ajax({
        url: my_script_vars.ajax_url,
        type: 'get',
        data: {
            action: 'get_data_from_usermeta', 
        },
        success: function(response) {
            let datos = JSON.parse(response);
            $('#loader').hide();

            // Comprueba si los datos son un array
            if (Array.isArray(datos)) {
            let listaHTML = '<ul>';
            datos.forEach(function(dato) {
                listaHTML += '<li>' + dato + '</li>';
            });
            listaHTML += '</ul>';
            
            $('#ajax-get-from-db').html(listaHTML);
            } else {
                $('#ajax-get-from-db').html('No se encontraron datos válidos.');
            }
        }
    });
});
