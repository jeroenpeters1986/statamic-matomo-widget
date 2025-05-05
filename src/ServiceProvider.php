<?php

namespace Jeroenpeters1986\MatomoWidget;

use Statamic\Providers\AddonServiceProvider;
use Jeroenpeters1986\MatomoWidget\Widgets\MatomoWidget;

class ServiceProvider extends AddonServiceProvider
{
    protected $viewNamespace = 'jeroenpeters1986';

    protected $widgets = [
        MatomoWidget::class
    ];

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/statamic/matomo_widget.php' => config_path('statamic/matomo_widget.php'),
        ]);
    }
}