<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class  FlightController {
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

    //autosuggestion
    public function suggest($type, $term) {
        //retrieve query terms
        $query_term = urldecode(trim($term));

        if ($type === "From") {
            $flights = $this->flightModel->search_flights(null, $query_term, null);
        } else if ($type === "To") {
            $flights = $this->flightModel->search_flights($query_term, null, null);
        }

        //retrieve all suggested words and store them in an array
        $suggest = array();
        if ($flights) {
            foreach ($flights as $flight) {
                if ($type === "From") {
                    $suggest[] = $flight->getFromLocation();
                } else if ($type === "To") {
                    $suggest[] = $flight->getToLocation();
                }
            }
        }

        echo json_encode($suggest);
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

    //assign user to flight
    public function purchase($flightNum) {
        session_start();

        if (isset($_SESSION['userNum'])
            && isset($_SESSION['admin'])) {

            $userNum = $_SESSION['userNum'];
            $admin = $_SESSION['admin'];
        } else {
            header(BASE_URL . "/user/login");
            exit();
        }

        //retrieve the specific flight
        $purchase = $this->flightModel->purchase_flight($flightNum, $userNum);

        if (!$purchase) {
            //handle errors
            $message = "There was a problem purchase a flight on the flight num='" . $flightNum . "'.";
            $this->error($message);
            return;
        }

        self::user($userNum);
    }

    public function edit($flightNum) {
        //retrieve the specific flight
        $flight = $this->flightModel->view_flight($flightNum);

        if (!$flight) {
            //display an error
            $message = "There was a problem displaying the flight flightNum='" . $flightNum . "'.";
            $this->error($message);
            return;
        }

        //display flights details
        $view = new FlightEdit();
        $view->display($flight);
    }

    public function update($flightNum) {
        //update the user
        $update = $this->flightModel->update_flight($flightNum);

        if (!$update) {
            //handle errors
            $message = "There was a problem updating the flight id='" . $flightNum . "'.";
            $this->error($message);
            return;
        }

        //display the updated flight details
        $flight = $this->flightModel->view_flight($flightNum);

        $view = new FlightDetail();
        $view->display($flight);
    }

    public function create() {
        $create = new FlightCreate();
        $create->display();
    }

    public function add() {
        //add the user
        $add = $this->flightModel->add_flight();

        if (!$add) {
            //handle errors
            $message = "There was a problem creating the flight.";
            $this->error($message);
            return;
        }

        //run controller's index function
        $this->index();
    }

    public function delete($flightNum) {
        $this->flightModel->delete_flights($flightNum);

        header("Location:" . BASE_URL . "flight/index"); /* Redirect browser */
        exit();
    }
}