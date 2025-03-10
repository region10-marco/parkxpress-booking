<div id="orderFormTwo">
    <form id="my-form" action="#" method="post" enctype="multipart/form-data">
        
        <div id="error2">
            <!-- Fehlermeldungen hier -->
        </div>

        <div id="displayfiels">
            <h4><?php echo $order_headline; ?></h4>
            <p><?php echo $order_text; ?></p>

            <div class="formGroup">
                <label><?php echo $order_label_firm; ?></label>
                <input name="firm" type="text" class="normForm" id="firm" />
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_name; ?> *</label>
                <input name="lastname" type="text" required="required" class="normForm" id="lastname" />
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_vorname; ?> *</label>
                <input name="firstname" type="text" required="required" class="normForm" id="firstname" />
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_mail; ?> *</label>
                <input name="email" type="email" required="required" class="normForm" id="email" />
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_street; ?> *</label>
                <input name="street" type="text" required="required" class="normForm" id="street" />
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_city; ?> *</label>
                <input name="plz" type="text" required="required" class="normFormsmall" id="plz" />
                <input name="city" type="text" required="required" class="normFormmiddle" id="city" />
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_mobphone; ?> *</label>
                <input name="mobnr" type="text" required="required" class="normForm" id="mobnr" />
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_kennzeichen; ?> *</label>
                <input name="kfz" type="text" required="required" class="normForm" id="kfz" />
            </div>

            <h4><?php echo $order_headline2; ?></h4>

            <div class="formGroup">
                <label>
                    <?php echo $order_label_abflugzeit; ?> <?php echo $datum_uhrzeit; ?>
                </label>
                <input style="float: left;" name="abflug" type="text" class="normForm smallerForm2" id="abflug" readonly="true" />
            </div>

            <div class="formGroup">
                <label>Abflug Stunde:</label>
                <select id="abh" name="abh" class="nornSelect">
                    <?php for ($i = 5; $i <= 23; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="formGroup">
                <label>Abflug Minute:</label>
                <select id="abm" name="abm" class="nornSelect">
                    <?php for ($i = 0; $i <= 55; $i += 5) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="formGroup">
                <label><?php echo $order_label_ankunftpark; ?></label>
                <select id="ankunfthour" name="ankunfthour" class="nornSelect">
                    <?php for ($i = 4; $i <= 23; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="formGroup">
                <label>Ankunft Minute:</label>
                <select id="ankunfminute" name="ankunfminute" class="nornSelect">
                    <?php for ($i = 0; $i <= 55; $i += 5) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_reiseziel; ?> *</label>
                <input name="ziel" type="text" required="required" class="normForm" id="ziel" />
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_flugnummerhin; ?></label>
                <input name="flugnrhin" type="text" required="required" class="normForm" id="flugnrhin" />
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_zeitrueck; ?> <?php echo $datum_uhrzeit; ?></label>
                <input style="float: left;" name="rueckfluglandung" type="text" class="normForm smallerForm2" id="rueckfluglandung" readonly="true" />
            </div>

            <div class="formGroup">
                <label>Rückflug Stunde:</label>
                <select id="anh" name="anh" class="nornSelect">
                    <?php for ($i = 5; $i <= 23; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="formGroup">
                <label>Rückflug Minute:</label>
                <select id="anm" name="anm" class="nornSelect">
                    <?php for ($i = 0; $i <= 55; $i += 5) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="formGroup">
                <label class="bolder"><?php echo $order_label_flugnummerzur; ?> *</label>
                <input name="rueckflugnr" type="text" required="required" class="normForm" id="rueckflugnr" />
            </div>

            <div class="formGroup">
                <label id="personlabel" class="bolder"><?php echo $order_label_personen; ?> *</label>
                <select id="person" name="person" class="nornSelect">
                    <?php for ($i = 1; $i <= 9; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

            <p id="persmsg">
                <?php echo $personen_hinweis; ?> 
                <span id="persaufschlag"></span> Euro. 
                <strong><?php echo $wordtipp; ?>:</strong> <?php echo $personen_hinweis_2; ?>
            </p>

            <input type="hidden" id="sich_erg" value="<?php echo $sich_erg; ?>" />

            <div class="formGroup">
                <label><?php echo $order_label_hand; ?></label>
                <input type="checkbox" id="handgepaeck" name="handgepaeck" value="1" style="clear: both" />
            </div>

            <div class="formGroup">
                <label><?php echo $order_label_notice; ?></label>
                <input name="notice" type="text" class="normForm" size="5" id="notice" />
            </div>
        </div> <!-- Ende displayfiels -->

        <hr />

        <div id="orderFormBottomLeft">
            <h4><?php echo $order_label_zusatz; ?></h4>

            <div class="formGroup">
                <input type="checkbox" id="tank" name="tank" value="1" />
                <p class="inliner tank">
                    <?php echo $order_label_tank; ?> <span>10,00</span> Euro
                </p>
            </div>

            <div class="formGroup">
                <input type="checkbox" id="innen" name="innen" value="1" />
                <p class="inliner innen">
                    <?php echo $order_label_innen; ?> <span>10,00</span> Euro
                </p>
            </div>

            <div class="formGroup">
                <input type="checkbox" id="aussen" name="aussen" value="1" />
                <p class="inliner aussen">
                    <?php echo $order_label_aussen; ?> <span>10,00</span> Euro
                </p>
            </div>

            <div id="inkleistungen">
                <p class="inliner inneninker">
                    <input type="checkbox" id="innenink" name="innenink" disabled checked />
                    <?php echo $order_label_innen; ?> <?php echo $inklusive_word; ?>
                </p>
                <p class="inliner ausseninker">
                    <input type="checkbox" id="aussenink" name="aussenink" disabled checked />
                    <?php echo $order_label_aussen; ?> <?php echo $inklusive_word; ?>
                </p>
            </div>

            <hr />

            <div class="formGroup">
                <label>
                    <b>Sicherheitsfrage :</b> <?php echo $array_one[$random_1]; ?> + <?php echo $array_one[$random_2]; ?> =
                </label>
                <input name="sich" required type="text" class="normForm" id="sich" />
            </div>

            <div class="formGroup" style="margin-top: 3px;">
                <input required type="checkbox" name="agbs" id="agbs" value="1" />
                <span>&nbsp;&nbsp;&nbsp;<?php echo $order_label_agb; ?></span>
            </div>

            <div class="formGroup" style="margin-top: 3px;">
                <input required type="checkbox" name="datasecurity" id="datasecurity" value="1" />
                <span>&nbsp;&nbsp;&nbsp;<?php echo $datasecurity; ?></span>
            </div>

            <p id="testmich"><?php echo $order_label_btn; ?></p>
            <em style="clear: both">*<?php echo $order_info_pflicht; ?></em>
        </div>

        <div id="orderFormBottomRight">
            <p id="bottonRightHeadline"></p>
            <p id="bottonRightPrice"></p>
            <p id="bottomTank">+ <?php echo $tankservice_word; ?>: <?php echo get_expreis('extank'); ?>,00 EUR</p>
            <p id="bottomInnen">+ <?php echo $innenreinigung_word; ?>: <?php echo get_expreis('exinn'); ?>,00 EUR</p>
            <p id="bottomAussen">+ <?php echo $aussenreinigung_word; ?>: <?php echo get_expreis('exrein'); ?>,00 EUR</p>
            <p id="bottompersonen">+ <?php echo $personenaufschlag_word; ?>: <span></span>,00 Euro</p>
            <p id="bottomGesamtContainer">
                <?php echo $gesamtpreis_word; ?>: <span id="bottomGesamt"></span> EUR
            </p>
        </div>

        <div style="clear: both;"></div>

    </form>
</div>
