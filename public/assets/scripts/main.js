$(document).ready(function () {

    // JQUERY MASK FOR PHONE

    jQuery(document).ready(function () {
        $(".phonenumber").mask("+998 (11) 111 11 11");
        $("#phoneform").submit(function() {
            $(".phonenumber").unmask();
      });
    });

    $('input[type="checkbox"]').on('change', function() {
        $('input[name="from_where_info"]').not(this).prop('checked', false);
    });


    // LANGUAGE SELECT

    // $(".lang-drop").click(function () {
    //     $(this).toggleClass("opened");
    // });

    // MOBILE MENU OPEN

    $(".mobile-button").click(function () {
        $(".navigation").toggleClass("active");
    });


    $(".input.select").click(function () {
        $(this).toggleClass("active");
    });
    $(".inputselector").click(function () {
        var text = $(this).text();
        var id = $(this).data('id');

        $(this).parent().siblings(".selected").text(text);
        $(this).parent().siblings("input").val(id).trigger("changing");
        $(this).parent().parent(".input").next(".input").removeClass("disabled");
    });
    $("ul").on('click', '.inputselector1', function(event) {
        var text = $(this).text();
        var id = $(this).data('id');

        $(this).parent().siblings(".selected").text(text);
        $(this).parent().siblings("input").val(id).trigger("changing");
        $(this).parent().parent(".input").next(".input").removeClass("disabled");
        /* Act on the event */
    });;

    $(".x-close").click(function () {
        $(".error").toggleClass("active");
        $(".successq").toggleClass("active");
    });

    // MODAL OPEN

    // $(".leaveapp-modal-btn").click(function () {
    //     $(".leaveapp-modal").addClass("active");
    // });
    // $(".measuring-modal-btn").click(function () {
    //     $(".measuring-modal").addClass("active");
    // });
    // $(".modal-close").click(function () {
    //     $(".modal-window").removeClass("active");
    // });

});
