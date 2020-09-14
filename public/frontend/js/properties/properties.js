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
            },
        });
    });

    // $(".rentalAndsale").on('click', function () {
    //
    //     doSearch();
    //
    // });
});
