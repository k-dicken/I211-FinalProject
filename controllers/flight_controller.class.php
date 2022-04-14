<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class FlightController {
    private $flightModel;

    //default constructor
    public function __construct() {
        //create an instance of the FlightModel class
        $this->flightModel = FlightModel::getFlightModel();
    }

    //index action that displays all flights
    public function index() {
        //retrieve all flights and store them in an array
        $flights = $this->flightModel->list_flights();

        if (!$flights) {
            //display an error
            $message = "There was a problem displaying flights.";
            $this->error($message);
            return;
        }

        // display all flights
        $view = new FlightIndex();
        $view->display($flights);
    }

    public function detail($flightNum) {
        //retrieve the specific flight
        $flight = $this->flightModel->view_flight($flightNum);

        if (!$flight) {
            //display an error
            $message = "There was a problem displaying the flight flightNum='" . $flightNum . "'.";
            $this->error($message);
            return;
        }

        //display flights details
        $view = new FlightDetail();
        $view->display($flight);
    }

    //search flights
    public function search() {
        //retrieve query terms from search form
        $to = trim($_GET['to']);
        $from = trim($_GET['from']);
        $depart = trim($_GET['depart']);

        if ($to == "" && $from == "" && $depart == "") {
            $this->index();
            exit();
        }

        //search the database for matching flights
        $flights = $this->flightModel->search_flights($to, $from, $depart);

        if ($flights === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched flights
        $search = new FlightSearch();
        $search->display($to, $from, $depart, $flights);
    }

    //search flights
    public function user($userNum) {
        //search the database for matching flights
        $flights = $this->flightModel->user_flights($userNum);

        if ($flights === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }

        //display matched flights
        $search = new FlightUser();
        $search->display($flights);
    }

    public function create() {

        $create = new FlightCreate();
        $create->display();
    }
}