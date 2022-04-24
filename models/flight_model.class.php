<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class FlightModel {
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblFlights;
    private $tblFlightsUsers;
    private $tblPlanes;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getMovieModel method must be called.
    public function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblFlights = $this->db->getFlightsTable();
        $this->tblFlightsUsers = $this->db->getFlightsUsersTable();
        $this->tblPlanes = $this->db->getPlanesTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one MovieModel instance
    public static function getFlightModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new FlightModel();
        }
        return self::$_instance;
    }

    public function list_flights() {
//        $sql = "SELECT * FROM " . $this->tblFlights;
        $sql = "SELECT * FROM " . $this->tblFlights . ", " . $this->tblPlanes .
            " WHERE " . $this->tblFlights . ".planeNum = " . $this->tblPlanes . ".planeNum";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no flights was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned flights
        $flights = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $flight = new Flight(stripslashes($obj->airline),
                stripslashes($obj->planeType),
                stripslashes($obj->fromLocation),
                stripslashes($obj->toLocation),
                stripslashes($obj->capacity),
                stripslashes($obj->date),
                stripslashes($obj->departTime),
                stripslashes($obj->arriveTime),
                stripslashes($obj->gate),
                stripslashes($obj->status),
                stripslashes($obj->availability));

            //set the id for the flight
            $flight->setFlightNum($obj->flightNum);

            //add the flight into the array
            $flights[] = $flight;

        }

        return $flights;
    }

    public function view_flight($flightNum) {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblFlights . ", " . $this->tblPlanes .
            " WHERE " . $this->tblFlights . ".flightNum = 1 AND " . $this->tblFlights . ".planeNum = " . $this->tblPlanes . ".planeNum";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a flight object
            $flight = new Flight(stripslashes($obj->airline), stripslashes($obj->planeType), stripslashes($obj->fromLocation), stripslashes($obj->toLocation), stripslashes($obj->capacity), stripslashes($obj->date), stripslashes($obj->departTime), stripslashes($obj->arriveTime), stripslashes($obj->gate), stripslashes($obj->status), stripslashes($obj->availability));

            //set the id for the flight
            $flight->setFlightNum($obj->flightNum);

            return $flight;
        }

        return false;
    }

    //search the database for flights that match parameters
    public function search_flights($to, $from, $depart) {

        $sql = "SELECT * FROM " . $this->tblFlights . ", " . $this->tblPlanes .
            " WHERE " . $this->tblFlights . ".planeNum = " . $this->tblPlanes . ".planeNum";

        if ($to != "") {
            $sql .= " AND toLocation LIKE '%" . $to . "%'";
        }
        if ($from != "") {
            $sql .= " AND fromLocation LIKE '%" . $from . "%'";
        }
        if ($depart != "") {
            $sql .= " AND date LIKE '%" . $depart . "%'";
        }

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 movie found.
        //create an array to store all the returned movies
        $flights = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $flight = new Flight(stripslashes($obj->airline), stripslashes($obj->planeType), stripslashes($obj->fromLocation), stripslashes($obj->toLocation), stripslashes($obj->capacity), stripslashes($obj->date), stripslashes($obj->departTime), stripslashes($obj->arriveTime), stripslashes($obj->gate), stripslashes($obj->status), stripslashes($obj->availability));

            //set the id for the movie
            $flight->setFlightNum($obj->flightNum);

            //add the movie into the array
            $flights[] = $flight;
        }
        return $flights;
    }
    //search the database for flights that match words in titles. Return an array of movies if succeed; false otherwise.
    public function user_flights($userNum) {

        $sql = "SELECT * FROM " . $this->tblFlights . ", " . $this->tblPlanes . ", " . $this->tblFlightsUsers .
            " WHERE " . $this->tblFlightsUsers . ".userNum='" . $userNum . "' AND " . $this->tblFlightsUsers . ".flightNum = " . $this->tblFlights . ".flightNum AND " . $this->tblFlights . ".planeNum = " . $this->tblPlanes . ".planeNum";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 movie found.
        //create an array to store all the returned movies
        $flights = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $flight = new Flight(stripslashes($obj->airline), stripslashes($obj->planeType), stripslashes($obj->fromLocation), stripslashes($obj->toLocation), stripslashes($obj->capacity), stripslashes($obj->date), stripslashes($obj->departTime), stripslashes($obj->arriveTime), stripslashes($obj->gate), stripslashes($obj->status), stripslashes($obj->availability));

            //set the id for the movie
            $flight->setFlightNum($obj->flightNum);

            //add the movie into the array
            $flights[] = $flight;
        }
        return $flights;
    }

    public function add_flights() {
        //check if there are post values

        //retrieve post values

        //create insert sql statement

        //run query
    }

    public function delete_flights($flightNum) {
        $sql = "DELETE FROM `flights` WHERE flightNum = '" . $flightNum . "'";

        //execute the query
        $this->dbConnection->query($sql);
    }

}