jQuery(document).ready(function ($) {
    $("#check-in").datepicker({
        dateFormat: "dd.mm.yy",
        minDate: 0,
        onSelect: function (selectedDate) {
            var selectedDateObj = $("#check-in").datepicker("getDate");
            var nextDay = new Date(selectedDateObj);
            nextDay.setDate(nextDay.getDate() + 1);
            $("#check-out").datepicker("option", "minDate", nextDay);
        }
    });

    $("#check-out").datepicker({
        dateFormat: "dd.mm.yy",
        minDate: 1
    });

    function loadParkingOptions(checkIn, checkOut) {
        $.ajax({
            type: "POST",
            url: px_ajax.url,
            data: {
                action: "px_get_parking_types",
                check_in: checkIn,
                check_out: checkOut
            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.error) {
                    $("#error-parking p").text(data.error);
                    $("#error-parking").show();
                    return;
                }

                var parkingHTML = "";
                $.each(data.parkingTypes, function (type, info) {
                    var buttonClass = info.count > 0 ? "book-now" : "sold-out";
                    var buttonText = info.count > 0 ? "JETZT BUCHEN" : "AUSGEBUCHT";

                    parkingHTML += `
                        <div class="offerDetail">
                            <div class="offerDetailLeft">
                                <h2>${type}-Parking:</h2>
                                <ul>${info.features.map(f => `<li>✅ ${f}</li>`).join("")}</ul>
                            </div>
                            <div class="offerDetailRight">
                                <p class="offerPrice">
                                    <span class="offerPriceDetail">${info.price}</span> EUR
                                </p>
                                <button class="${buttonClass}">${buttonText}</button>
                            </div>
                        </div>
                    `;
                });

                $("#parking-container").html(parkingHTML);
                $("#parking-options").fadeIn();
            }
        });
    }

    $("#submitDate").click(function () {
        var checkIn = $("#check-in").val();
        var checkOut = $("#check-out").val();
        var errorMessage = "";

        if (!checkIn) errorMessage += "Bitte ein Check-in Datum auswählen.\n";
        if (!checkOut) errorMessage += "Bitte ein Check-out Datum auswählen.\n";

        if (errorMessage) {
            $("#errorincontent").text(errorMessage);
            $("#error").show();
        } else {
            $("#error").hide();
            loadParkingOptions(checkIn, checkOut);
        }
    });
});
