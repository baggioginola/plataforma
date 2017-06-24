/**
 * Created by mario on 23/jun/2017.
 */
$(document).ready(function () {

    $('#reset_button').click(function () {
        $('#form_add').trigger("reset");
        return false;
    });

    var form = $('#form_add').submit(function () {

        var data = $(this).serialize();

        $.ajax({
            url: BASE_ROOT + "?c=cursos_alumno&m=agregar_datos",
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

    $('#id_maestro').on('change', function () {

        id_maestro = $('#id_maestro').val();

        $.ajax({
            url: BASE_ROOT + "?c=cursos_alumno&m=buscar_cursos",
            type: "POST",
            cache: false,
            data: {
                id_maestro: id_maestro
            },
            dataType: 'json',
            success: formulario_respuesta_curso
        });

    });

});

function formulario_respuesta_curso(data) {
    if (data.mensaje == "vacio") {
        $('#id_curso').empty();
    }
    else {
        $('#id_curso').empty();

        var id_curso = data.id_curso;
        var nombre = data.nombre;

        for (var i = 0; i < id_curso.length; i++) {
            var opt = document.createElement('option');
            opt.innerHTML = nombre[i].nombre;
            opt.value = id_curso[i].id_curso;
            document.getElementById('id_curso').appendChild(opt);
        }
    }
}
