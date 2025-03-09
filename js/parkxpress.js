jQuery(document).ready(function ($) {
    // jQuery UI Datepicker initialisieren
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

    // AJAX-Request für Parkplatzverfügbarkeit
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
                    parkingHTML += `
                        <div class="parking-option">
                            <h2>${type}-Parking</h2>
                            <p>Preis: ${info.price} EUR</p>
                            <p>Verfügbar: ${info.count} Plätze</p>
                            <button class="selectParking checkDateBtn" data-type="${type}" data-price="${info.price}">Auswählen</button>
                        </div>
                    `;
                });

                $("#parking-container").html(parkingHTML);
                $("#parking-options").fadeIn();

                $(".selectParking").click(function () {
                    alert("Sie haben " + $(this).data("type") + " für " + $(this).data("price") + " EUR ausgewählt.");
                    // Hier kannst du ggf. Weiterleitung oder weitere Aktionen einbauen
                });
            }
        });
    }

    // Event-Handler für den Button "Verfügbarkeit prüfen"
    $("#submitDate").click(function () {
        var checkIn = $("#check-in").val();
        var checkOut = $("#check-out").val();
        var errorMessage = "";

        if (!checkIn) {
            errorMessage += "Bitte ein Check-in Datum auswählen.\n";
        }
        if (!checkOut) {
            errorMessage += "Bitte ein Check-out Datum auswählen.\n";
        }

        if (errorMessage !== "") {
            $("#errorincontent").text(errorMessage);
            $("#error").show();
        } else {
            $("#error").hide();
            loadParkingOptions(checkIn, checkOut);
        }
    });
});
