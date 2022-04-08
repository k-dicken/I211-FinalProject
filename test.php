<?php
//load application settings
require_once ("application/config.php");

//load autoloader
require_once ("vendor/autoload.php");

$index = new IndexView();
//$flightModel = new FlightModel();

$flightModel = new FlightModel();
$flights = $flightModel->search_flights("DWA");

echo "test0";
$search = new FlightSearch();
echo "test1";
$search->display("DWA", $flights);
echo "test2";

//$index->displayHeader("test", "white");
//?>
<!--    <div id="flight-details">-->
<!--        <div class="flight-details-section">-->
<!--            <p class='flight-title'>FLIGHT DETAILS</p>-->
<!--            <br>-->
<!--            <p class='flight-airline' style="font-size: large">American Airlines</p>-->
<!--            <br>-->
<!--            <div class='flight-section flight-destination'>-->
<!--                <p class='flight-location flight-margin'>FRO</p>-->
<!--                <p class="flight-margin">➝</p>-->
<!--                <p class='flight-location'>TOL</p>-->
<!--            </div>-->
<!--            <div class='flight-section flight-times'>-->
<!--                <p class='flight-from'>12:30 AM</p>-->
<!--                <p class='flight-to'>4:24 AM</p>-->
<!--            </div>-->
<!--            <p class='flight-availability'>32 Seats Available</p>-->
<!--            <br>-->
<!--            <button>PURCHASE TICKET</button>-->
<!--        </div>-->
<!--    </div>-->

<!--    <form id="search" class="search-flight" action="search">-->
<!--        <p class="search-title"></p>-->
<!---->
<!--    <div class="row">-->
<!--            <div class="sub-section row">-->
<!--                <div class="input destination-input">-->
<!--                    <label for="from">FROM</label>-->
<!--                    <input name="from" type="text" minlength="3" maxlength="3">-->
<!--                </div>-->
<!--                <p class="search-arrow">➝</p>-->
<!--                <div class="input destination-input">-->
<!--                    <label for="to">TO</label>-->
<!--                    <input name="to" type="text" minlength="3" maxlength="3">-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="input sub-section">-->
<!--                <label for="depart">DEPART</label>-->
<!--                <input name="depart" type="date">-->
<!--            </div>-->
<!---->
<!---->
<!--        <button style="margin: 0;" type="submit">SEARCH</button>-->
<!--    </div>-->
<!--    </form>-->
<!---->
<!--    <div id="flights">-->
<!--        <div class="flight">-->
<!--            <p class='flight-airline'>American Airlines</p>-->
<!--            <div class='flight-section flight-destination'>-->
<!--                <p class='flight-location flight-margin'>FRO</p>-->
<!--                <p class="flight-margin">➝</p>-->
<!--                <p class='flight-location'>TOL</p>-->
<!--            </div>-->
<!--            <div class='flight-section flight-times'>-->
<!--                <p class='flight-from'>12:30 AM</p>-->
<!--                <p class='flight-to'>4:24 AM</p>-->
<!--            </div>-->
<!--            <div class='flight-section'>-->
<!--                <p class='flight-availability'>32 Seats Available</p>-->
<!--                <a class='flight-details' href='", BASE_URL , '/flight/detail/$flightNum'>Learn More</a>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="flight">-->
<!--            <p class='flight-airline'>American Airlines</p>-->
<!--            <div class='flight-section flight-destination'>-->
<!--                <p class='flight-location flight-margin'>FRO</p>-->
<!--                <p class="flight-margin">➝</p>-->
<!--                <p class='flight-location'>TOL</p>-->
<!--            </div>-->
<!--            <div class='flight-section flight-times'>-->
<!--                <p class='flight-from'>12:30 AM</p>-->
<!--                <p class='flight-to'>4:24 AM</p>-->
<!--            </div>-->
<!--            <div class='flight-section'>-->
<!--                <p class='flight-availability'>32 Seats Available</p>-->
<!--                <a class='flight-details' href='", BASE_URL , '/flight/detail/$flightNum'>Learn More</a>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class='flight'>-->
<!--            <p class='flight-airline'>American Airlines</p>-->
<!--            <div class='flight-section flight-destination'>-->
<!--                <p class='flight-location flight-margin'>FRO</p>-->
<!--                <p class='flight-margin'>➝</p>-->
<!--                <p class='flight-location'>TOL</p>-->
<!--            </div>-->
<!--            <div class='flight-section flight-times'>-->
<!--                <p class='flight-from'>12:30 AM</p>-->
<!--                <p class='flight-to'>4:24 AM</p>-->
<!--            </div>-->
<!--            <div class='flight-section'>-->
<!--                <p class='flight-availability'>32 Seats Available</p>-->
<!--                <a class='flight-details' href='", BASE_URL , '/flight/detail/$flightNum'>Learn More</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<?php

//$index->displayFooter();
