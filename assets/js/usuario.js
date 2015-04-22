$(function () {
    $('#btn_ingresar').on('click', function () {
        var da = $('#formulario').serialize();
        $.ajax({
            url: "../auditoria/guardar.php",
            data: da,
            dataType: 'json',
            type: "POST",
            success: function (data) {
                if (data) {
                    updateTabla(data, 'guardar');
                    alert('Guardado correctamente!');
                    $('#btn_nuevo').click();
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

function editar(id, user, pass, tpass) {
    var idq = id + "";
    var te = user + "";
    var ma =pass + "";
    var po = tpass + "";
    $('#id_usuario').val(idq);
    $('#nombre').val(te);
    $('#password').val(ma);
    $('#tipo_usuario').val(po);
    $('#btn_ingresar').html('Guardar');
    $('#btn_nuevo').removeClass('hidden');
}

function eliminar(ide) {
    if (confirm("Esta seguro de eliminar el registro?")) {
        var id = "id=" + ide;
        $.ajax({
            url: "../auditoria/eliminar.php",
            data: id,
            type: "POST",
            success: function (data) {
                if (data) {
                    updateTabla(data, 'eliminar');
                    alert('Ingresado correctamente!');
                }
            }
        })
    }
}

function updateTabla(data, tipo) {
    var len = $("#tabla > tbody > tr").children().length;
    var datos = data[0];
    var id_afectado = data[1];
    if (!datos.id) {
        var tds = '<tr>';
        $.each(datos, function (index, value) {
            if (index == 'id') {
                tds += '<td>' + id_afectado + '</td>';
            } else {
                tds += '<td>' + value + '</td>';
            }
        });
        tds += '<td>\n\
            <input type="button" name ="editar" class ="btn btn-sm btn-primary" \n\
            onclick ="editar(\'' + id_afectado + '\',\'' + datos.nombre + '\',\'' + datos.password + '\',\'' + datos.tipo_usuario + '\');" \n\
            value="Editar" style="cursor:pointer"/>\n\
            <input class="btn btn-sm btn-danger" type="button"  style="cursor:pointer" value="Eliminar" onclick="eliminar(\'' + id_afectado + '\')"/>\n\
            </td>';
        tds += '</tr>';
        $("#tabla").append(tds);
    }

    return len;
}