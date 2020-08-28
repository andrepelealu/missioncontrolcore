<?php namespace Eyeweb\MissionControl\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

/**
 * Class ConsoleServiceProvider
 * @package Eyeweb\MissionControl\Providers
 */
class ConsoleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->booted(function() {
            $schedule = $this->app->make(Schedule::class);
            $schedule->command('generate:sitemap')->daily();
        });
    }

    public function register()
    {
        $this->commands([
            \Eyeweb\MissionControl\Console\GenerateSitemap::class,
            \Eyeweb\MissionControl\Console\ModuleCreate::class,
        ]);
    }
}
