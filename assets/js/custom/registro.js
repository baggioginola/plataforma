/**
 * Created by mario on 16/jun/2017.
 */
$(document).ready(function () {

    $('#reset_button').click(function () {
        $('#form_register').trigger("reset");
        return false;
    });

    var form = $('#form_register').submit(function () {
        var pw = $('#id_password').val();
        pw = hex_md5(pw);

        var data = $(this).serialize() + '&' + $.param({'password': pw});

        $.ajax({
            url: BASE_ROOT + "?c=registro&m=agregar_datos",
            type: "POST",
            cache: false,
            data: data,
            dataType: 'json',
            success: function (data) {
                if(data.status == 200) {
                    $('#form_register').trigger("reset");
                }
                bootbox.alert(data.message);
            }
        });
        return false;
    });
});