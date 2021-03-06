<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class FlightDetail extends IndexView {

    public function display($flight) {

        parent::displayHeader("Flights", "white");

        session_start();

        if (isset($_SESSION['userNum'])
            && isset($_SESSION['admin'])) {

            $userNum = $_SESSION['userNum'];
            $admin = $_SESSION['admin'];
        }

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
                <p class='flight-title' style='font-size: xx-large'>FLIGHT DETAILS</p>
                <p style='font-size: large'>$date</p>
                <br>
                <p class='flight-airline' style='font-size: x-large; font-weight: bold'>$airline</p>
                <p class='flight-airline' style='font-size: large'>$planeType</p>
                <br>
                <br>
                <br>
                <div class='flight-section flight-destination'>
                    <p class='flight-location flight-margin' style='font-size: xx-large; font-weight: bold'>$fromLocation</p>
                    <p class='flight-margin' style='font-size: xx-large'>➝</p>
                    <p class='flight-location' style='font-size: xx-large; font-weight: bold'>$toLocation</p>
                </div>
                <div class='flight-section flight-times'>
                    <p class='flight-from' style='font-size: x-large'>$departTime</p>
                    <p class='flight-to' style='font-size: x-large'>$arriveTime</p>
                </div>
                <br>
                <div class='flight-section' style='width: 80%'>
                    <p class='flight-availability'>Holds $capacity Passengers</p>
                    <p>Gate $gate</p>
                </div>
                <div class='flight-section' style='width: 80%'>
                    <p class='flight-availability' style='color: crimson'>$availability Seats Available</p>
                    <p style='color: crimson'>$status</p>
                </div>
                <br>
                <br>
                <br>
                <a class='button' href='$URL" . "flight/purchase/$flightNum'>PURCHASE TICKET</a>
                <br><br>";

            if ($admin == 1) {
                echo "<a class='grey-link' href='$URL" . "flight/edit/$flightNum'>Edit</a>&nbsp
                      <a class='red-link' href='$URL" . "flight/delete/$flightNum'>Delete</a>";
            }

            echo "</div>
    </div>";
?>



<?php
        parent::displayFooter();
    }
}