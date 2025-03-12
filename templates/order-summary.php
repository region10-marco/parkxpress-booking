<div id="orderWrapperRightInner">
    <h4>Ihre Buchung</h4>
    <div id="orderSummary">
        <div class="orderSummaryRow tarifrow">
            <div class="orderSummaryLabel"><?php echo $gebuchter_tarif; ?></div>
            <div class="orderSummaryValue" id="tarifrow"></div>
        </div>
        <div class="orderSummaryRow checkinrow">
            <div class="orderSummaryLabel"><?php echo $checkinlabel; ?></div>
            <div class="orderSummaryValue" id="checkinrow"></div>
        </div>
        <div class="orderSummaryRow checkoutrow">
            <div class="orderSummaryLabel"><?php echo $checkoutlabel; ?></div>
            <div class="orderSummaryValue" id="checkoutrow"></div>
        </div>
        <hr />
        <div class="orderSummaryRow tankrow">
            <div class="orderSummaryLabel"><?php echo $order_label_tank; ?></div>
            <div class="orderSummaryValue" id="tankrow"></div>
        </div>
        <div class="orderSummaryRow innenrow">
            <div class="orderSummaryLabel"><?php echo $order_label_innen; ?></div>
            <div class="orderSummaryValue" id="innenrow"></div>
        </div>
        <div class="orderSummaryRow aussenrow">
            <div class="orderSummaryLabel"><?php echo $order_label_aussen; ?></div>
            <div class="orderSummaryValue" id="aussenrow"></div>
        </div>
        <div class="orderSummaryRow personenrow">
            <div class="orderSummaryLabel"><?php echo $order_label_personen; ?></div>
            <div class="orderSummaryValue" id="personenrow"></div>
        </div>
        <hr />
        <div class="orderSummaryRow endpreisrow">

            <div class="orderSummaryLabel"><?php echo $gesamtpreis_word; ?></div>
            <div class="orderSummaryValue" id="entpreisrow"></div>
        </div>
    </div>