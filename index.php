<?php

use App\Http\Controllers\HomeWorkSolidController;
use App\Services\GeoLocationService;
use App\Services\DistanceCalculator;
use App\Services\PlaceSorter;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

require __DIR__ . '/vendor/autoload.php';

$guzzleClient = new GuzzleClient();
$geoLocationService = new GeoLocationService($guzzleClient);
$distanceCalculator = new DistanceCalculator();
$placeSorter = new PlaceSorter();

$controller = new HomeWorkSolidController($geoLocationService, $distanceCalculator, $placeSorter);

try {
    $controller->index();
} catch (GuzzleException $e) {
}

