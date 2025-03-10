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
            var data = response.data;

            if (!data) {
                $("#error-parking p").text("Fehler beim Laden der Daten.");
                $("#error-parking").show();
                return;
            }

            var parkingHTML = `
                <div class="offerDetail">
                    <div class="offerDetailLeft">
                        <h2>Economy-Parking:</h2>
                        <ul>
                            <li>✅ <?php echo $economy_feauture_1; ?></li>
                            <li>✅ <?php echo $economy_feauture_2; ?></li>
                        </ul>
                    </div>
                    <div class="offerDetailRight">
                        <p class="offerPrice">
                            <span class="offerPriceDetail">${data.price_economy}</span> EUR
                        </p>
                        <button class="${data.economy_slot > 0 ? 'book-now' : 'sold-out'}">
                            ${data.economy_slot > 0 ? '<?php echo $eco_order_now; ?>' : '<?php echo $no_orderword; ?>'}
                        </button>
                    </div>
                </div>

                <div class="offerDetail">
                    <div class="offerDetailLeft">
                        <h2>Flex-Parking:</h2>
                        <ul>
                            <li>✅ <?php echo $flex_feauture_1; ?></li>
                            <li>✅ <?php echo $flex_feauture_2; ?></li>
                        </ul>
                    </div>
                    <div class="offerDetailRight">
                        <p class="offerPrice">
                            <span class="offerPriceDetail">${data.price_flex}</span> EUR
                        </p>
                        <button class="${data.flex_slot > 0 ? 'book-now' : 'sold-out'}">
                            ${data.flex_slot > 0 ? '<?php echo $flex_order_now; ?>' : '<?php echo $no_orderword; ?>'}
                        </button>
                    </div>
                </div>

                <div class="offerDetail">
                    <div class="offerDetailLeft">
                        <h2>XXL-Parking:</h2>
                        <ul>
                            <li>✅ <?php echo $xxl_feauture_1; ?></li>
                            <li>✅ <?php echo $xxl_feauture_2; ?></li>
                            <li>✅ <?php echo $xxl_feauture_3; ?></li>
                        </ul>
                    </div>
                    <div class="offerDetailRight">
                        <p class="offerPrice">
                            <span class="offerPriceDetail">${data.price_xxl}</span> EUR
                        </p>
                        <button class="${data.xxl_slot > 0 ? 'book-now' : 'sold-out'}">
                            ${data.xxl_slot > 0 ? '<?php echo $xxl_order_now; ?>' : '<?php echo $no_orderword; ?>'}
                        </button>
                    </div>
                </div>

                <div class="offerDetail">
                    <div class="offerDetailLeft">
                        <h2>VALET-Parking:</h2>
                        <ul>
                            <li>✅ <?php echo $valet_feauture_1; ?></li>
                            <li>✅ <?php echo $valet_feauture_2; ?></li>
                            <li>✅ <?php echo $valet_feauture_3; ?></li>
                        </ul>
                    </div>
                    <div class="offerDetailRight">
                        <p class="offerPrice">
                            <span class="offerPriceDetail">${data.price_valet}</span> EUR
                        </p>
                        <button class="${data.valet_slot > 0 ? 'book-now' : 'sold-out'}">
                            ${data.valet_slot > 0 ? '<?php echo $valet_order_now; ?>' : '<?php echo $no_orderword; ?>'}
                        </button>
                    </div>
                </div>

                <div class="offerDetail">
                    <div class="offerDetailLeft">
                        <h2>All-Inclusive-Parking:</h2>
                        <ul>
                            <li><?php echo $all_feauture_1; ?></li>
                            <li><?php echo $all_feauture_2; ?></li>
                            <li><?php echo $all_feauture_3; ?></li>
                            <li><?php echo $all_feauture_4; ?></li>
                        </ul>
                    </div>
                    <div class="offerDetailRight">
                        <p class="offerPrice">
                            <span class="offerPriceDetail">${data.price_all}</span> EUR
                        </p>
                        <button class="${data.all_slot > 0 ? 'book-now' : 'sold-out'}">
                            ${data.all_slot > 0 ? '<?php echo $all_order_now; ?>' : '<?php echo $no_orderword; ?>'}
                        </button>
                    </div>
                </div>
            `;

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
