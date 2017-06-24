/**
 * Created by mario on 21/jun/2017.
 */
$(document).ready(function ()
{
    $('#reset_button').click(function () {
        $('#form_add').trigger("reset");
        return false;
    });

    var form = $('#form_add').submit(function () {

        var data = $(this).serialize();

        $.ajax({
            url: BASE_ROOT + "?c=cursos&m=agregar_datos",
            type: "POST",
            cache: false,
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.status == 200) {
                    $('#form_add').trigger("reset");
                }
                bootbox.alert(data.message);
            }
        });
        return false;
    });
});


