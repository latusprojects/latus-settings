<?php

namespace Latus\Settings\Providers;

use Illuminate\Support\ServiceProvider;
use Latus\Settings\Repositories\Eloquent\SettingRepository;
use Latus\Settings\Repositories\Contracts\SettingRepository as SettingRepositoryContract;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if (!$this->app->bound(SettingRepositoryContract::class)) {
            $this->app->bind(SettingRepositoryContract::class, SettingRepository::class);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}
