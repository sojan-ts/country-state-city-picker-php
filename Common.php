<?php
class Common {
    public function getCountries($connection){
        $query = "SELECT * FROM countries";
        $result = $connection->query($query);
        return $result;
    }

    public function getStatesByCountry($connection,$countryId) {
        $query = "SELECT * FROM states WHERE countryId='$countryId'";
        $result = $connection->query($query);
        return $result;
    }

    public function getCityByState($connection,$stateId)
    {
        $query = "SELECT * FROM cities WHERE state_id='$stateId'";
        $result = $connection->query($query);
        return $result;
    }
}
