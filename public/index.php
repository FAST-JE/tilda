<?php
require_once __DIR__.'/../vendor/autoload.php';

use App\Lib\SxGeo\SypexGeoFactory;

$sypexGeo = SypexGeoFactory::createSypexGeo();
$sypexGeo->get('31.216.179.162');
var_dump($sypexGeo->city);

