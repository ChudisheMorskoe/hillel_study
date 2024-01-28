<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use App\Services\GeoLocationService;
use App\Services\DistanceCalculator;
use App\Services\PlaceSorter;
use JetBrains\PhpStorm\NoReturn;

class HomeWorkSolidController extends Controller
{
    protected GeoLocationService $geoLocationService;
    protected DistanceCalculator $distanceCalculator;
    protected PlaceSorter $placeSorter;

    public function __construct(
        GeoLocationService $geoLocationService,
        DistanceCalculator $distanceCalculator,
        PlaceSorter        $placeSorter
    )
    {
        $this->geoLocationService = $geoLocationService;
        $this->distanceCalculator = $distanceCalculator;
        $this->placeSorter = $placeSorter;
    }

    /**
     * @throws GuzzleException
     */
    #[NoReturn] public function index(): void
    {
        $search = 'Продукти Одеса';
        $lat = 46.4774700;
        $lon = 30.7326200;
        $places = $this->geoLocationService->getPlaces($search, $lat, $lon);


        foreach ($places as $place) {
            $place->distance = $this->distanceCalculator->calculateDistance($lat, $lon, $place->lat, $place->lon);
        }

        $places = $this->placeSorter->sortPlacesByDistance($places);

        dd($places);
    }

}
