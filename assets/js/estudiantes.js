$(function () {
    $('#btn_ingresar').on('click', function () {
        var da = $('#formulario').serialize();
        $.ajax({
            url: "../auditoria/guardar.php",
            data: da,
            type: "POST",
            success:
                    function (respuesta) {
                        alert(respuesta);
//                                location.reload(true);
                    }
        });
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