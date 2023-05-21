<?php
require_once __DIR__.'/../vendor/autoload.php';

use App\Geo\GeoFactory;

$city = null;

try {
    $geo = GeoFactory::getInfo('31.216.179.162');
    $city = $geo->getCity();
    var_dump($city);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

$cityToPhone = [
    'Краснодар' => '8-800-500-100'
];

var_dump($cityToPhone[$city] ?? '8-800-DIGITS');
