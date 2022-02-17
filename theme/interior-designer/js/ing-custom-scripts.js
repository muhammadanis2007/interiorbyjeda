$(document).ready(function(e) {

    $('nav').clone().insertBefore('.original').addClass('fixed').removeClass('original').hide();
    $('.fixed').children('button').remove();
    $('.fixed').children('.menu-container').children('.brand-container').remove();

    var orgElementPos = $('.original').offset();
    orgElementTop = orgElementPos.top;



    $(window).scroll(function() {

        if ($('.menu-toggle-btn').css('display') == "none") {

            if ($(window).scrollTop() > (orgElementTop)) {
                stickyfixedMenu();
            } else {
                // not scrolled past the menu; only show the original menu.
                stcikyMenuReset();
            }


        }



    });




    $(".menu-toggle-btn").click(function() {
        if ($(".menu-toggle-btn").css('display') == 'block') {
            $(".menu-container").toggle("slow");
        }
    })


    $(".top-main-menu li a").click(function(event) {
        if ($(".menu-toggle-btn").css('display') == 'block') {
            $(".menu-container").slideUp();
        }
    });


    $("body").delegate(".btn-toolbar", "click", function() {

        $("#toolbar-options").slideDown("slow");

    });


    $(window).scroll(function() {

        if ($(window).scrollTop() >= (600)) {

            $(".row-fluid .span3").css({ "display": "block" }).addClass("animated fadeInLeft");
            $(".event-list-box:nth-child(odd)").delay(200).addClass('animated fadeInLeft');
            $(".event-list-box:nth-child(even)").delay(200).addClass('animated fadeInRight');
        }


    });





    $(window).on("resize", function(event) {

        var w = $(this).width();
        if (w > 985) {
            $(this).scrollTop = 0;
            stcikyMenuReset();
            $('.original').children('.menu-container').css('display', 'block');


        } else {

            $('.original').children('.menu-container').css('display', 'none');
        }
    })


    function stickyfixedMenu() {
        $('.original').slideUp('slow');
        $(".fixed").slideDown('slow');

    }

    function stcikyMenuReset() {

        $(".fixed").slideUp('slow');
        $('.original').slideDown('slow');



    }




});