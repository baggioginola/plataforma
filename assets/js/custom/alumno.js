/**
 * Created by mario on 25/jun/2017.
 */
$(document).ready(function () {
    var url = BASE_ROOT + '?c=alumno&m=getById';
    var id = $('#id_alumno').val();
    var data = {id: id};

    $.post(url, data, function (response, status) {
        if (status == 'success') {
            $.each(response[0], function (key, val) {
                $("input[name=" + key + "]").val(val);
                $("select[name=" + key + "]").val(val);
            });
        }
    }, 'json');
    return false;
});