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
    <div id="orderFormWrapper">
        <div id="orderForm">
            <form id="my-form" action="#" method="post" enctype="multipart/form-data">
                <div id="ang">

                </div>
                <div id="error2">

                </div>

                <div id="displayfiels">
                    <h4><?php echo $order_headline ?></h4>
                    <p><?php $order_text ?></p>
                    <label><?php echo $order_label_firm ?></label><input name="firm" type="text" class="normForm" id="firm" /><br />
                    <label class="bolder"><?php echo $order_label_name ?> *</label><input name="lastname" type="text" required="required" class="normForm" id="lastname" /><br />
                    <label class="bolder"><?php echo $order_label_vorname ?> *</label><input name="firstname" type="text" required="required" class="normForm" id="firstname" /><br />
                    <label class="bolder"><?php echo $order_label_mail ?> *</label><input name="email" type="email" required="required" class="normForm" id="email" /><br />
                    <label class="bolder"><?php echo $order_label_street ?> *</label><input name="street" type="text" required="required" class="normForm" id="street" /><br />
                    <label class="bolder"><?php echo $order_label_city ?> *</label><input name="plz" type="text" required="required" class="normFormsmall" id="plz" /><input name="city" type="text" required="required" class="normFormmiddle" id="city" /><br />
                    <label class="bolder"><?php echo $order_label_mobphone ?> *</label><input name="mobnr" type="text" required="required" class="normForm" id="mobnr" /><br />
                    <label class="bolder"><?php echo $order_label_kennzeichen ?> *</label><input name="kfz" type="text" required="required" class="normForm" id="kfz" /><br />
                    <h4><?php echo $order_headline2 ?> </h4>

                    <label><?php echo $order_label_abflugzeit ?> <?php echo $datum_uhrzeit ?></label><input style="float: left;" name="abflug" type="text" class="normForm smallerForm2" id="abflug" readonly="true" />

                    <select id="abh" name="abh" class="nornSelect">
                        <?php for ($i = 5; $i <= 23; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select id="abm" name="abm" class="nornSelect">
                        <?php for ($i = 00; $i <= 55; $i += 5) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>Ì
                    </select><br />
                    <label><?php echo $order_label_ankunftpark ?> </label>
                    <select id="ankunfthour" name="ankunfthour" class="nornSelect">
                        <?php for ($i = 4; $i <= 23; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select id="ankunfminute" name="ankunfminute" class="nornSelect">
                        <?php for ($i = 00; $i <= 55; $i += 5) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>Ì
                    </select><br />
                    <label class="bolder"><?php echo $order_label_reiseziel ?> *</label><input name="ziel" type="text" required="required" class="normForm" id="ziel" /><br />

                    <label class="bolder"><?php echo $order_label_flugnummerhin ?></label><input name="flugnrhin" type="text" required="required" class="normForm" id="flugnrhin" /><br />
                    <label class="bolder"><?php echo $order_label_zeitrueck ?> <?php echo $datum_uhrzeit ?></label><input style="float: left;" name="rueckfluglandung" type="text" class="normForm smallerForm2" id="rueckfluglandung" readonly="true" />

                    <select id="anh" name="anh" class="nornSelect">
                        <?php for ($i = 5; $i <= 23; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select id="anm" name="anm" class="nornSelect">
                        <?php for ($i = 00; $i <= 55; $i += 5) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>Ì
                    </select><br /><br />
                    <label class="bolder"><?php echo $order_label_flugnummerzur ?> *</label><input name="rueckflugnr" type="text" required="required" class="normForm" id="rueckflugnr" /><br />
                    <label id="personlabel" class="bolder"><?php echo $order_label_personen ?> *</label>
                    <select id="person" name="person" class="nornSelect">
                        <?php for ($i = 1; $i <= 9; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select><br />

                    <p id="persmsg"><?php echo $personen_hinweis ?> <span id="persaufschlag"></span> Euro. <strong><?php echo $wordtipp ?>:</strong> <?php echo $personen_hinweis_2 ?></p>
                    <input type="hidden" id="sich_erg" value="<?php echo $sich_erg ?>" />
                    <br />
                    <label><?php echo $order_label_hand ?></label><input type="checkbox" id="handgepaeck" value="1" name="handgepaeck" style="clear: both" /><br /><br />
                    <label><?php echo $order_label_notice ?></label><input name="notice" type="text" class="normForm" size="5" id="notice" /><br />


                    <br />

                    <hr />
                    <div id="orderFormBottomLeft">
                        <h4><?php echo $order_label_zusatz ?></h4>

                        <input type="checkbox" id="tank" name="tank" value="1" />
                        <p class="inliner tank"><?php echo $order_label_tank ?> <span>10,00</span> Euro</p><br />
                        <input type="checkbox" id="innen" name="innen" value="1" />
                        <p class="inliner innen"><?php echo $order_label_innen ?> <span>10,00</span> Euro</p><br />
                        <input type="checkbox" id="aussen" name="aussen" value="1" />
                        <p class="inliner aussen"><?php echo $order_label_aussen ?> <span>10,00</span> Euro</p><br />
                        <div id="inkleistungen">
                            <p class="inliner inneninker"><input type="checkbox" id="innenink" name="innenink" disabled checked /><?php echo $order_label_innen ?> <?php echo $inklusive_word ?></p><br />
                            <p class="inliner ausseninker"><input type="checkbox" id="aussenink" name="aussenink" disabled checked /><?php echo $order_label_aussen ?> <?php echo $inklusive_word ?></p><br />
                        </div>
                        </br>
                        </br>
                        <hr />

                        <label><b>Sicherheitsfrage :</b> <?php echo $array_one[$random_1] ?> + <?php echo $array_one[$random_2] ?> = </label><input name="sich" required type="text" class="normForm" id="sich" />
                        <br />
                        <div style="margin-top: 3px;"><input required type="checkbox" name="agbs" id="agbs" value="1" /><span>&nbsp;&nbsp;&nbsp;<?php echo $order_label_agb ?></span></div>
                        <div style="margin-top: 3px;"><input required type="checkbox" name="datasecurity" id="datasecurity" value="1" /><span>&nbsp;&nbsp;&nbsp;<?php echo $datasecurity ?></span><br /><br /><br /></div>


                        <p id="testmich"><?php echo $order_label_btn ?></p>
                        <br /><br /><br />
                        <em style="clear: both">*<?php echo $order_info_pflicht ?></em>
                    </div>
                    <div id="orderFormBottomRight">
                        <p id="bottonRightHeadline"></p>
                        <p id="bottonRightPrice"></p>
                        <p id="bottomTank">+ <?php echo $tankservice_word ?>: <?php echo get_expreis('extank') ?>,00 EUR</p>
                        <p id="bottomInnen">+ <?php echo $innenreinigung_word ?>: <?php echo get_expreis('exinn') ?>,00 EUR</p>
                        <p id="bottomAussen">+ <?php echo $aussenreinigung_word ?>: <?php echo get_expreis('exrein') ?>,00 EUR</p>
                        <p id="bottompersonen">+ <?php echo $personenaufschlag_word ?>: <span></span>,00 Euro</p>
                        <p id="bottomGesamtContainer"><?php echo $gesamtpreis_word ?>: <span id="bottomGesamt"></span> EUR</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $("#check-in").datepicker({
            dateFormat: "dd.mm.yy",
            minDate: 0,
            onSelect: function(selectedDate) {
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
                success: function(response) {
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


        $("#submitDate").click(function() {
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