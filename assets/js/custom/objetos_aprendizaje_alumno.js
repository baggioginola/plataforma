/**
 * Created by mario on 22/jun/2017.
 */
$(document).ready(function () {
    var url = BASE_ROOT + '?c=objetos_aprendizaje_alumno&m=getAll';
    var columns = [{data: 'curso'}, {data: 'nombre'}, {data: 'tipo'}];

    var table = Datatable(url, columns);

    $('#datatable tbody').on('click', '#btn_edit', function () {

        var path = table.row($(this).parents('tr')).data().path;

        //location.href = BASE_ROOT + path;

        window.open(
            BASE_ROOT + path,
            '_blank'
        );


        return false;
    });
});

function Datatable(url, columns) {
    var defaultContentEdit = "<button class='btn btn-primary btn-xs' id='btn_edit'><span class='glyphicon glyphicon-download'></span></button>";

    var columnsDefault = [{"orderable": false, "data": null, "defaultContent": defaultContentEdit}];

    columns = columns.concat(columnsDefault);

    var dataTable = $('#datatable').DataTable({
        ajax: {
            type: 'POST',
            url: url,
            dataSrc: ''
        },
        columns: columns,
        /*select: {
         style: 'os'
         },
         */
        language: {
            "lengthMenu": "Mostrando _MENU_ elementos por pagina",
            "zeroRecords": "No se ha encontrado",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
        },
        "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]]
    });
    return (dataTable);
}