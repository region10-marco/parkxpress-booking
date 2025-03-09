jQuery(document).ready(function ($) {
    var today = new Date();
    var formattedToday = today.toISOString().split('T')[0]; // YYYY-MM-DD Format für den Vergleich

    // Initialisierung des Datepickers
    $("#check-in").datepicker({
        dateFormat: "dd.mm.yy",
        minDate: 0, // Heute oder später
        onSelect: function (selectedDate) {
            var selectedDateObj = $("#check-in").datepicker("getDate");
            var nextDay = new Date(selectedDateObj);
            nextDay.setDate(nextDay.getDate() + 1);
            $("#check-out").datepicker("option", "minDate", nextDay);
        }
    });

    $("#check-out").datepicker({
        dateFormat: "dd.mm.yyyy",
        minDate: 1 // Mindestens 1 Tag nach dem Check-in
    });

    // Validierung und Fehlermeldungen
    $("#submit").click(function () {
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
            alert("Buchung erfolgreich!"); // Hier könnte ein Submit-Event folgen
        }
    });
});
