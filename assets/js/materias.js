/**
 * Created with JetBrains PhpStorm.
 * User: Cristian
 * Date: 19/04/15
 * Time: 08:54 PM
 * To change this template use File | Settings | File Templates.
 */
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

function editar(ide, nom) {
    var idq = ide + "";
    var nom = nom + "";
    $('#id_materia').val(idq);
    $('#nombre').val(nom);
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