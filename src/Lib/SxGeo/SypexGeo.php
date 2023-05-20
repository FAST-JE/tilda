<?php

namespace App\Lib\SxGeo;

use App\Lib\SxGeo\Exception\InvalidAddressSypexGeoException;
use App\Lib\SxGeo\Exception\NotFoundSypexGeoException;

class SypexGeo
{
    private SxGeo $sypex;

    public function __construct(SxGeo $object) {
        $this->sypex = $object;
    }

    public function getInfo(string $ip)
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            throw new InvalidAddressSypexGeoException();
        }

        $data = $this->sypex->getCityFull($ip);
        if (empty($data)) {
            throw new NotFoundSypexGeoException();
        }

        return new GeoLocation($data);
    }

}
