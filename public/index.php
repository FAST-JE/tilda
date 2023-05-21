<?php
require_once __DIR__.'/../vendor/autoload.php';

use App\Geo\GeoFactory;

$city = null;

try {
    $geo = GeoFactory::getInfo('176.59.111.8');
    $city = $geo->getCity()['name_en'];
} catch (Exception $e) {
    var_dump($e->getMessage());
}

$cityToPhone = [
    'Krasnodar' => '8-800-500-100'
];

var_dump($cityToPhone[$city] ?? '8-800-DIGITS');
