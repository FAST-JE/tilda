<?php

namespace App\Geo;

use App\Geo\Lib\SxGeo;

class GeoFactory
{
    private const PATH_TO_DB = __DIR__ . "/Lib/SxGeoCity.dat";
    public static function getInfo(string $ip): GeoLocation
    {
        $sxGeo = new SxGeo(self::PATH_TO_DB);
        return (new Geo($sxGeo))->getInfo($ip);
    }
}