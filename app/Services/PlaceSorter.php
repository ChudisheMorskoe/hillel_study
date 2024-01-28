<?php

namespace App\Services;

class PlaceSorter
{
    public function sortPlacesByDistance($places)
    {
        usort($places, function ($a, $b) {
            return $a->distance <=> $b->distance;
        });

        return $places;
    }

}
