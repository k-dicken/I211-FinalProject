<?php
/**
 *Author: your name*
 * Date: 4/13/2022
 * File: flight_create.class.php
 * Description:
 */


class FlightCreate extends IndexView {
    public function display() {

        parent::displayHeader("Flights", "white");

        $URL = BASE_URL;

        echo "<div id='flight-details'>
            <form class='flight-form-section' method='post' action='$URL" . "flight/add/'>
                <p class='flight-title' style='font-size: xx-large'>CREATE FLIGHT</p>
                <br>
                <br>
                <label for='date'>Date</label>
                <input name='date' type='date' placeholder='YYYY-MM-DD' required>
                <br>
                <label for='planeNum'>Plane Number</label>
                <input name='planeNum' class='flight-input' required>
                <br>
                <br>
                <label for='fromLocation'>From</label>
                <input name='fromLocation' class='flight-input flight-margin' type='text' minlength='3' maxlength='3' required>
                <br>
                <label for='toLocation'>To</label>
                <input name='toLocation' class='flight-input' minlength='3' maxlength='3' required>
                <br>
                <br>
                <label for='departTime'>Departs At</label>
                <input name='departTime' class='flight-input' type='time' required>
                <br>
                <label for='arriveTime'>Arrives At</label>
                <input name='arriveTime' class='flight-input' type='time' required>
                <br>
                <br>
                <label for='availability'>Availability</label>
                <input name='availability' class='flight-input' type='number' required>
                <br>
                <br>
                <label for='gate'>Gate</label>
                <input name='gate' class='flight-input' required>
                <br>
                <label for='status'>Status</label>
                <input name='status' class='flight-input' required>
                <br>
                <br>
                <br>
                <button>CREATE</button>
                <br>
                <br>
            </form>
    </div>";

        parent::displayFooter();
    }
}