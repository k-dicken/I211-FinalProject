<?php

class FlightEdit extends IndexView {

    public function display($flight) {
        parent::displayHeader("Flights", "white");

        $flightNum = $flight->getFlightNum();
        $planeNum = $flight->getPlaneNum();
        $date = $flight->getDate();
        $airline = $flight->getAirline();
        $planeType = $flight->getPlaneType();
        $fromLocation = $flight->getFromLocation();
        $toLocation = $flight->getToLocation();
        $departTime = substr($flight->getDepartTime(), 0, 5);
        $arriveTime = substr($flight->getArriveTime(), 0, 5);
        $capacity = $flight->getCapacity();
        $availability = $flight->getAvailability();
        $gate = $flight->getGate();
        $status = $flight->getStatus();

        $URL = BASE_URL;

        echo "<div id='flight-details'>
            <form class='flight-form-section' method='post' action='$URL" . "flight/update/" . $flightNum ."'>
                <p class='flight-title' style='font-size: xx-large'>EDIT FLIGHT</p>
                <br>
                <br>
                <label for='date'>Date</label>
                <input name='date' type='date' value='$date'>
                <br>
                <label for='planeNum'>Plane Number</label>
                <input name='planeNum' class='flight-input' value='$planeNum'>
                <br>
                <br>
                <label for='fromLocation'>From</label>
                <input name='fromLocation' class='flight-input flight-margin' value='$fromLocation' type='text' minlength='3' maxlength='3'>
                <br>
                <label for='toLocation'>To</label>
                <input name='toLocation' class='flight-input' value='$toLocation' minlength='3' maxlength='3'>
                <br>
                <br>
                <label for='departTime'>Departs At</label>
                <input name='departTime' class='flight-input' value='$departTime' type='time'>
                <br>
                <label for='arriveTime'>Arrives At</label>
                <input name='arriveTime' class='flight-input' value='$arriveTime' type='time'>
                <br>
                <br>
                <label for='availability'>Availability</label>
                <input name='availability' class='flight-input' value='$availability' type='number'>
                <br>
                <br>
                <label for='gate'>Gate</label>
                <input name='gate' class='flight-input' value='$gate'>
                <br>
                <label for='status'>Status</label>
                <input name='status' class='flight-input' value='$status'>
                <br>
                <br>
                <br>
                <button>SUBMIT</button>
                <br>
                <a class='red-link' style='margin: 0 auto' href='$URL" . "flight/delete/$flightNum'>Delete</a>
                <br>
            </form>
    </div>";

        parent::displayFooter();
    }

}