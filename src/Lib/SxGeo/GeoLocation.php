<?php

namespace App\Lib\SxGeo;

class GeoLocation
{
    private array $city;
    private array $country;
    private array $region;

    public function __construct(array $ipInfo)
    {
        $this->city = $ipInfo['city'] ?? '';
        $this->country = $ipInfo['country'] ?? '';
        $this->region = $ipInfo['region'] ?? '';
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