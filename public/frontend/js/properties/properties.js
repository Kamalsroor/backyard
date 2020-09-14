$(document).ready(function () {
    function doSearch() {
        var placeId = $(".propertiies.active").attr("data-placeId");

        var isRental = $(".rental").hasClass("active");
        var isSale = $(".sale").hasClass("active");
        var all = $(".alll").hasClass("active");
        var status = null;

        if (all) status = "all";
        if (isRental) status = "rental";
        else if (isSale) status = "sale";

        var token = "{{Session::token()}}";
        data = {
            place_id: placeId,
            status: status,
            _token: token,
        };

        $.ajax({
            url: "/search",
            type: "GET",
            data: data,
            success: function success(res) {
                const objectAr = Array.from(res);
                console.log(objectAr.length);
                var Row = "";
                $(".propertyshow").html("");
                $.each(res, function (index, value) {
                    Row = "";

                    // $('.propertyshow').append('Row');
                });
            },
        });
    }

    $(".propertiies").on("click", function () {
        doSearch();
    });

    $(".rental").on("click", function () {
        doSearch();
    });

    $(".sale").on("click", function () {
        doSearch();
    });

    // $(".rentalAndsale").on('click', function () {
    //
    //     doSearch();
    //
    // });
});
