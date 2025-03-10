<div id="checkDateWrapper">
    <h1><?php echo $headline; ?></h1>
    <div id="error" style="display:none;">
        <p id="errorincontent"></p>
    </div>
    <div id="checkDate">
        <div class="formInput">
            <label for="check-in"><?php echo $checkinlabel; ?></label>
            <input type="text" id="check-in" name="check-in" class="textInput" readonly>
        </div>

        <div class="formInput">
            <label for="check-out"><?php echo $checkoutlabel; ?></label>
            <input type="text" id="check-out" name="check-out" class="textInput" readonly>
        </div>

        <button id="submitDate" class="checkDateBtn"><?php echo $checkbtn; ?></button>
    </div>

    <div id="parking-options" style="display:none;">
        <h1><?php echo $headline_two; ?></h1>
        <div id="error-parking" style="display:none;">
            <p id="errorincontent"></p>
        </div>

        <div id="parking-container"></div>
    </div>
</div>

<script>
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
                            <li><?php echo $economy_feauture_1; ?></li>
                            <li><?php echo $economy_feauture_2; ?></li>
                        </ul>
                    </div>
                    <div class="offerDetailRight">
                        <p class="offerPrice">
                            <span class="offerPriceDetail">${parseFloat(data.price_economy).toFixed(2).replace('.', ',')}</span> EUR
                        </p>
                        <button class="${data.economy_slot > 0 ? 'book-now' : 'sold-out'}">
                            ${data.economy_slot > 0 ? '<?php echo $eco_order_now; ?>' : '<?php echo $no_orderword_2; ?>'}
                        </button>
                    </div>
                </div>

                <div class="offerDetail">
                    <div class="offerDetailLeft">
                        <h2>Flex-Parking:</h2>
                        <ul>
                            <li><?php echo $flex_feauture_1; ?></li>
                            <li><?php echo $flex_feauture_2; ?></li>
                        </ul>
                    </div>
                    <div class="offerDetailRight">
                        <p class="offerPrice">
                            <span class="offerPriceDetail">${parseFloat(data.price_flex).toFixed(2).replace('.', ',')}</span> EUR
                        </p>
                        <button class="${data.flex_slot > 0 ? 'book-now' : 'sold-out'}">
                            ${data.flex_slot > 0 ? '<?php echo $flex_order_now; ?>' : '<?php echo $no_orderword_2; ?>'}
                        </button>
                    </div>
                </div>

                <div class="offerDetail">
                    <div class="offerDetailLeft">
                        <h2>XXL-Parking:</h2>
                        <ul>
                            <li><?php echo $xxl_feauture_1; ?></li>
                            <li><?php echo $xxl_feauture_2; ?></li>
                            <li><?php echo $xxl_feauture_3; ?></li>
                        </ul>
                    </div>
                    <div class="offerDetailRight">
                        <p class="offerPrice">
                            <span class="offerPriceDetail">${parseFloat(data.price_xxl).toFixed(2).replace('.', ',')}</span> EUR
                        </p>
                        <button class="${data.xxl_slot > 0 ? 'book-now' : 'sold-out'}">
                            ${data.xxl_slot > 0 ? '<?php echo $xxl_order_now; ?>' : '<?php echo $no_orderword_2; ?>'}
                        </button>
                    </div>
                </div>

                <div class="offerDetail">
                    <div class="offerDetailLeft">
                        <h2>VALET-Parking:</h2>
                        <ul>
                            <li><?php echo $valet_feauture_1; ?></li>
                            <li><?php echo $valet_feauture_2; ?></li>
                            <li><?php echo $valet_feauture_3; ?></li>
                        </ul>
                    </div>
                    <div class="offerDetailRight">
                        <p class="offerPrice">
                            <span class="offerPriceDetail">${parseFloat(data.price_valet).toFixed(2).replace('.', ',')}</span> EUR
                        </p>
                        <button class="${data.valet_slot > 0 ? 'book-now' : 'sold-out'}">
                            ${data.valet_slot > 0 ? '<?php echo $valet_order_now; ?>' : '<?php echo $no_orderword_2; ?>'}
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
                            <span class="offerPriceDetail">${parseFloat(data.price_all).toFixed(2).replace('.', ',')}</span> EUR
                        </p>
                        <button class="${data.all_slot > 0 ? 'book-now' : 'sold-out'}">
                            ${data.all_slot > 0 ? '<?php echo $all_order_now; ?>' : '<?php echo $no_orderword_2; ?>'}
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
});
</script>
