/**
 * Created by mario on 22/jun/2017.
 */

$(document).ready(function () {

    $('#reset_button').click(function () {
        $('#form_add').trigger("reset");
        return false;
    });

    var form = $('#form_add').submit(function () {

        var data = $(this).serialize();

        $.ajax({
            url: BASE_ROOT + "?c=objetos_aprendizaje&m=agregar_datos",
            type: "POST",
            cache: false,
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.status == 200) {

                    id = data.data.id;
                    $.ajaxFileUpload({
                        url: BASE_ROOT + "?c=objetos_aprendizaje&m=agregar_archivo",
                        secureuri: false,
                        fileElementId: 'archivo',
                        dataType: 'json',
                        async: false,
                        data: {
                            id: id
                        },
                        success: function (data, status) {
                            console.log(data);
                        },
                        error: function (data, status, e) {
                            console.log(data);
                        }
                    });
                }
                $('#form_add').trigger("reset");
                bootbox.alert(data.message);
            }
        });
        return false;
    });
});