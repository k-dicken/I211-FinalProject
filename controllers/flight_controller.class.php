<?php

class FlightController {
    private $flightModel;

    //default constructor
    public function __construct() {
        //create an instance of the MovieModel class
        $this->flightModel = FlightModel::getFlightModel();
    }

    //index action that displays all movies
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
        //retrieve the specific movie
        $flight = $this->flightModel->view_flight($flightNum);

        if (!$flight) {
            //display an error
            $message = "There was a problem displaying the flight flightNum='" . $flightNum . "'.";
            $this->error($message);
            return;
        }

        //display movie details
        $view = new FlightDetail();
        $view->display($flight);
    }
}