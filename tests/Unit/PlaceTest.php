<?php

namespace Tests\Unit;

use Tests\TestCase;

class PlaceTest extends TestCase
{
    /**
     * test if can fetch response by searching a place in JP
     */
    public function test_can_fetch_a_search_place(): void
    {
        $response = $this->getJson('/api/place/search/osaka,JP');

        $response
            ->assertOk()
            ->assertJsonIsObject()
            ->assertJsonStructure([
                'results' => [
                    '*' => [
                        'fsq_id',
                        'categories' => [
                            '*' => [
                                'id',
                                'name',
                                'icon' => [
                                    'prefix',
                                    'suffix'
                                ]
                            ]
                                ],
                        'link',
                        'name'

                    ]
                ]
            ]);
    }
    
    /**
     * test if we can fecth the photo of a place
     */
    public function test_can_the_photo_of_a_place(): void
    {
        $response = $this->getJson('/api/place/photo/4b267bacf964a520297c24e3');

        $response
            ->assertOk()
            ->assertJsonIsArray()
            ->assertJsonStructure([
                '*' => [
                    "id",
                    "created_at",
                    "prefix",
                    "suffix",
                    "width",
                    "height"
                ]
            ]);
    }
}
