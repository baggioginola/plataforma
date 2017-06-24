/**
 * Created by mario on 16/jun/2017.
 */
$(document).ready(function () {
    $('#slides').slides({
        effect: 'fade',
        fadeSpeed: 700,
        play: 7000,
        pause: 4000,
        generateNextPrev: true,
        generatePagination: true,
        crossfade: true,
        hoverPause: true,
        animationStart: function (current) {
            $('.caption').fadeOut(200);
        },
        animationComplete: function (current) {
            $('.caption').fadeIn(300);
        },
        slidesLoaded: function () {
            $('.caption').fadeIn(300);
        }
    });

    $('#id_login').click(function () {
        $('#mensaje_usuario').slideUp();
        $('#mensaje_password').slideUp();
        $('#mensaje_servidor').slideUp();
        var valido = true;


        if ($('#id_usuario').val() == '') {
            $('#mensaje_usuario').html('El usuario es necesario');
            $('#mensaje_usuario').removeClass();
            $('#mensaje_usuario').addClass("campo_requerido");
            $('#mensaje_usuario').slideDown();
            valido = false;
        }
        if ($('#id_password').val() == '') {
            $('#mensaje_password').html('La contrase&ntilde;a es necesaria');
            $('#mensaje_password').removeClass();
            $('#mensaje_password').addClass("campo_requerido");
            $('#mensaje_password').slideDown();
            valido = false;
        }

        if (valido) {
            var usuario = $('#id_usuario').val();
            var pass = hex_md5($('#id_password').val());
            $.ajax({
                url: BASE_ROOT + "?c=login&m=autentificacion",
                type: "POST",
                cache: false,
                data: {
                    user: usuario,
                    password: pass
                },
                dataType: 'json',
                success: mensaje

            });

            return false;
        }

        return false;
    });

});


function mensaje(data) {
    $('#mensaje_servidor').slideUp();

    if (data == "vacio") {
        $('#mensaje_servidor').html('El usuario no existe');
        $('#mensaje_servidor').removeClass();
        $('#mensaje_servidor').addClass("campo_requerido");
        $('#mensaje_servidor').slideDown();

        $('#id_password').val('');
    }
    else if (data == "invalido") {
        $('#mensaje_servidor').html('El usuario y/&oacute; contrase&ntilde;a son incorrectos');
        $('#mensaje_servidor').removeClass();
        $('#mensaje_servidor').addClass("campo_requerido");
        $('#mensaje_servidor').slideDown();

        $('#id_password').val('');
    }
    else if (data == "valido_maestro") {
        location.href = BASE_ROOT + "?c=administracion";
    }
    else if (data == 'valido_alumno') {
        location.href = BASE_ROOT + "?c=administracion";
    }
}
