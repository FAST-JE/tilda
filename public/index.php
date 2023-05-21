<?php
require_once __DIR__.'/../vendor/autoload.php';

use App\Geo\GeoFactory;

$city = null;

try {
    $geo = GeoFactory::getInfo('146.70.146.146');
    $city = $geo->getCity();
} catch (Exception $e) {
    var_dump($e->getMessage());
}

$cityToPhone = [
    'Краснодар' => '8-800-500-100',
    'Москва' => '8-800-DIGITS'
];

var_dump($cityToPhone[$city] ?? '8-800-DIGITS');
