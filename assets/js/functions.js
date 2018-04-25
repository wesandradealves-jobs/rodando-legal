jQuery(document).ready(function () {

	if(window.location.hash) {
		$("html, body").stop(true, false).animate({scrollTop: $("section"+window.location.hash).offset().top}, 'slow'); 
	}  

    $(window).scroll(function (event) {

        $("section").each(function (i, el) {

            var el = $(el);

            if (el.visible(true)) {

                el.addClass("animate");

            }

            //  else {

            //     el.removeClass("animate"); 

            // }

        });

    });

    $('.unidades').owlCarousel({

        loop: $('.owl-carousel .item').size() > 1 ? true : false,
        margin: 15,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:2
            }
        },

        autoHeight: true,

        pagination: true,

        dots: true,

        navigation: true

    });

    $('.banner').owlCarousel({

        margin: 0,

        items: 1,

        itemsDesktop: false,

        itemsDesktopSmall: false,

        itemsTablet: false,

        itemsMobile: false,

        pagination: true,

        dots: true,

        navigation: true

    });

    $(".owl-prev").html('<svg class="svg-icon" viewBox="0 0 20 20"><path fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path></svg>');

    $(".owl-next").html('<svg class="svg-icon" viewBox="0 0 20 20"><path fill="none" d="M11.611,10.049l-4.76-4.873c-0.303-0.31-0.297-0.804,0.012-1.105c0.309-0.304,0.803-0.293,1.105,0.012l5.306,5.433c0.304,0.31,0.296,0.805-0.012,1.105L7.83,15.928c-0.152,0.148-0.35,0.223-0.547,0.223c-0.203,0-0.406-0.08-0.559-0.236c-0.303-0.309-0.295-0.803,0.012-1.104L11.611,10.049z"></path></svg>');

    $(".accordion.slidein li > a").click(function () {

        $(this).closest("ul").find(".toggle").not($(this).parent()).removeClass("toggle");

        $(this).parent().toggleClass("toggle");

    });

    $(".pg-home nav a").each(function () {

        if ($(this).attr("href") == "#") {

            $(this).attr("href", "javascript:void(0)");

            $(this).attr("id", latinize($(this).text().replace(/ /g, '-').toLowerCase()));

            $(this).on("click", function () {

                $("html, body").stop(true, false).animate({ scrollTop: $("section#" + $(this).attr("id")).offset().top }, 500);

            });

        }

    });

    $('#webdoor a[href*="#"]').each(function() {
        $(this).on("click", function () {
            $("html, body").stop(true, false).animate({ scrollTop: $("section#" + $(this).attr("href").replace('#', '')).offset().top }, 500);
        });
    });

    $(".pg-interna nav a").each(function () {

        if ($(this).attr("href") == "#") {

            $(this).attr("id", latinize($(this).text().replace(/ /g, '-').toLowerCase()));

            $(this).attr("href", "http://www.rodandolegal.com.br/#" + $(this).attr("id"));

        }

    });

    $(".custom-file label").click(function () {

        $(this).next().find("input").click();

    });

    $("[name='curriculo']").change(function () {

        var filename = $("[name='curriculo']").val();

        $('.filename').html(filename);

    });

    $('[name="telefone"]').mask('(99) 9999-9999');

    // $("header").before($("header").clone().addClass("sticky"));

});


function mobileNavigation() {

    $("#mobileNavigation").toggleClass("toggle");

}

// $(window).on("scroll", function () {

//     $(".sticky").toggleClass("stuck", ($(window).scrollTop() > 49));

// });

$(window).resize(function () {

    $(".toggle").removeClass("toggle");

    $(".tcon-transform").removeClass("tcon-transform");

});

 

