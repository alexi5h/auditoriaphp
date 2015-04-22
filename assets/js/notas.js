$(function () {
    $('#btn_ingresar').on('click', function () {
        var da = $('#formulario').serialize();
        $.ajax({
            url: "../auditoria/guardar.php",
            data: da,
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
        $('#id_nota').val('');
        $('#btn_ingresar').html('Ingresar');
        $('#btn_nuevo').addClass('hidden');
    });

});

function editar(id, no, ide, idm) {
    var idn = id + "";
    var nno = no + "";
    var iden = ide + "";
    var idemn=idm + "";
    $('#id_nota').val(idn);
    $('#nota').val(nno);
    $('#nombre').val(ma);
    $('#apellido').val(po);
    $('#direccion').val(pre);
    $('#telefono').val(tel);
}

function eliminar(ide) {
    if (confirm("Esta seguro de eliminar el registro?")) {
        var id = "id=" + ide;
        $.ajax({
            url: "../auditoria/eliminar.php",
            data: id,
            type: "POST",
            success:
                    function (respuesta) {
                        alert(respuesta);
//                        location.reload(true);
                    }
        })
    }
}