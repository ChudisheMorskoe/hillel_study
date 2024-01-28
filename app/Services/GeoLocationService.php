<?php

namespace App\Services;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

class GeoLocationService
{
    protected GuzzleClient $guzzleClient;

    public function __construct(GuzzleClient $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

    /**
     * @throws GuzzleException
     */
    public function getPlaces($search, $lat,$lon)
    {
        $url = 'https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=';
        $exclude_place_ids = '';
        $response = $this->guzzleClient->request('GET', $url . urlencode($search) . '&lat=' . $lat . '&lon=' . $lon . $exclude_place_ids);
        return json_decode($response->getBody()->getContents());
    }

}
