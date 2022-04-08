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

    //search movies
    public function search() {
        //retrieve query terms from search form
        $to = trim($_GET['to']);
        $from = trim($_GET['from']);
        $depart = trim($_GET['depart']);

        $terms = array($to, $from, $depart);

        foreach ($terms as $term) {
            //if search term is empty, list all flights
            if ($term == "") {
                $this->index();
            }
        }

        //search the database for matching movies
        $flights = $this->flightModel->search_flights($to, $from, $depart);

        if ($flights === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched movies
        $search = new FlightSearch();
        $search->display($to, $from, $depart, $flights);
    }
}