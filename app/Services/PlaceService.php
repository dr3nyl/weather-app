<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class PlaceService
{    
    /**
     * return searched place
     */
    public function searchData($city)
    {
        $response = $this->getSearchedData($city);

        return json_decode($response);
    }
    
    /**
     * return details of a place
     */
    public function placeData($id)
    {
        $response = $this->getPlaceData($id);

        return json_decode($response);
    }
    
    /**
     * return photo of a place
     */
    public function placePhoto($id)
    {
        $response = $this->getPlacePhoto($id);

        return json_decode($response);
    }
        
    /**
     *  return json response of searched place
     */
    private function getSearchedData($city)
    {
        return Http::withOptions([

            'verify' => false

        ])->withHeaders([

            'Authorization' => Config::get('services.place.key'),
            'accept' => 'application/json',

        ])->get(Config::get('services.place.search_endpoint'), [

            Config::get('services.place.query') => $city

        ]);
    }
    
    /**
     *  return json response details of a place
     */
    private function getPlaceData($id)
    {
        return Http::withOptions([

            'verify' => false

        ])->withHeaders([

            'Authorization' => Config::get('services.place.key'),
            'accept' => 'application/json',

        ])->get(Config::get('services.place.endpoint'). $id);
    }
    
    /**
     * return json response photo of a place
     */
    private function getPlacePhoto($id)
    {
        return Http::withOptions([

            'verify' => false

        ])->withHeaders([

            'Authorization' => Config::get('services.place.key'),
            'accept' => 'application/json',

        ])->get(Config::get('services.place.endpoint') . $id . '/photos');
    }
}