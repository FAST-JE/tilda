<?php

namespace App\Lib\SxGeo;

class SypexGeoFactory
{
    public static function createSypexGeo(): SypexGeo
    {
        $config = require __DIR__ . '/../../../config/sypexgeo.php';
        $sxGeo = new SxGeo(__DIR__ . "/{$config['sypexgeo']['file']}");
        return new SypexGeo($sxGeo, $config);
    }
}