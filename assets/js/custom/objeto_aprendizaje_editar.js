/**
 * Created by mario on 22/jun/2017.
 */

$(document).ready(function () {

    var form = $('#form_add').submit(function () {

        var data = $(this).serialize();

        $.ajax({
            url: BASE_ROOT + "?c=objetos_aprendizaje&m=editar_datos",
            type: "POST",
            cache: false,
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.status == 200) {
                    $('#form_add').trigger("reset");
                    bootbox.alert(data.message);
                }
            }
        });
        return false;
    });
});