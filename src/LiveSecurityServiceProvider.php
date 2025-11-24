<?php

namespace monircse403\LiveSecurity;

use Illuminate\Support\ServiceProvider;
use monircse403\LiveSecurity\Console\SendUsageAnalytics;

class LiveSecurityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../config/livesecurity.php' => config_path('livesecurity.php'),
        ], 'config');

        if (config('livesecurity.analytics')) {
            $this->app->booted(function () {
                $schedule = $this->app->make('Illuminate\Console\Scheduling\Schedule');
                $schedule->command(SendUsageAnalytics::class)->daily();
            });
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/livesecurity.php',
            'livesecurity'
        );

        if ($this->app->runningInConsole()) {
            $this->commands([
                \monircse403\LiveSecurity\Console\SendUsageAnalytics::class,
            ]);
        }
    }
}
