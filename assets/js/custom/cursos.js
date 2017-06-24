/**
 * Created by mario on 21/jun/2017.
 */
$(document).ready(function () {
    var url = BASE_ROOT + '?c=cursos&m=getAll';
    var columns = [{data: 'nombre'}, {data: 'tipo'}];

    var table = masterDatatable(url, columns);

    $('#datatable tbody').on('click', '#btn_edit', function () {

        var id = table.row($(this).parents('tr')).data().id_curso;
        var sello = table.row($(this).parents('tr')).data().sello;

        location.href = BASE_ROOT + "?c=cursos&m=editar&id=" + id + "&sello=" + sello;

        return false;
    });

    $('#datatable tbody').on('click', '#btn_delete', function () {
        var id = table.row($(this).parents('tr')).data().id_curso;
        var sello = table.row($(this).parents('tr')).data().sello;

        bootbox.confirm("Eliminar elemento?", function (result) {
            if (result == true) {
                window.location.href = BASE_ROOT + "?c=cursos&m=eliminar&id=" + id + "&sello=" + sello;
            }
        });
        return false;
    });
});


//////////////////////////////////////////////////////////////////

function generar_sello(valor) {
    var salt = "p14t4f0rm4";
    //return md5($salt.$valor);
    return hex_md5(salt + valor);
}

function recarga() {
    location.href = BASE_ROOT + "?c=cursos";
}
