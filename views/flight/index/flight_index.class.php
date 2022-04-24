<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 5, 2022
 * Name: flight_index.class.php
 * Description: This class defines a method called "display", which displays all flights.
 */

class FlightIndex extends FlightIndexView {

    public function display($flights) {
        parent::displayHeader("Flights", "black");

        session_start();

        if (isset($_SESSION['userNum'])
            && isset($_SESSION['admin'])) {

            $userNum = $_SESSION['userNum'];
            $admin = $_SESSION['admin'];
        }
        ?>

        <div id="flights">
        <?php

                if ($flights === 0) {
                    echo "No flights were found.";
                } else {
                    foreach ($flights as  $flight) {
                        $flightNum = $flight->getFlightNum();
                        $date = $flight->getDate();
                        $availability = $flight->getAvailability();
                        $airline = $flight->getAirline();
                        $fromLocation = $flight->getFromLocation();
                        $toLocation = $flight->getToLocation();
                        $departTime = substr($flight->getDepartTime(), 0, 5);
                        $arriveTime = substr($flight->getArriveTime(), 0, 5);

                        $URL = BASE_URL;

                        echo "<div class='flight' href='$URL'>
                                <p style='font-size: medium; margin-bottom: 6px'>$date</p>
                                <p class='flight-airline'>$airline</p>
                                <div class='flight-section flight-destination'>
                                    <p class='flight-location flight-margin'>$fromLocation</p>
                                    <p class='flight-margin'>➝</p>
                                    <p class='flight-location'>$toLocation</p>
                                </div>
                                <div class='flight-section flight-times'>
                                    <p class='flight-from'>$departTime</p>
                                    <p class='flight-to'>$arriveTime</p>
                                </div>
                                <div class='flight-section'>
                                    <p class='flight-availability'>$availability Seats Available</p>
                                    <a class='flight-details' href='$URL" . "flight/detail/$flightNum'>Learn More</a>
                                </div>
                                <br>";

                        if ($admin == 1) {
                            echo "<div style='display: flex'> 
                                    <a class='grey-link' href='$URL" . "flight/edit/$flightNum'>Edit</a>&nbsp&nbsp&nbsp&nbsp
                                    <a class='red-link' href='$URL" . "flight/delete/$flightNum'>Delete</a>
                                </div>";
                        }

                        echo "</div>";
                    }
                }

        ?>



        </div>

    <?php
        parent::displayFooter();
    }
}