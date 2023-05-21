<?php

namespace App\Geo;

class GeoLocation
{

    private string $country;
    private string $region;
    private string $city;

    public function __construct(string $country, string $region, string $city)
    {
        $this->country = $country;
        $this->region = $region;
        $this->city = $city;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getRegion(): string
    {
        return $this->region;
    }
}