<?php

class FlightUser extends IndexView {
    public function display($flights) {
        parent::displayHeader("Your Flights", "black");

        if ($flights === 0) {
            echo "<br><br><p>No Flights were found.</p>";
        } else {

            ?>

            <div id="flights">
            <br>
            <br>
            <br>
            <p class="flight-search-title">Your Flights</p>
            <br>
            <br>

            <?php

            foreach ($flights as  $flight) {
                $flightNum = $flight->getFlightNum();
                $date = $flight->getDate();
                $availability = $flight->getAvailability();
                $airline = $flight->getAirline();
                $fromLocation = $flight->getFromLocation();
                $toLocation = $flight->getToLocation();
                $departTime = substr($flight->getDepartTime(), 0, 5);
                $arriveTime = substr($flight->getArriveTime(), 0, 5);

                $URL = BASE_URL . "flight/detail/" . $flightNum;
//
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
                                    <a class='flight-details' href='$URL'>Learn More</a>
                                </div>
                                </div>";
            }
        }

        ?>

        </div>

        <?php
        parent::displayFooter();
    }

}