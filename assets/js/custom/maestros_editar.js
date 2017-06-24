/**
 * Created by mario on 21/jun/2017.
 */
$(document).ready(function () {

    $('#reset_button').click(function () {
        $('#form_add').trigger("reset");
        return false;
    });

    var form = $('#form_add').submit(function () {
        var pw = $('#id_password').val();

        var data = $(this).serialize() + '&' + $.param({'password': pw});

        $.ajax({
            url: BASE_ROOT + "?c=maestros&m=editar_datos",
            type: "POST",
            cache: false,
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data.status == 200) {
                    $('#form_add').trigger("reset");
                }
                bootbox.alert(data.message);
            }
        });
        return false;
    });
});