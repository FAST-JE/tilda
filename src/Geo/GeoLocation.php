<?php

namespace App\Geo;

class GeoLocation
{
    private string $city;
    private string $country;
    private string $region;

    public function __construct($country, $region, $city)
    {
        $this->country = $country;
        $this->region = $region;
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getRegion()
    {
        return $this->region;
    }
}