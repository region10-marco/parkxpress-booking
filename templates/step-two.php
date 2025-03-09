<div id="stepTwoContainer">
    <!-- Schritt 1: Datumsbereich auswählen -->
    <div id="checkDate">
        <h1>Wählen Sie Ihr An- und Abreisedatum</h1>
        <div id="error" style="display:none;">
            <p id="errorincontent"></p>
        </div>
        <div class="formInput">
            <label for="check-in">Check-in:</label>
            <input type="text" id="check-in" name="check-in" class="textInput" readonly>
        </div>

        <div class="formInput">
            <label for="check-out">Check-out:</label>
            <input type="text" id="check-out" name="check-out" class="textInput" readonly>
        </div>

        <button id="submitDate" class="checkDateBtn">Verfügbarkeit prüfen</button>
    </div>

    <!-- Schritt 2: Parkplatzoptionen anzeigen -->
    <div id="parking-options">
        <h1>Wählen Sie Ihren Parkplatz</h1>
        <div id="error-parking" style="display:none;">
            <p id="errorincontent"></p>
        </div>

        <div id="parking-container">
            <!-- Hier werden die Parkplatzoptionen dynamisch eingefügt -->
        </div>

        <button id="continue" class="checkDateBtn">Weiter</button>
    </div>
</div>

<script>
jQuery(document).ready(function ($) {
    // Setze gespeicherte Werte für Check-in und Check-out


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
                            <button class="selectParking" data-type="${type}" data-price="${info.price}">Auswählen</button>
                        </div>
                    `;
                });

                $("#parking-container").html(parkingHTML);

                $(".selectParking").click(function () {
      
                });
            }
        });
    }

    // Beim Laden die gespeicherten Daten abrufen


    // Wenn der Benutzer ein neues Datum auswählt
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
</script>
