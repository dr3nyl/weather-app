<?php

namespace Tests\Unit;

use Tests\TestCase;

class WeatherTest extends TestCase
{
    /**
     * test if weather data can be fetched in json
     */
    public function test_can_fetch_the_weather_data(): void
    {
        $response = $this->getJson('/api/weather/tokyo,JP');

        $response
            ->assertOk()
            ->assertJsonStructure([
                'list' => [
                    '*' => [
                        '*' => [
                            'id',
                            'temp',
                            'sea_level',
                            'humidity',
                            'weather_type',
                            'wind',
                            'forecasted',
                        ]
                    ]
                ]
            ]);
    }
}
