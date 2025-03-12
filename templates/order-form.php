<div id="orderFormTwo">
    <form id="my-form" action="#" method="post" enctype="multipart/form-data">

        <div id="error2">
            <!-- Fehlermeldungen hier -->
        </div>

        <div id="displayfiels">
            <h4><?php echo $order_headline; ?></h4>

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
                <input name="plz" type="text" required="required" class="normFormsmall span2" id="plz" />
                <input name="city" type="text" required="required" class="normFormmiddle span6" id="city" />
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
                <input style="float: left;" name="abflug" type="text" class="normForm smallerForm2 span4" id="abflug" readonly="true" />

                <select id="abh" name="abh" class="nornSelect span2">
                    <?php for ($i = 5; $i <= 23; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>

                <select id="abm" name="abm" class="nornSelect span2">
                    <?php for ($i = 0; $i <= 55; $i += 5) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="formGroup">
                <label><?php echo $order_label_ankunftpark; ?></label>
                <select id="ankunfthour" name="ankunfthour" class="nornSelect span2">
                    <?php for ($i = 4; $i <= 23; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>



                <select id="ankunfminute" name="ankunfminute" class="nornSelect span2">
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
                <input style="float: left;" name="rueckfluglandung" type="text" class="normForm smallerForm2 span4" id="rueckfluglandung" readonly="true" />

                <select id="anh" name="anh" class="nornSelect span2">
                    <?php for ($i = 5; $i <= 23; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>

                <select id="anm" name="anm" class="nornSelect span2">
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

            <div class="formGroup checkbox-container">
                <label><?php echo $order_label_hand; ?></label>
                <div>
                    <input class="pxcheckbox" type="checkbox" id="handgepaeck" name="handgepaeck" value="1" style="clear: both" />
                </div>
            </div>

            <div class="formGroup" style="height: auto;">
                <label><?php echo $order_label_notice; ?></label>
                <textarea name="notice" id="notice"></textarea>
            </div>
            <hr />
            <h3><?php echo $order_label_zusatz; ?></h3>
            <div class="formGroup checkbox-container">
                <label><?php echo $order_label_tank; ?> <span> 10,00 Euro</span></label>
                <div>
                    <input class="pxcheckbox" type="checkbox" id="tank" name="tank" value="1" style="clear: both" />
                </div>
            </div>
            <div class="formGroup checkbox-container">
                <label><?php echo $order_label_aussen; ?> <span> 10,00 Euro</span></label>
                <div>
                    <input class="pxcheckbox" type="checkbox" id="aussen" name="aussen" value="1" style="clear: both" />
                </div>
            </div>
            <div class="formGroup checkbox-container">
                <label><?php echo $order_label_innen; ?> <span> 10,00 Euro</span></label>
                <div>
                    <input class="pxcheckbox" type="checkbox" id="innen" name="innen" value="1" style="clear: both" />
                </div>
            </div>
            <hr />
            <div class="formGroupTwo checkbox-container">
                <div>
                    <input class="pxcheckbox" type="checkbox" id="agbs" name="agbs" value="1" style="clear: both" />
                </div>
                <label><?php echo $order_label_agb; ?></label>
            </div>
            <div class="formGroupTwo checkbox-container">
                <div>
                    <input class="pxcheckbox" type="checkbox" id="datasecurity" name="datasecurity" value="1" style="clear: both" />
                </div>
                <label><?php echo $datasecurity; ?></label>
            </div>
        </div> <!-- Ende displayfiels -->
        <div>
            <p id="testmich"><?php echo $order_label_btn; ?></p>
            <em style="clear: both">*<?php echo $order_info_pflicht; ?></em>
        </div>

        <div style="clear: both;"></div>

    </form>
</div>