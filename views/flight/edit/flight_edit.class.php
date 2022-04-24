<?php

class FlightEdit extends IndexView {

    public function display($flight) {
        parent::displayHeader("Flights", "white");

        $flightNum = $flight->getFlightNum();
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
            <div class='flight-details-section'>
                <p class='flight-title' style='font-size: xx-large'>EDIT FLIGHT</p>
                <input value='$date'>
                <br>
                <input class='flight-input' value='$airline'>
                <input class='flight-input' value='$planeType'>
                <br>
                <br>
                <br>
                <div class='flight-section flight-destination'>
                    <input class='flight-input flight-margin' value='$fromLocation'>
                    <p class='flight-margin' style='font-size: xx-large'>➝</p>
                    <input class='flight-input' value='$toLocation'>
                </div>
                <div class='flight-section flight-times'>
                    <input class='flight-input' value='$departTime'>
                    <input class='flight-input' value='$arriveTime'>
                </div>
                <br>
                <div class='flight-section' style='width: 80%'>
                    <input class='flight-input' value='$capacity'>
                    <input class='flight-input' value='$gate'>
                </div>
                <div class='flight-section' style='width: 80%'>
                    <input class='flight-input' value='$availability'>
                    <input class='flight-input' value='$status'>
                </div>
                <br>
                <br>
                <br>
                <button>SUBMIT</button>
                <br>
                <a class='red-link' href='$URL" . "flight/delete/$flightNum'>Delete</a>
            </div>
    </div>";

        parent::displayFooter();
    }

}