/**
 * Created by mario on 19/jun/2017.
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
});
