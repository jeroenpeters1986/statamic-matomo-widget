<?php

return [
    'url' => env('MATOMO_URL', 'https://analytics.example.com'),
    'site_id' => env('MATOMO_SITE_ID', 1),
    'token' => env('MATOMO_API_TOKEN', ''),
    'widget' => [
        'metrics' => ['nb_visits', 'nb_actions'],
        'chart_type' => 'line',
        'chart_height' => 300,
    ],
];
