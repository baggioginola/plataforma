/**
 * Created by mario on 19/jun/2017.
 */
/**
 *
 * @param url
 * @param columns
 * @returns {*|jQuery}
 */
function masterDatatable(url, columns) {
    var defaultContentEdit = "<button class='btn btn-primary btn-xs' id='btn_edit'><span class='glyphicon glyphicon-pencil'></span></button>";
    var defaultContentDelete = "<button class='btn btn-danger btn-xs' id='btn_delete' ><span class='glyphicon glyphicon-trash'></span></button>"

    var columnsDefault = [{"orderable": false, "data": null, "defaultContent": defaultContentEdit},
        {
            "orderable": false, "data": null, "defaultContent": defaultContentDelete
        }];

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