<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class Flight {
    private $flightNum, $airline, $planeType, $fromLocation, $toLocation, $capacity, $date, $departTime, $arriveTime, $gate, $availability, $status;

    public function __construct($airline, $planeType, $fromLocation, $toLocation, $capacity, $date, $departTime, $arriveTime, $gate, $status, $availability)
    {
        $this->airline = $airline;
        $this->planeType = $planeType;
        $this->fromLocation = $fromLocation;
        $this->toLocation = $toLocation;
        $this->capacity = $capacity;
        $this->date = $date;
        $this->departTime = $departTime;
        $this->arriveTime = $arriveTime;
        $this->gate = $gate;
        $this->status = $status;
        $this->availability = $availability;

    }

    public function getFlightNum()
    {
        return $this->flightNum;
    }

    public function getAirline()
    {
        return $this->airline;
    }

    public function getPlaneType()
    {
        return $this->planeType;
    }

    public function getToLocation()
    {
        return $this->toLocation;
    }

    public function getFromLocation()
    {
        return $this->fromLocation;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getDepartTime()
    {
        return $this->departTime;
    }

    public function getArriveTime()
    {
        return $this->arriveTime;
    }

    public function getGate()
    {
        return $this->gate;
    }

    public function getAvailability()
    {
        return $this->availability;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setFlightNum($flightNum)
    {
        $this->flightNum = $flightNum;
    }


}