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
        <h1><?php echo $order_headline; ?></h1>
        <div id="error-parking" style="display:none;">
            <p id="errorincontent"></p>
        </div>

        <div id="parking-container"></div>
    </div>
</div>