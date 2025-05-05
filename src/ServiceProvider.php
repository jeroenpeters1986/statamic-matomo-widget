<?php

namespace Jeroenpeters1986\MatomoWidget;

use Statamic\Providers\AddonServiceProvider;
use Jeroenpeters1986\MatomoWidget\Widgets\MatomoWidget;

class ServiceProvider extends AddonServiceProvider
{
    protected $widgets = [
        MatomoWidget::class
    ];

    public function bootAddon()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/statamic/matomo_widget.php', 'statamic.matomo_widget');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/statamic/matomo_widget.php' => config_path('statamic/matomo_widget.php'),
            ], 'matomo-widget-config');
        }
    }
}