/**
 * Created by mario on 19/jun/2017.
 */
$(document).ready(function () {

    var url = BASE_ROOT + '?c=maestros&m=getAll';
    var columns = [{data: 'nombre'}, {data: 'e_mail'}, {data: 'no_control'}];

    var table = masterDatatable(url, columns);


    $('#datatable tbody').on('click', '#btn_edit', function () {

        var id = table.row($(this).parents('tr')).data().id_maestro;
        var sello = table.row($(this).parents('tr')).data().sello;

        location.href = BASE_ROOT + "?c=maestros&m=editar&id=" + id + "&sello=" + sello;

        return false;
    });

    $('#datatable tbody').on('click', '#btn_delete', function () {
        var id = table.row($(this).parents('tr')).data().id_maestro;
        var sello = table.row($(this).parents('tr')).data().sello;

        bootbox.confirm("Eliminar elemento?", function (result) {
            if (result == true) {
                window.location.href = BASE_ROOT + "?c=maestros&m=eliminar&id=" + id + "&sello=" + sello;
            }
        });
        return false;
    });
});
