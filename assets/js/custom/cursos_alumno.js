/**
 * Created by mario on 23/jun/2017.
 */
$(document).ready(function()
{
    var url = BASE_ROOT + '?c=cursos_alumno&m=getAll';
    var columns = [{data: 'maestro'}, {data: 'curso'}];

    var table = masterDatatable(url, columns);

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
