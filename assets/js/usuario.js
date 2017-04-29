$(function () {
    $('#btn_ingresar').on('click', function () {
        var da = $('#formulario').serialize();
        $.ajax({
            url: "../auditoria/guardar.php",
            data: da,
            dataType: 'json',
            type: "POST",
            success: function (data) {
                if (data.length > 0) {
                    alert('Guardado correctamente!');
                    $('#btn_nuevo').click();
                } else {
                    alert('Llene los campos requeridos!!');
                }
            }
        });
    });

    $('#btn_nuevo').on('click', function () {
        $('#formulario').trigger('reset');
        $('#id_usuario').val('');
        $('#btn_ingresar').html('Ingresar');
        $('#btn_nuevo').addClass('hidden');
    });
});