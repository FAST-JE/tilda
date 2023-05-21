<?php

namespace App\Geo;

use App\Geo\Exception\InvalidAddressGeoException;
use App\Geo\Exception\NotFoundGeoException;
use App\Geo\Lib\SxGeo;

class Geo
{
    private SxGeo $sypex;

    public function __construct(SxGeo $object) {
        $this->sypex = $object;
    }

    public function getInfo(string $ip): GeoLocation
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            throw new InvalidAddressGeoException('Invalid ip address');
        }

        $data = $this->sypex->getCityFull($ip);
        if (empty($data)) {
            throw new NotFoundGeoException('it is impossible to determine the location');
        }

        return new GeoLocation($data['country']['name_ru'], $data['region']['name_ru'], $data['city']['name_ru']);
    }

}
