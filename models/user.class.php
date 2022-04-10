<?php

class User {
    private $userNum, $admin, $email, $password, $firstName, $lastName, $city, $state;

    public function __construct($admin, $email, $password, $firstName, $lastName, $city, $state) {
        $this->admin = $admin;
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->city = $city;
        $this->state = $state;
    }

    public function getUserNum()
    {
        return $this->userNum;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setUserNum($userNum)
    {
        $this->userNum = $userNum;
    }



}