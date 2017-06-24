(function( $ ) {
 
    $(function() {
 
        //
        // Global
        //
        var body = $('body');

        // 
        // menu
        //
        $('#menu_toggle').click(function() {
            body.toggleClass('mini_menu');
        });

        // 
        // timetable menu to open in new tab
        //
        $('#main_navigation a[href^="https://clients.mindbodyonline.com"]').attr('target', '_blank');

        // 
        // inactive post nav options
        //
        var $next = $(".next_posts"),
            $prev = $(".prev_posts"),
            $next_single = $('.prev_post'),
            $prev_single = $('.next_post'); 

        // 
        // blog page
        //
        if ($prev.children().length == 0 && $next.children().length > 0) {
          $prev.append('<span class="disabled">Newer Posts &rarr;</span>');

        } else if ($next.children().length == 0 && $prev.children().length > 0) {
          $next.append('<span class="disabled">&larr; Older Posts</span>');
        };

        // 
        // single post page nav
        //
        if ($prev_single.children().length == 0 && $next_single.children().length > 0) {
          $prev_single.append('<span class="disabled">The Future &rarr;</span>');

        } else if ($next_single.children().length == 0 && $prev_single.children().length > 0) {
          $next_single.append('<span class="disabled">&larr; The Beginning of Time</span>');
        };

        // 
        // popup for classes
        //
        $('#classes a[href^="#"]').magnificPopup({ 
            type: 'inline',
        });

        // 
        // slider
        //
        if ( $('#slider') ) {

        	$('#slider').royalSlider({
                imageScalPadding: 0,
                arrowsNav: true,
                autoScaleSlider: true,
                autoScaleSliderWidth: 1180,
                autoScaleSliderHeight: 580,
                transitionType: 'fade',
                loop: true,
                autoPlay: {
                    enabled: true,
                    pauseOnHover: true,
                    delay: 4000
                }
        	});
        }
 
    });
    
    //
    // Pricing Page
    //
    equalheight = function(container) {

        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;

        $(container).each(function() {

            $el = $(this);
            $($el).height('auto')
            topPostion = $el.position().top;

            if (currentRowStart != topPostion) {
                for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
                rowDivs.length = 0;
                currentRowStart = topPostion;
                currentTallest = $el.height();
                rowDivs.push($el);
            } else {
                rowDivs.push($el);
                currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
            }
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }

        });
    }

    $(window).load(function() {
        equalheight('.package');
    });


    $(window).resize(function(){
        equalheight('.package');
    });


}(jQuery));
// JavaScript Document