<div id="checkDateWrapper">
    <!-- Schritt 1: Datumsbereich auswählen -->
    <h1>Wählen Sie Ihr An- und Abreisedatum</h1>
    <div id="checkDate">
 
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

    <!-- Parkplatzoptionen anzeigen -->
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
