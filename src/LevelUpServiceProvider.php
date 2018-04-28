<?php

namespace HughWilly\LevelUp;

use Illuminate\Support\ServiceProvider;

class LevelUpServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(ModelHelper::class);
    }

    public function provides()
    {
        return [ModelHelper::class];
    }
}
