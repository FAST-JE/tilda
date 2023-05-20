<?php

namespace App\Lib\SxGeo;

class SypexGeoFactory
{
    private const PATH_TO_DB = __DIR__ . "/SxGeoCity.dat";
    public static function getInfo(string $ip): GeoLocation
    {
        $sxGeo = new SxGeo(self::PATH_TO_DB);
        return (new SypexGeo($sxGeo))->getInfo($ip);
    }
}