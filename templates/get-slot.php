<div id="stepTwoContainer">
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

        <button id="submitDate" class="checkDateBtn">JETZT PRÜFEN</button>
    </div>

    <div id="parking-options" style="display:none;">
        <h1>Wählen Sie Ihren Parkplatz</h1>
        <div id="error-parking" style="display:none;">
            <p id="errorincontent"></p>
        </div>
        <div id="parking-container"></div>
    </div>
</div>
