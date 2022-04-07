<?php

class Database {

    /*
     * Author: Kylee Dicken
     * Date: Apr 4, 2022
     * File: database.class.php
     * Description: Description: the Database class sets the database details
     *
     */

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'skyline',
        'tblFlights' => 'flights',
        'tblseats' => 'seats',
        'tblUsers' => 'users'
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
            $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'error.php';
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table that stores flights
    public function getFlightsTable() {
        return $this->param['tblFlights'];
    }

    //returns the name of the table that stores seats
    public function getSeatsTable() {
        return $this->param['tblSeats'];
    }

    //returns the name of the table that stores users
    public function getUsersTable() {
        return $this->param['tblUsers'];
    }


}