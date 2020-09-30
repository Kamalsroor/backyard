$(document).ready(function () {
    function doSearch(placeId) {
        var isRental = $(".rental").hasClass("active");
        var isSale = $(".sale").hasClass("active");
        var all = $(".alll").hasClass("active");
        var status = null;

        if (all) status = "all";
        if (isRental) status = "Rental";
        else if (isSale) status = "Sale";

        $.ajax({
            url: "/GetProperties",
            type: "GET",
            dataType: "html",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                place_id: placeId,
                status: status,
            },
            success: function success(html) {
                $(".sale-filter").html("");
                $(".sale-filter").append(html);
                if ($(window).width() < 992) {
                    console.log($(".properties__carousel"));
                    $(".properties__carousel").owlCarousel({
                        autoplay: true,
                        autoplayTimeout: 5000,
                        items: 1,
                        itemsDesktop: false,
                        itemsDesktopSmall: false,
                        itemsTablet: false,
                        itemsMobile: false,
                        loop: true,
                    });
                } else {
                    var owl = $(".properties__carousel");
                    owl.trigger("destroy.owl.carousel");
                    owl.addClass("off");
                }
            
                $(window).resize(function () {
                    if ($(window).width() < 992) {
                        $(".properties__carousel").owlCarousel({
                            autoplay: true,
                            autoplayTimeout: 5000,
                            items: 1,
                            itemsDesktop: false,
                            itemsDesktopSmall: false,
                            itemsTablet: false,
                            itemsMobile: false,
                            loop: true,
                        });
                    } else {
                        var owl = $(".properties__carousel");
                    owl.trigger("destroy.owl.carousel");
                    owl.addClass("off");
                    }
                });
            },
        });
    }
    var placeId = $(".properties__button-place.active").data("place-id");
    doSearch(placeId);
    $(".properties__button-place").on("click", function () {
        console.log("test");
        var placeId = $(this).data("place-id");

        doSearch(placeId);
    });

    $(".rental").on("click", function () {
        var placeId = $(".properties__button-place.active").data("place-id");

        doSearch(placeId);
    });

    $(".sale").on("click", function () {
        var placeId = $(".properties__button-place.active").data("place-id");

        doSearch(placeId);
    });

    $(document).on("click", ".a-link", function () {
        event.preventDefault();
        var url = $(this).data("url");
        var isRental = $(".rental").hasClass("active");
        var isSale = $(".sale").hasClass("active");
        var all = $(".alll").hasClass("active");
        var status = null;

        if (all) status = "all";
        if (isRental) status = "Rental";
        else if (isSale) status = "Sale";

        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                place_id: placeId,
                status: status,
            },
            success: function success(html) {
                $(".sale-filter").html("");
                $(".sale-filter").append(html);
                if ($(window).width() < 992) {
                    console.log($(".properties__carousel"));
                    $(".properties__carousel").owlCarousel({
                        autoplay: true,
                        autoplayTimeout: 5000,
                        items: 1,
                        itemsDesktop: false,
                        itemsDesktopSmall: false,
                        itemsTablet: false,
                        itemsMobile: false,
                        loop: true,
                    });
                } else {
                    var owl = $(".properties__carousel");
                    owl.trigger("destroy.owl.carousel");
                    owl.addClass("off");
                }
            
                $(window).resize(function () {
                    if ($(window).width() < 992) {
                        $(".properties__carousel").owlCarousel({
                            autoplay: true,
                            autoplayTimeout: 5000,
                            items: 1,
                            itemsDesktop: false,
                            itemsDesktopSmall: false,
                            itemsTablet: false,
                            itemsMobile: false,
                            loop: true,
                        });
                    } else {
                        var owl = $(".properties__carousel");
                    owl.trigger("destroy.owl.carousel");
                    owl.addClass("off");
                    }
                });
            },
        });
    });

    // $(".rentalAndsale").on('click', function () {
    //
    //     doSearch();
    //
    // });
});
