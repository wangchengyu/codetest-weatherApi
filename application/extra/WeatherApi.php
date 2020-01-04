<?php
//the config for weather open api
return [
    'from' => 'openweathermap',

    'api_config' =>[
        'openweathermap' => [
            'host' => 'api.openweathermap.org',
            'path' => 'data/2.5/weather',
            'appid' => '678fff3851fefda99411ae1a9e579e51',
            'city_id_map' => [
                '1' => '2147714',
                '2' => '7839805',
                '3' => '7839791',
            ],
        ],

        //just a sample, invalid.
        'otherweatherapi' => [
            'host' => 'api.otherweatherapi.org',
            'path' => 'data/2.5/weather',
            'appid' => '678fff3851fefda99411ae1a9e579e51',
            'city_id_map' => [
                '1' => '2147714',
                '2' => '7839805',
                '3' => '7839791',
            ],
        ]
    ]


];
