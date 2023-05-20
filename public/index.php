<?php
require_once __DIR__.'/../vendor/autoload.php';

use App\Lib\SxGeo\SypexGeoFactory;

$sypexGeo = SypexGeoFactory::getInfo('31.216.179.162');
var_dump($sypexGeo->getCity());

