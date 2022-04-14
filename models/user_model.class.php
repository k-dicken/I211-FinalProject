<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class UserModel {
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUsers;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getMovieModel method must be called.
    public function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUsers = $this->db->getUsersTable();

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
    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    public function verify_user($email, $password) {
        $sql = "SELECT * FROM " . $this->tblUsers .
            " WHERE email='" . $email . "' AND password='" . $password . "'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no user was found.
        if ($query->num_rows == 0)
            return 0;

        $obj = $query->fetch_object();

        //create new user object
        $user = new User($obj->admin, $obj->email, $obj->password, $obj->firstName, $obj->lastName, $obj->city, $obj->state);

        //set the userNum for the user
        $user->setUserNum($obj->userNum);

        session_start();

        $_SESSION['userNum'] = $obj->userNum;
        $_SESSION['admin'] = $obj->admin;


        return $user;
    }

    public function view_user($userNum) {
        $sql = "SELECT * FROM " . $this->tblUsers .
            " WHERE userNum='" . $userNum . "'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no user was found.
        if ($query->num_rows == 0)
            return 0;

        $obj = $query->fetch_object();

        //create new user object
        $user = new User($obj->admin, $obj->email, $obj->password, $obj->firstName, $obj->lastName, $obj->city, $obj->state);

        //set the userNum for the user
        $user->setUserNum($obj->userNum);

        return $user;
    }

    public function update_user($userNum) {
        //if the script did not receive post data, display an error message and then end the script immediately
        if (!filter_has_var(INPUT_POST, 'firstName') ||
            !filter_has_var(INPUT_POST, 'lastName') ||
            !filter_has_var(INPUT_POST, 'email') ||
            !filter_has_var(INPUT_POST, 'city') ||
            !filter_has_var(INPUT_POST, 'state')) {

            return false;
        }

        //retrieve data for the new movie; data are sanitized and escaped for security.
        $firstName = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING)));
        $lastName = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING)));
        $email = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'email', FILTER_DEFAULT));
        $city = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING)));
        $state = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING)));

        //query string for update
        $sql = "UPDATE " . $this->tblUsers .
            " SET firstName='$firstName', lastName='$lastName', email='$email', city='$city', "
            . "state='$state' WHERE userNum='$userNum'";

        //execute the query
        return $this->dbConnection->query($sql);
    }

    public function add_user() {
        //if the script did not receive post data, display an error message and then end the script immediately
        if (!filter_has_var(INPUT_POST, 'firstName') ||
            !filter_has_var(INPUT_POST, 'lastName') ||
            !filter_has_var(INPUT_POST, 'email') ||
            !filter_has_var(INPUT_POST, 'password') ||
            !filter_has_var(INPUT_POST, 'city') ||
            !filter_has_var(INPUT_POST, 'state')) {

            return false;
        }

        //retrieve data for the new movie; data are sanitized and escaped for security.
        $firstName = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING)));
        $lastName = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING)));
        $email = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'email', FILTER_DEFAULT));
        $password = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));
        $city = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING)));
        $state = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING)));

        //query string for update
        $sql = "INSERT INTO `users`(`userNum`, `admin`, `email`, `password`, `firstName`, `lastName`, `city`, `state`)
                VALUES (null,0,'". $email . "','" . $password . "','" . $firstName . "','" . $lastName . "','" . $city . "','" . $state . "')";

        echo $sql;

        //execute the query
        return $this->dbConnection->query($sql);
    }

    public function delete_user($userNum) {
        $sql = "DELETE FROM `users` WHERE userNum = '" . $userNum . "'";

        //execute the query
        $this->dbConnection->query($sql);
    }
}