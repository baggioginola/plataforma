/**
 * Created by mario on 22/jun/2017.
 */
$(document).ready(function () {
    var url = BASE_ROOT + '?c=objetos_aprendizaje&m=getAll';
    var columns = [{data: 'curso'}, {data: 'nombre'}, {data: 'tipo'}];

    var table = masterDatatable(url, columns);

    $('#datatable tbody').on('click', '#btn_edit', function () {

        var id = table.row($(this).parents('tr')).data().id_objeto_aprendizaje;
        var sello = table.row($(this).parents('tr')).data().sello;

        location.href = BASE_ROOT + "?c=objetos_aprendizaje&m=editar&id=" + id + "&sello=" + sello;

        return false;
    });

    $('#datatable tbody').on('click', '#btn_delete', function () {
        var id = table.row($(this).parents('tr')).data().id_objeto_aprendizaje;
        var sello = table.row($(this).parents('tr')).data().sello;

        bootbox.confirm("Eliminar elemento?", function (result) {
            if (result == true) {
                window.location.href = BASE_ROOT + "?c=objetos_aprendizaje&m=eliminar&id=" + id + "&sello=" + sello;
            }
        });
        return false;
    });
});


//////////////////////////////////////////////////////////////////


function eliminar_registro(id, sello) {
    var answer = confirm('Esta seguro que quiere eliminar el objeto de aprendizaje?');
    if (answer) {
        window.location.href = "<?php echo site_url()?>?c=objetos_aprendizaje&m=eliminar&id=" + id + "&sello=" + sello;
    }
    else return false;
}