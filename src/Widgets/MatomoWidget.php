<?php

namespace Jeroenpeters1986\MatomoWidget\Widgets;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Statamic\Widgets\Widget;

class MatomoWidget extends Widget
{
    protected static $handle = 'matomo_stats';
    protected static $cacheMinutes = 5;

    public function html()
    {
        $config = config('statamic.matomo_widget');

        try {
            $stats = Cache::remember('matomo_widget_data', self::$cacheMinutes, function () {
                return $this->fetchMatomoData();
            });
        } catch (\Exception $e) {
            return view('widgets.matomo', [
                'error' => $e->getMessage(),
                'config' => $config['widget'],
            ]);
        }

        return view('widgets.matomo', [
            'stats' => $stats,
            'config' => $config['widget'],
        ]);
    }

    private function fetchMatomoData()
    {
        $config = config('statamic.matomo_widget');

        $response = Http::get($config['url'] . '/index.php', [
            'module' => 'API',
            'method' => 'VisitsSummary.get',
            'idSite' => $config['site_id'],
            'period' => 'day',
            'date' => 'last30',
            'format' => 'JSON',
            'token_auth' => $config['token'],
        ]);

        if ($response->failed()) {
            throw new \Exception('Failed to fetch data from Matomo: HTTP-status' . $response->status() . ' | Error: ' . $response->body());
        }

        return $response->json();
    }
}