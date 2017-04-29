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
                    updateTabla(data, 'guardar');
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
        $('#id_estudiante').val('');
        $('#btn_ingresar').html('Ingresar');
        $('#btn_nuevo').addClass('hidden');
    });
});

function editar(ide, t, m, p, pr, tlf) {
    var idq = ide + "";
    var te = t + "";
    var ma = m + "";
    var po = p + "";
    var pre = pr + "";
    var tel = tlf + "";
    $('#id_estudiante').val(idq);
    $('#cedula').val(te);
    $('#nombre').val(ma);
    $('#apellido').val(po);
    $('#direccion').val(pre);
    $('#telefono').val(tel);
    $('#btn_ingresar').html('Guardar');
    $('#btn_nuevo').removeClass('hidden');
}

function eliminar(ide) {
    if (confirm("Esta seguro de eliminar el registro?")) {
        $.ajax({
            url: "../auditoria/eliminar.php",
            data: {Estudiante: {id: ide}},
            dataType: 'json',
            type: "POST",
            success: function (data) {
                if (data) {
                    updateTabla(data, 'eliminar');
                    alert('Elminado correctamente!');
                }
            }
        })
    }
}

function updateTabla(data, tipo) {
    var datos = data[0];
    var id_afectado = data[1];
    if (tipo == 'guardar') {
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
            onclick ="editar(\'' + id_afectado + '\',\'' + datos.cedula + '\',\'' + datos.nombre + '\',\'' + datos.apellido + '\',\'' + datos.direccion + '\',\'' + datos.telefono + '\');" \n\
            value="Editar" style="cursor:pointer"/>\n\
            <input id="ident' + id_afectado + '" class="btn btn-sm btn-danger" type="button"  style="cursor:pointer" value="Eliminar" onclick="eliminar(\'' + id_afectado + '\')"/>\n\
            </td>';
            tds += '</tr>';
            $("#tabla").append(tds);
        } else {
            var tr = $('#ident' + datos.id).parent().parent();
            var tds = '';
            $.each(datos, function (index, value) {
                if (index == 'id') {
                    tds += '<td>' + datos.id + '</td>';
                } else {
                    tds += '<td>' + value + '</td>';
                }
            });
            tds += '<td>\n\
            <input type="button" name ="editar" class ="btn btn-sm btn-primary" \n\
            onclick ="editar(\'' + datos.id + '\',\'' + datos.cedula + '\',\'' + datos.nombre + '\',\'' + datos.apellido + '\',\'' + datos.direccion + '\',\'' + datos.telefono + '\');" \n\
            value="Editar" style="cursor:pointer"/>\n\
            <input id="ident' + datos.id + '" class="btn btn-sm btn-danger" type="button"  style="cursor:pointer" value="Eliminar" onclick="eliminar(\'' + datos.id + '\')"/>\n\
            </td>';
            $(tr).html(tds);
        }
    } else if (tipo == 'eliminar') {
        var tr = $('#ident' + id_afectado).parent().parent();
        tr.remove();
    }
}