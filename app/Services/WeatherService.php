<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    private $data = [];
    
    /**
     *  return weather info of a place
     */
    public function getWeather($city)
    {
        $response = $this->getWeatherData($city);

        $this->data = collect($response['list'])->groupBy(function ($item) {

            return Carbon::parse($item['dt_txt'])->format('l, M d Y');

        })->map(function ($groupedItems) {

            return $groupedItems->map(function ($item) {
                return [
                    'id' => $item['dt'],
                    'temp' => $this->kelvin_to_celsius($item['main']['temp']),
                    'sea_level' => $item['main']['sea_level'],
                    'humidity' => $item['main']['humidity'],
                    'weather_type' => ucfirst($item['weather'][0]['description']),
                    'wind' => $item['wind']['speed'],
                    'forecasted' => Carbon::parse($item['dt_txt'])->format('g:i A')
                ];
            });
            
        })->toArray();

        return json_encode([
            'list' => $this->data
        ]);
    }
    
    /**
     * return weather detail in json format
     */
    public function getWeatherData($city)
    {
        return Http::get(Config::get('services.weather.endpoint'), [
            Config::get('services.weather.first_query') => $city,
            Config::get('services.weather.second_query') => Config::get('services.weather.key')
            ]
        );
    }

    // kelvin to celsius conversion
    private function kelvin_to_celsius($given_value)
    {
        $celsius=$given_value-273.15;
        return round($celsius);
    }

}