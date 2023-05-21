<?php

namespace App\Geo;

use App\Geo\Exception\InvalidAddressGeoException;
use App\Geo\Exception\NotFoundGeoException;
use App\Geo\Lib\SxGeo;

class Geo
{
    private const COUNTRY_DEFAULT = 'Россия';
    private const CITY_DEFAULT = 'Москва';
    private const REGION_DEFAULT = 'Московская область';

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

        if (!isset($data['country']['name_ru'], $data['region']['name_ru'], $data['city']['name_ru'])) {
            $data['country']['name_ru'] = self::COUNTRY_DEFAULT;
            $data['region']['name_ru'] = self::REGION_DEFAULT;
            $data['city']['name_ru'] = self::CITY_DEFAULT;
        }

        return new GeoLocation($data['country']['name_ru'], $data['region']['name_ru'], $data['city']['name_ru']);
    }

}
