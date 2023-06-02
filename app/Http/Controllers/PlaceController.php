<?php

namespace App\Http\Controllers;

use App\Services\PlaceService;

class PlaceController extends Controller
{
    private $placeService;
    
    /**
     * initialize PlaceService class
     */
    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }
    
    /**
     * show searched place
     */
    public function showSearchPlace()
    {
        return $this->placeService->searchData(request('city'));
    }
    
    /**
     * show detail of a place
     */
    public function showPlaceDetail()
    {
        return $this->placeService->placeData(request('id'));
    }
    
    /**
     * show photo of a place
     */
    public function showPlacePhoto()
    {
        return $this->placeService->placePhoto(request('id'));
    }
}
